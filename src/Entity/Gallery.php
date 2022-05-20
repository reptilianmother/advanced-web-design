<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\GalleryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Table(name="gallery")
 * @ORM\Entity(repositoryClass=GalleryRepository::class)
 * @ApiResource(
 *     normalizationContext={"groups" = {"read"}},
 *     formats={"json"},
 *     denormalizationContext={"groups" = {"write"}}
 * )
 */

class Gallery
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