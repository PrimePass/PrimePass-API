<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TheaterRepository")
 */
class Theater
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
    * @ORM\ManyToOne(targetEntity="App\Entity\Cinema", inversedBy="theaters", cascade={"persist", "remove"})
    * @ORM\JoinColumn(name="cinema_id", referencedColumnName="id", nullable=FALSE)
    */
    private $cinema;


    public function getCinema(): ?cinema
    {
        return $this->cinema;
    }

    public function setCinema(?cinema $cinema): self
    {
        $this->cinema = $cinema;

        return $this;
    }

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $booking_cinema;

    /**
     * @ORM\Column(type="integer")
     */
    private $booking_id;
    
    public function getId(): ?int
    {
        return $this->id;
    }


    public function getBookingCinema(): ?string
    {
        return $this->booking_cinema;
    }

    public function setBookingCinema(string $booking_cinema): self
    {
        $this->booking_cinema = $booking_cinema;

        return $this;
    }

    public function getBookingId(): ?int
    {
        return $this->booking_id;
    }

    public function setBookingId(int $booking_id): self
    {
        $this->booking_id = $booking_id;

        return $this;
    }
}
