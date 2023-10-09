<?php

namespace App\Entity;

use App\Repository\MediaRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MediaRepository::class)]
class Media
{
    const TYPE_IMAGE = 'image';
    const TYPE_VIDEO = 'video';

    const TYPES = [self::TYPE_IMAGE, self::TYPE_VIDEO];

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $path = null;

    #[ORM\Column(length: 100)]
    private ?string $description = null;

    #[ORM\ManyToOne(inversedBy: 'media')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Trick $trick = null;

    #[ORM\Column(length: 10)]
    private ?string $type = null;

    #[ORM\OneToOne(mappedBy: 'chosenImage', cascade: ['persist', 'remove'])]
    private ?Trick $chosenImageForTrick = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPath(): ?string
    {
        return $this->path;
    }

    public function setPath(string $path): static
    {
        $this->path = $path;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getTrick(): ?Trick
    {
        return $this->trick;
    }

    public function setTrick(?Trick $trick): static
    {
        $this->trick = $trick;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): static
    {
        if (!in_array($type, self::TYPES)) {
            throw new \Exception(sprintf('Type %s is not supported as a media type.', $type));
        }

        $this->type = $type;

        return $this;
    }

    public function getChosenImageForTrick(): ?Trick
    {
        return $this->chosenImageForTrick;
    }

    public function setChosenImageForTrick(?Trick $chosenImageForTrick): static
    {
        // unset the owning side of the relation if necessary
        if ($chosenImageForTrick === null && $this->chosenImageForTrick !== null) {
            $this->chosenImageForTrick->setChosenImage(null);
        }

        // set the owning side of the relation if necessary
        if ($chosenImageForTrick !== null && $chosenImageForTrick->getChosenImage() !== $this) {
            $chosenImageForTrick->setChosenImage($this);
        }

        $this->chosenImageForTrick = $chosenImageForTrick;

        return $this;
    }
}
