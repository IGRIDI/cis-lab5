<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CommentRepository")
 */
class Comment
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
    private $idMediaContainer;

    /**
     * @ORM\Column(type="string", length=255)
     */
	private $idPostUser;

    /**
     * @ORM\Column(type="string", length=255)
     */
	
    private $textComment;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdMediaContainer(): ?string
    {
        return $this->idMediaContainer;
    }

    public function setIdMediaContainer(string $idMediaContainer): self
    {
        $this->idMediaContainer = $idMediaContainer;

        return $this;
    }
	
	public function getIdPostUser(): ?string
    {
        return $this->idPostUser;
    }

    public function setIdPostUser(string $idPostUser): self
    {
        $this->idPostUser = $idPostUser;

        return $this;
    }

    public function getTextComment(): ?string
    {
        return $this->textComment;
    }

    public function setTextComment(string $textComment): self
    {
        $this->textComment = $textComment;

        return $this;
    }
}
