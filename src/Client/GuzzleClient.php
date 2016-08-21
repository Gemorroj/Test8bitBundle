<?php

namespace Gemorroj\Test8bitBundle\Client;

use Gemorroj\Test8bitBundle\Entity\Test8bitEntity;
use Gemorroj\Test8bitBundle\Entity\Test8bitLocationCoordinateEntity;
use Gemorroj\Test8bitBundle\Entity\Test8bitLocationEntity;
use Gemorroj\Test8bitBundle\Validator\GuzzleValidator;
use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;

class GuzzleClient
{
    private $client;
    private $validator;

    public function __construct()
    {
        $this->client = new Client();
        $this->validator = new GuzzleValidator();
    }

    /**
     * @param string $uri
     * @param array $options
     * @return Test8bitEntity
     */
    public function getData($uri, array $options = [])
    {
        $response = $this->client->get($uri, $options);

        return $this->makeData($response);
    }

    /**
     * @param ResponseInterface $response
     * @return Test8bitEntity
     */
    protected function makeData(ResponseInterface $response)
    {
        $this->validator->httpResponseValidate($response);

        $jsonObject = $this->makeJsonObject($response);

        $this->validator->jsonObjectValidate($jsonObject);

        return $this->makeEntity($jsonObject);
    }


    /**
     * @param ResponseInterface $response
     * @return \stdClass
     */
    protected function makeJsonObject(ResponseInterface $response)
    {
        return \GuzzleHttp\json_decode($response->getBody());
    }

    /**
     * @param \stdClass $jsonObject
     * @return Test8bitEntity
     */
    protected function makeEntity(\stdClass $jsonObject)
    {
        $entity = new Test8bitEntity();

        foreach ($jsonObject->data->locations as $location) {
            $coordinateEntity = (new Test8bitLocationCoordinateEntity())
                ->setLat($location->coordinates->lat)
                ->setLong($location->coordinates->long);

            $locationEntity = (new Test8bitLocationEntity())
                ->setName($location->name)
                ->setCoordinates($coordinateEntity);

            $entity->addLocation($locationEntity);
        }

        return $entity;
    }
}
