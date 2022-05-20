<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\AlbumRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Table(name="album", indexes={@ORM\Index(name="gallery", columns={"gallery"})})
 * @ORM\Entity(repositoryClass=AlbumRepository::class)
 * @ApiResource(
 *     normalizationContext={"groups" = {"read"}},
 *     formats={"json"},
 *     denormalizationContext={"groups" = {"write"}}
 * )
 */

class Album
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable="false")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     * @Groups("read")
     * 
     */

    private $id;
	
	/**
     * @var \Gallery
     *
     * @ORM\ManyToOne(targetEntity="Gallery")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="gallery", referencedColumnName="id")
     * })
     */
    private $gallery;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length="100", nullable="false")
     * @Groups({"read", "write"})
     */
    private $name;
	
	
    public function getId(): ?int
    {
        return $this->id;
    }
	
	public function getGallery(): ?Gallery
    {
        return $this->gallery;
    }

    public function setGallery(?Gallery $gallery): self
    {
        $this->gallery = $gallery;

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

}