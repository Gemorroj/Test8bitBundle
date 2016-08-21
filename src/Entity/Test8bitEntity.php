<?php

namespace Gemorroj\Test8bitBundle\Entity;

class Test8bitEntity
{
    /**
     * @var Test8bitLocationEntity[]
     */
    private $locations = [];

    /**
     * @return Test8bitLocationEntity[]
     */
    public function getLocations()
    {
        return $this->locations;
    }

    /**
     * @param Test8bitLocationEntity[] $locations
     * @return Test8bitEntity
     */
    public function setLocations(array $locations)
    {
        $this->locations = $locations;

        return $this;
    }


    /**
     * @param Test8bitLocationEntity $location
     * @return Test8bitEntity
     */
    public function addLocation(Test8bitLocationEntity $location)
    {
        $this->locations[] = $location;

        return $this;
    }
}
