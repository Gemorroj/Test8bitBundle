<?php

namespace Gemorroj\Test8bitBundle\Entity;

use Litipk\BigNumbers\Decimal;

class Test8bitLocationCoordinateEntity
{
    const SCALE_LAT = 2;
    const SCALE_LONG = 2;

    /**
     * @var Decimal
     */
    private $lat;
    /**
     * @var Decimal
     */
    private $long;

    /**
     * @return Decimal
     */
    public function getLat()
    {
        return $this->lat;
    }

    /**
     * @param Decimal|string|float|int $lat
     * @return Test8bitLocationCoordinateEntity
     */
    public function setLat($lat)
    {
        $this->lat = Decimal::create($lat, self::SCALE_LAT);

        return $this;
    }

    /**
     * @return Decimal
     */
    public function getLong()
    {
        return $this->long;
    }

    /**
     * @param Decimal|string|float|int $long
     * @return Test8bitLocationCoordinateEntity
     */
    public function setLong($long)
    {
        $this->long = Decimal::create($long, self::SCALE_LONG);

        return $this;
    }
}
