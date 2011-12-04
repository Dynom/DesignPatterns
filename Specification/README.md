# Specification

## Introduction
The specification pattern is one I find poorly named, but nevertheless is a very useful pattern indeed. It's purpose is to select and/or validate according to a nicely encapsulated specification.

## Implementation
The implementation describes a network provider and the goal is to see if the provider matches our requirements. In the example We live in the futuristic "sector seven" and we want a provider that covers that sector.

* run.php - The file that ties everything together
* CoverageZone.php - The entity that defines the sectors
* NetworkProvider.php - The entity we want to match against to see if it satisfies our needs
* SectorMatchSpecification.php - The object that contains the "match" rules
* SpecificationInterface.php - The interface used for all the specifications
