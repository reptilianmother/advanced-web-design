<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\CommentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ApiResource(
    denormalizationContext: ['groups' => ['write']],
    formats: ["json"],
    normalizationContext: ['groups' => ['read']]
)]
#[ORM\Table(name: "comment")]
#[ORM\Entity(repositoryClass: CommentRepository::class)]
class Comment {
    #[ORM\Id]
    #[Groups("read")]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;
	
	#[Groups(["read", "write"])]
	#[ORM\Column(type: 'integer', length: 11)]
    private $user;

	#[Groups(["read", "write"])]
    #[ORM\JoinColumn(nullable: false)]
    #[ORM\Column(type: 'string', length: 1024)]
    private $content;
	

    public function getId(): ?int {
        return $this->id;
    }

    function getContent(): ?string {
        return $this->content;
    }

    public function setContent(string $content): self {
        $this->content = $content;

        return $this;
    }
	
	public function getUser(): ?int {
        return $this->user;
    }

    public function setUser(int $user): self {
        $this->user = $user;

        return $this;
    }
}
