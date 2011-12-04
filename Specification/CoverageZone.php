<?php

class CoverageZone
{
    /**
     * @var array $sectors
     */
    public $sectors = array();


    /**
     * @param array $sectors
     */
    public function __construct(array $sectors)
    {
        $this->sectors = $sectors;
    }


    /**
     * @param int $sector
     * @return CoverageZone
     */
    public function addSector($sector)
    {
        $this->sectors[ $sector ] = $sector;
        return $this;
    }


    /**
     * Return true if a sector has been defined in this zone, false otherwise
     * @return boolean
     */
    public function sectorExists($sector)
    {
        return in_array($sector, $this->sectors, true);
    }
}

