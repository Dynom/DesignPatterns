# Unit of Work

## Introduction
Unit of Work is a magnificant pattern that can help make sense of business transactions. By following what objects were deleted, changed or introduced it's easy to keep a transactional state. It can also offer an optimized way to store the data in your backend. By storing all changes at once, resulting in a potential performance boost.

The Unit of Work pattern relies and benefits from other patterns, such as:

* Mapper registry
* Pessimistic (or Optimistic) offline lock
* Identity map

The code contains many comments and is reasonably free of unnecessary code, although some is kept there for illustration purposes and to give a better sense for the overall picture (At least thats what I hope it will do.)

## Implementation
The implementation describes a Customer entity that is loaded, changed (marked Dirty) and then stored using the Unit of Work object. It also includes other principles such as the Data Mapper and Mapper Registry patterns. Since the Unit of Work pattern knows a few variations, it's possible the example is a bit different from what you might have seen.

* run.php - The file that ties everything together
* Customer.php - The Customer entity
* CustomerMapper.php - The customer mapper, responsible for fetching and storing
* DomainObject.php - The abstract for entities (Customer)
* MapperRegistry.php - The mapper registry, reponsible for creating and maintaining mappers
* UnitOfWork.php - The unit of work object