<?php

namespace Muaramasad\Airport\Repositories;
use Doctrine\DBAL\Query\QueryException;
use Muaramasad\Airport\Models\Airport;
use Muaramasad\Airport\Services\Params\AirportParam;

class AirportRepository
{
    /**
     * @param AirportParam $airportParam
     * @param Airport $airport
     * @return Airport|null
     */
    public function addAirport(AirportParam $airportParam, Airport $airport): ?Airport
    {
        try {
            $airport->id = $airportParam->getId();
            $airport->ident = $airportParam->getIdent();
            $airport->type = $airportParam->getType();
            $airport->name = $airportParam->getName();
            $airport->latitude_deg = $airportParam->getLatitudeDeg();
            $airport->longitude_deg = $airportParam->getLongitudeDeg();
            $airport->elevation_ft = $airportParam->getElevationFt();
            $airport->continent = $airportParam->getContinent();
            $airport->iso_country = $airportParam->getIsoCountry();
            $airport->iso_region = $airportParam->getIsoRegion();
            $airport->municipality = $airportParam->getMunicipality();
            $airport->scheduled_service = $airportParam->getScheduledService();
            $airport->gps_code = $airportParam->getGpsCode();
            $airport->iata_code = $airportParam->getIataCode();
            $airport->local_code = $airportParam->getLocalCode();
            $airport->home_link = $airportParam->getHomeLink();
            $airport->wikipedia_link = $airportParam->getWikipediaLink();
            $airport->keywords = $airportParam->getKeywords();
            $airport->save();
            return $airport;
        } catch (QueryException $queryException) {
            report($queryException);
            return null;
        }
    }
}