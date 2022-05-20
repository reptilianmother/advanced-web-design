<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\PhotoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;
use App\Model\ImageInput;

/**
 * @ORM\Table(name="photo", indexes={@ORM\Index(name="album", columns={"album"})})
 * @ORM\Entity(repositoryClass=PhotoRepository::class)
 * @ApiResource(
 *     formats={"json"},
 *     input=ImageInput::CLASS
 * )
 */

class Photo
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
     * @var \Album
     *
     * @ORM\ManyToOne(targetEntity="Album")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="album", referencedColumnName="id")
     * })
     */
    private $album;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length="100", nullable="false")
     * @Groups({"read", "write"})
     */
    private $name;
	
	/**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length="100", nullable="false")
     * @Groups({"read", "write"})
     */
    private $description;
	
	/**
     * @var string
     *
     * @ORM\Column(name="path", type="string", length="100", nullable="false")
     * @Groups({"read", "write"})
     */
    private $path;
	
	
    public function getId(): ?int
    {
        return $this->id;
    }
	
	public function getAlbum(): ?Album
    {
        return $this->album;
    }

    public function setAlbum(?Album $album): self
    {
        $this->album = $album;

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
	
	public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }
	
	public function getPath(): ?string
    {
        return $this->path;
    }

    public function setPath(string $path): self
    {
        $this->path = $path;

        return $this;
    }

}