<?php

namespace App\Form\DTO;

use App\Validator\UserUniqueEntity;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\Validator\Constraints\NotBlank;

#[UserUniqueEntity]
class CreateAccountDTO
{
    #[NotBlank(message: 'Une adresse email est demandée.')]
    #[Email(message: 'Cet email n\'est pas valide.')]
    private ?string $email = null;
    #[NotBlank(message: 'Un mot de passe est demandé.')]
    private ?string $password = null;
    #[NotBlank(message: 'Un nom d\'utilisateur est demandé.')]
    private ?string $username = null;
    private ?string $pictureUrl = null;

    #[File(maxSize: '100k', mimeTypes: ['application/jpg', 'application/png'], mimeTypesMessage: 'S\'il vous plait, téléchargez une image dans un format valide.')]
    private ?UploadedFile $pictureFile = null;

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): void
    {
        $this->email = $email;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(?string $password): void
    {
        $this->password = $password;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(?string $username): void
    {
        $this->username = $username;
    }

    public function getPictureUrl(): ?string
    {
        return $this->pictureUrl;
    }

    public function setPictureUrl(?string $pictureUrl): void
    {
        $this->pictureUrl = $pictureUrl;
    }

    public function getPictureFile(): ?UploadedFile
    {
        return $this->pictureFile;
    }

    public function setPictureFile(?UploadedFile $pictureFile): void
    {
        $this->pictureFile = $pictureFile;
    }
}
