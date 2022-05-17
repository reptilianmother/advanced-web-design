<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ApiResource(
    denormalizationContext: ['groups' => ['write']],
    formats: ["json"],
    normalizationContext: ['groups' => ['read']]
)]
#[ORM\Table(name: "user")]
#[ORM\Entity(repositoryClass: UserRepository::class)]
class User {
    #[ORM\Id]
    #[Groups("read")]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[Groups(["read", "write"])]
    #[ORM\Column(type: 'string', length: 255)]
    private $name;
	

    public function getId(): ?int {
        return $this->id;
    }

    function getName(): ?string {
        return $this->name;
    }

    public function setName(string $name): self {
        $this->name = $name;

        return $this;
    }
}
