<?php

require 'CoverageZone.php';
require 'NetworkProvider.php';
require 'SpecificationInterface.php';
require 'SectorMatchSpecification.php';

// Network provider A, two zones
$networkA = new NetworkProvider;
$networkA->addCoverageZone(
    new CoverageZone(
        array(1, 2, 3, 4, 5)
    )
);

$networkA->addCoverageZone(
    new CoverageZone(
        array(10, 11, 12, 13, 14, 15)
    )
);


// Network provider B, a single zone
$networkB = new NetworkProvider;
$networkB->addCoverageZone(
    new CoverageZone(
        array(1, 3, 5, 7, 9)
    )
);


// We specify that we want to match on sector 7
$specification = new SectorMatchSpecification(7);


var_dump(
    $specification->isSatisfiedBy($networkA),
    $specification->isSatisfiedBy($networkB)
);
