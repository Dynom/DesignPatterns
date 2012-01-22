# Identity Map

## Introduction
The Identity Map pattern is a very handy pattern that can be used to improve performance and by allowing less chance of integrity violations, because it allows only a single instance of an entity to be loaded at all times.

The Identity Map pattern can be used in a variety of other patterns, such as (and not limited to):

* Unit of Work
* Data Mapper

And can furthermore be compared to and used with Pessimistic and Optimistic offline lock.


## Implementation
The implementation is together with a Data Mapper. Here we have a simple mapper, for fetching Customer and it uses an identity map to make sure that only a single entity (with the same identifier) is loaded once every session.

* run.php - The file that ties everything together
* Customer.php - The customer entity
* CustomerMapper.php - The customer entity mapper (DataMapper)
* EntityInterface.php - The interface for entities
* IdentityMap.php - The identity mapper

## Sources
Links for further reading

* http://martinfowler.com/eaaCatalog/identityMap.html
