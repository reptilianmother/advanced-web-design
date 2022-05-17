<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\AlbumRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ApiResource(
    denormalizationContext: ['groups' => ['write']],
    formats: ["json"],
    normalizationContext: ['groups' => ['read']]
)]
#[ORM\Table(name: "album")]
#[ORM\Entity(repositoryClass: AlbumRepository::class)]
class Album {
    #[ORM\Id]
    #[Groups("read")]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

	#[Groups(["read", "write"])]
	#[ORM\Column(type: 'integer', length: 11)]
    private $gallery;

    #[Groups(["read", "write"])]
    #[ORM\Column(type: 'string', length: 255)]
    private $name;
	

    public function getId(): ?int {
        return $this->id;
    }

    public function getName(): ?string {
        return $this->name;
    }

    public function setName(string $name): self {
        $this->name = $name;

        return $this;
    }
	
	 public function getGallery(): ?int {
        return $this->gallery;
    }

    public function setGallery(int $gallery): self {
        $this->gallery = $gallery;

        return $this;
    }

}
