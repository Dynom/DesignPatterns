<?php

// Mocks, just placeholders
class DAO {}

// Require all files
require 'MapperRegistry.php';
require 'DomainObject.php';
require 'CustomerMapper.php';
require 'Customer.php';
require 'UnitOfWork.php';

// Initiate the mapper registry, with DAO so that injection into the mappers becomes easy.
$mapperRegistry = new MapperRegistry;
$mapperRegistry->setDao(new DAO());

// Initiating the unit of work object
$unitOfWork = new UnitOfWork($mapperRegistry);

// Fire up our mapper, this will take care of the fetching and storing logic
$mapper = $mapperRegistry->getMapperForClassName('Customer');

// Retrieve a customer, with ID 42.
$customer = $mapper->findById(42);


// -- At this point, the customer is marked "clean" in the Unit of Work object.


// Change the e-mail to something different
//
// Once PHP get's field getters and setters, this can be done by using public fields instead of getters and setters.
// @see https://wiki.php.net/rfc/propertygetsetsyntax
$customer->email = 'John.Doe@SomeCompany.eu';

// We changed the customer, let's mark it as dirty.
// Because we are using "called registration", we have to manually do all the thinking for registering objects. This
// is explicit and is fine when the code allows for a natural flow. However if the code is more complex. This
// approach might be too error prone and the "object registration" approach is a much safer choice.
$unitOfWork->registerDirty($customer);


// -- At this point, the customer is marked "dirty" in the Unit of Work object.


// All done, store the customer back to the database. Note that we trigger storing of our entities using the unit of
// work object.
$unitOfWork->commit();