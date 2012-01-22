<?php

// Mocks, just placeholders
class DAO {}

require 'EntityInterface.php';
require 'Customer.php';
require 'CustomerMapper.php';
require 'IdentityMap.php';

$identityMap = new IdentityMap;

$customerMapper = new CustomerMapper(
    new DAO(),
    $identityMap
);

// Fetch the customer with ID 42 two times. This results in $customer2 being the same
// object as customer1 and not just an object with the same values.
$customer1 = $customerMapper->findById(42);
$customer2 = $customerMapper->findById(42);
$customer3 = $customerMapper->findById(1337);

// Changing the e-mail of the first entity
$customer1->email = 'Some.New.Email.Address@dynom.nl';

// Proof that also customer 2 was updated, but 3 isn't.
var_dump(
    '$customer1->email: '. $customer1->email,
    '$customer2->email: '. $customer2->email,
    '$customer3->email: '. $customer3->email
);
