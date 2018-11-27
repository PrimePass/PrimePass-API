<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
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
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $velox_id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $ingresso_id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $imdb_id;

    /**
     * @ORM\Column(type="boolean")
     */
    private $status;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Media", mappedBy="movie")
     */
    private $media;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\MovieInfo", mappedBy="movie", cascade={"persist", "remove"})
     */
    private $movieInfo;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Session", mappedBy="movie")
     */
    private $sessions;

    public function __construct()
    {
        $this->media = new ArrayCollection();
        $this->sessions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getVeloxId(): ?string
    {
        return $this->velox_id;
    }

    public function setVeloxId(?string $velox_id): self
    {
        $this->velox_id = $velox_id;

        return $this;
    }

    public function getIngressoId(): ?int
    {
        return $this->ingresso_id;
    }

    public function setIngressoId(?int $ingresso_id): self
    {
        $this->ingresso_id = $ingresso_id;

        return $this;
    }

    public function getImdbId(): ?string
    {
        return $this->imdb_id;
    }

    public function setImdbId(?string $imdb_id): self
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

    /**
     * @return Collection|Media[]
     */
    public function getMedia(): Collection
    {
        return $this->media;
    }

    public function addMedium(Media $medium): self
    {
        if (!$this->media->contains($medium)) {
            $this->media[] = $medium;
            $medium->setMovie($this);
        }

        return $this;
    }

    public function removeMedium(Media $medium): self
    {
        if ($this->media->contains($medium)) {
            $this->media->removeElement($medium);
            // set the owning side to null (unless already changed)
            if ($medium->getMovie() === $this) {
                $medium->setMovie(null);
            }
        }

        return $this;
    }

    public function getMovieInfo(): ?MovieInfo
    {
        return $this->movieInfo;
    }

    public function setMovieInfo(MovieInfo $movieInfo): self
    {
        $this->movieInfo = $movieInfo;

        // set the owning side of the relation if necessary
        if ($this !== $movieInfo->getMovie()) {
            $movieInfo->setMovie($this);
        }

        return $this;
    }

    /**
     * @return Collection|Session[]
     */
    public function getSessions(): Collection
    {
        return $this->sessions;
    }

    public function addSession(Session $session): self
    {
        if (!$this->sessions->contains($session)) {
            $this->sessions[] = $session;
            $session->setMovie($this);
        }

        return $this;
    }

    public function removeSession(Session $session): self
    {
        if ($this->sessions->contains($session)) {
            $this->sessions->removeElement($session);
            // set the owning side to null (unless already changed)
            if ($session->getMovie() === $this) {
                $session->setMovie(null);
            }
        }

        return $this;
    }
}
