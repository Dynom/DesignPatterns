<?php

class NetworkProvider
{
    /**
     * @var CoverageZone
     */
    public $coverageZones = array();

    /**
     * @param CoverageZone $zone
     * @return NetworkProvider
     */
    public function addCoverageZone(CoverageZone $zone)
    {
        $this->coverageZones[] = $zone;
        return $this;
    }


    /**
     * Return the defined coverage zones
     * @return array
     */
    public function getCoverageZones()
    {
        return $this->coverageZones;
    }
}
