<?php


namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PlaneRepository")
 */
class Plane
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=25)
     */
    private $model;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $code;

    /**
     * Plane constructor.
     * @param $id
     * @param $name
     * @param $model
     * @param $code
     * @param $manufacturer
     */
    public function __construct($id, $name, $model, $code, $manufacturer)
    {
        $this->id = $id;
        $this->name = $name;
        $this->model = $model;
        $this->code = $code;
        $this->manufacturer = $manufacturer;
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
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * @param mixed $model
     */
    public function setModel($model): void
    {
        $this->model = $model;
    }

    /**
     * @return mixed
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param mixed $code
     */
    public function setCode($code): void
    {
        $this->code = $code;
    }

    /**
     * @return mixed
     */
    public function getManufacturer()
    {
        return $this->manufacturer;
    }

    /**
     * @param mixed $manufacturer
     */
    public function setManufacturer($manufacturer): void
    {
        $this->manufacturer = $manufacturer;
    }

    /**
     * @ORM\Column(type="string", length=5)
     */
    private $manufacturer;
}