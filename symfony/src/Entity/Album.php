<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AlbumRepository")
 */
class Album
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
    private $name;

    /** @ORM\ManyToOne(targetEntity="Author") */
    private $author;

    /** @ORM\OneToMany(targetEntity="Song", mappedBy="album") */
    private $songs;

    public function __construct()
    {
        $this->songs = new ArrayCollection();
    }

    public function getId(): ?int { return $this->id; }

    public function getName(): ?string { return $this->name; }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getAuthor() { return $this->author; }

    public function setAuthor($author): Author
    {
        $this->author = $author;
        return $this->author;
    }

    public function getSongs() { return $this->songs; }

    public function setSongs($songs): ArrayCollection
    {
        $this->songs = $songs;
        return $this->songs;
    }
}
