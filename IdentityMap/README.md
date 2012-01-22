# Identity Map

## Introduction
The Identity Map pattern is a very handy pattern that can be used to improve performance in a system and by allowing less chance of integrity violations, because it allows only a single instance of an entity to be loaded at all times.

The Identity Map pattern can be used in a variety of other patterns, such as (and not limited to):
* Unit of Work
* Data Mapper

And can furthermore be compared to and used with Pessimistic and Optimistic offline lock.


## Implementation
The implementation is together with a Data Mapper.

* run.php - The file that ties everything together