<?php

class SectorMatchSpecification implements SpecificationInterface
{
    /**
     * @var int
     */
    private $requiredSector;


    /**
     * @param int $requiredSector
     */
    public function __construct($requiredSector)
    {
        $this->requiredSector = $requiredSector;
    }


    /**
     * Returns true if a network provider can be satified by the required sector
     *
     * @param NetworkProvider $provider
     * @return boolean
     */
    public function isSatisfiedBy(NetworkProvider $provider)
    {
        foreach ($provider->getCoverageZones() as $zone) {
            if ($zone->sectorExists($this->requiredSector)) {
                return true;
            }
        }

        return false;
    }
}


