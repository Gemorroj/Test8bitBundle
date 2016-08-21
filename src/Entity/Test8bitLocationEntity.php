<?php

namespace Gemorroj\Test8bitBundle\Entity;

class Test8bitLocationEntity
{
    /**
     * @var string
     */
    private $name;
    /**
     * @var Test8bitLocationCoordinateEntity
     */
    private $coordinates;

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Test8bitLocationEntity
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return Test8bitLocationCoordinateEntity
     */
    public function getCoordinates()
    {
        return $this->coordinates;
    }

    /**
     * @param Test8bitLocationCoordinateEntity $coordinates
     * @return Test8bitLocationEntity
     */
    public function setCoordinates(Test8bitLocationCoordinateEntity $coordinates)
    {
        $this->coordinates = $coordinates;
        return $this;
    }
}
