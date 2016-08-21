<?php

namespace Gemorroj\Test8bitBundle\Tests;

use Gemorroj\Test8bitBundle\Client\GuzzleClient;
use GuzzleHttp\Psr7\Response;
use Litipk\BigNumbers\Decimal;
use Psr\Http\Message\ResponseInterface;
use Gemorroj\Test8bitBundle\Entity\Test8bitEntity;

class GuzzleClientTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider getResponseErrorDataProvider
     * @param ResponseInterface $response
     * @expectedException \Exception
     */
    public function testErrorMakeData(ResponseInterface $response)
    {
        $this->execMakeData($response);
    }

    /**
     * @dataProvider getResponseSuccessDataProvider
     * @param ResponseInterface $response
     */
    public function testSuccessMakeData(ResponseInterface $response)
    {
        $result = $this->execMakeData($response);
        $this->assertInstanceOf(Test8bitEntity::class, $result);
        $this->assertCount(2, $result->getLocations());

        $this->assertEquals('Eiffel Tower', $result->getLocations()[0]->getName());

        $this->assertInstanceOf(Decimal::class, $result->getLocations()[0]->getCoordinates()->getLat());
        $this->assertEquals('21.12', $result->getLocations()[0]->getCoordinates()->getLat()->innerValue());
    }


    /**
     * @param ResponseInterface $response
     * @return Test8bitEntity
     */
    private function execMakeData(ResponseInterface $response)
    {
        $client = new GuzzleClient();

        $mockMakeData = function ($response) {
            return $this->makeData($response);
        };

        $result = $mockMakeData->bindTo($client, $client);
        return $result($response);
    }


    /**
     * @return array
     */
    public function getResponseErrorDataProvider()
    {
        return [
            [new Response(404, [], 'Not found')], // http error
            [new Response(500, ['Content-Encoding' => 'application/json'], '')], // http error
            [new Response(200, ['Content-Encoding' => 'application/json'], '')], // json error
            [new Response(200, ['Content-Encoding' => 'application/json'], $this->getErrorMessage())], // json error
            [new Response(500, ['Content-Encoding' => 'application/json'], $this->getSuccessMessage())], // json error
        ];
    }

    /**
     * @return array
     */
    public function getResponseSuccessDataProvider()
    {
        return [
            [new Response(200, ['Content-Encoding' => 'application/json'], $this->getSuccessMessage())], // success
        ];
    }

    /**
     * @return string
     */
    private function getErrorMessage()
    {
        return file_get_contents(__DIR__ . '/fixtures/error.json');
    }

    /**
     * @return string
     */
    private function getSuccessMessage()
    {
        return file_get_contents(__DIR__ . '/fixtures/success.json');
    }
}
