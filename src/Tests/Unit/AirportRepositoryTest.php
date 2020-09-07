<?php

namespace Muaramasad\Airport\Tests\Unit;
use Muaramasad\Airport\Repositories\AirportRepository;
use Muaramasad\Airport\Services\Params\AirportParam;
use Muaramasad\Airport\Tests\TestCase;

class AirportRepositoryTest extends TestCase
{
    private $airportRepository;

    private function airportRepository() :AirportRepository
    {
        if($this->airportRepository == null){
            $this->airportRepository = new AirportRepository();
        }
        return $this->airportRepository;
    }

    protected function setUp() :void
    {
        parent::setUp();
    }

    public function dummyData(int $id)
    {
        $airportParam = new AirportParam();
        $airportParam->setId($id+1000000);
        $airportParam->setIdent($this->getFaker()->text(10));
        $airportParam->setType($this->getFaker()->text(20));
        $airportParam->setName($this->getFaker()->text(75));
        $airportParam->setLatitudeDeg($this->getFaker()->latitude);
        $airportParam->setLongitudeDeg($this->getFaker()->longitude);
        $airportParam->setElevationFt($this->getFaker()->numberBetween(1, 20));
        $airportParam->setContinent($this->getFaker()->text(5));
        $airportParam->setIsoCountry($this->getFaker()->countryISOAlpha3);
        $airportParam->setIsoRegion($this->getFaker()->countryISOAlpha3);
        $airportParam->setMunicipality($this->getFaker()->text(15));
        $airportParam->setScheduledService($this->getFaker()->text(5));
        $airportParam->setGpsCode($this->getFaker()->text(5));
        $airportParam->setIataCode($this->getFaker()->text(5));
        $airportParam->setLocalCode($this->getFaker()->text(20));
        $airportParam->setHomeLink($this->getFaker()->url);
        $airportParam->setWikipediaLink($this->getFaker()->url);
        $airportParam->setKeywords($this->getFaker()->text(200));

        return $airportParam;
    }

    public function testAddRepository()
    {
        $dummy = $this->dummyData($this->getFaker()->randomNumber());

        $result = $this->getContainer()->call([$this->airportRepository(), 'addAirport'], ['airportParam' => $dummy]);

        self::assertNotEquals(null, $result);
    }
}