<?php


namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity(repositoryClass="App\Repository\FlightRepository")
 */

class Flight
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(name="departure_airport", type="integer")
     */
    private $departure_airport;

    /**
     * @ORM\Column(name="arrival_airport", type="integer")
     */
    private $arrival_airport;

    /**
     * @ORM\Column(type="datetime")
     */
    private $departure_datetime;

    /**
     * @ORM\Column(type="datetime")
     */
    private $arrival_datetime;

    /**
     * @ORM\Column(name="main_pilot", type="integer")
     */
    private $main_pilot;

    /**
     * Flight constructor.
     * @param $id
     * @param $departure_aiport
     * @param $arrival_airport
     * @param $departure_datetime
     * @param $arrival_datetime
     * @param $main_pilot
     */
    public function __construct($id, $departure_aiport, $arrival_airport, $departure_datetime, $arrival_datetime, $main_pilot)
    {
        $this->id = $id;
        $this->departure_aiport = $departure_aiport;
        $this->arrival_airport = $arrival_airport;
        $this->departure_datetime = $departure_datetime;
        $this->arrival_datetime = $arrival_datetime;
        $this->main_pilot = $main_pilot;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getDepartureAirport()
    {
        return $this->departure_aiport;
    }

    /**
     * @param mixed $departure_aiport
     */
    public function setDepartureAirport($departure_aiport): void
    {
        $this->departure_aiport = $departure_aiport;
    }

    /**
     * @return mixed
     */
    public function getArrivalAirport()
    {
        return $this->arrival_airport;
    }

    /**
     * @param mixed $arrival_airport
     */
    public function setArrivalAirport($arrival_airport): void
    {
        $this->arrival_airport = $arrival_airport;
    }

    /**
     * @return mixed
     */
    public function getDepartureDatetime()
    {
        return $this->departure_datetime;
    }

    /**
     * @param mixed $departure_datetime
     */
    public function setDepartureDatetime($departure_datetime): void
    {
        $this->departure_datetime = $departure_datetime;
    }

    /**
     * @return mixed
     */
    public function getArrivalDatetime()
    {
        return $this->arrival_datetime;
    }

    /**
     * @param mixed $arrival_datetime
     */
    public function setArrivalDatetime($arrival_datetime): void
    {
        $this->arrival_datetime = $arrival_datetime;
    }

    /**
     * @return mixed
     */
    public function getMainPilot()
    {
        return $this->main_pilot;
    }

    /**
     * @param mixed $main_pilot
     */
    public function setMainPilot($main_pilot): void
    {
        $this->main_pilot = $main_pilot;
    }



}