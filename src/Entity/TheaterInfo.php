<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TheaterInfoRepository")
 */
class TheaterInfo
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\theater", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $theater;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\city", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $city;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\address", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $address;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="boolean")
     */
    private $is_active;

    /**
     *@ORM\Column(type="boolean")
     */
    private $has_bombonieri;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTheater(): ?theater
    {
        return $this->theater;
    }

    public function setTheater(theater $theater): self
    {
        $this->theater = $theater;

        return $this;
    }

    public function getCity(): ?city
    {
        return $this->city;
    }

    public function setCity(city $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getAddress(): ?address
    {
        return $this->address;
    }

    public function setAddress(address $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getIsActive(): ?bool
    {
        return $this->is_active;
    }

    public function setIsActive(bool $is_active): self
    {
        $this->is_active = $is_active;

        return $this;
    }

        public function getHasBombonieri(): ?int
    {
        return $this->has_bombonieri;
    }

    public function setHasBombonieri(bool $has_bombonieri): self
    {
        $this->has_bombonieri = $has_bombonieri;

        return $this;
    }

}
