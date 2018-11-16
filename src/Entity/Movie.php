<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MovieRepository")
 */
class Movie
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $velox_id;

    /**
     * @ORM\Column(type="integer")
     */
    private $ingresso_db;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $imdb_id;

    /**
     * @ORM\Column(type="boolean")
     */
    private $status;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getVeloxId(): ?string
    {
        return $this->velox_id;
    }

    public function setVeloxId(string $velox_id): self
    {
        $this->velox_id = $velox_id;

        return $this;
    }

    public function getIngressoDb(): ?int
    {
        return $this->ingresso_db;
    }

    public function setIngressoDb(int $ingresso_db): self
    {
        $this->ingresso_db = $ingresso_db;

        return $this;
    }

    public function getImdbId(): ?string
    {
        return $this->imdb_id;
    }

    public function setImdbId(string $imdb_id): self
    {
        $this->imdb_id = $imdb_id;

        return $this;
    }

    public function getStatus(): ?bool
    {
        return $this->status;
    }

    public function setStatus(bool $status): self
    {
        $this->status = $status;

        return $this;
    }
}
