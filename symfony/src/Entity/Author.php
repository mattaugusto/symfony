<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AuthorRepository")
 */
class Author
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

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $description;

    /** @ORM\OneToMany(targetEntity="Album", mappedBy="author") */
    private $albums;

    public function __construct()
    {
        $this->albums = new ArrayCollection();
    }

    public function getId(): ?int { return $this->id; }

    public function getName(): ?string { return $this->name; }

    public function setName(string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function getDescription() { return $this->description; }

    public function setDescription($description): self
    {
        $this->description = $description;
        return $this;
    }

    public function getAlbums() { return $this->albums; }

    public function setAlbums($albums): ArrayCollection
    {
        $this->albums = $albums;
        return $this->albums;
    }

    public function addAlbum($album): ArrayCollection
    {
        $this->albums->add($album);
        return $this->albums;
    }
}
