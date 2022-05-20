<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\AlbumRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Table(name="comment", indexes={@ORM\Index(name="user", columns={"user"})})
 * @ORM\Entity(repositoryClass=CommentRepository::class)
 * @ApiResource(
 *     normalizationContext={"groups" = {"read"}},
 *     formats={"json"},
 *     denormalizationContext={"groups" = {"write"}}
 * )
 */

class Comment
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
     * @var \User
     *
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user", referencedColumnName="id")
     * })
     */
    private $user;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="string", length="160", nullable="false")
     * @Groups({"read", "write"})
     */
    private $content;
	
	
    public function getId(): ?int
    {
        return $this->id;
    }
	
	public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
    }

}