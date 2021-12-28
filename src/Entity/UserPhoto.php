<?php

namespace App\Entity;

use App\Repository\UserPhotoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserPhotoRepository::class)]
class UserPhoto
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'integer')]
    private $photo_id;

    #[ORM\Column(type: 'string', length: 255)]
    private $parth;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'photo')]
    private $user_id;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPhotoId(): ?int
    {
        return $this->photo_id;
    }

    public function setPhotoId(int $photo_id): self
    {
        $this->photo_id = $photo_id;

        return $this;
    }

    public function getParth(): ?string
    {
        return $this->parth;
    }

    public function setParth(string $parth): self
    {
        $this->parth = $parth;

        return $this;
    }

    public function getUserId(): ?User
    {
        return $this->user_id;
    }

    public function setUserId(?User $user_id): self
    {
        $this->user_id = $user_id;

        return $this;
    }

    public function getUserphoto(): ?User
    {
        return $this->userphoto;
    }

    public function setUserphoto(?User $userphoto): self
    {
        $this->userphoto = $userphoto;

        return $this;
    }
}
