<?php

namespace App\Entity;

use App\Repository\TrickRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Valid;

#[ORM\Entity(repositoryClass: TrickRepository::class)]
#[UniqueEntity('name')]
class Trick
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100, unique: true)]
    private ?string $slug = null;

    #[ORM\Column(length: 60, unique: true)]
    #[NotBlank]
    private ?string $name = null;

    #[ORM\Column(type: Types::TEXT)]
    #[NotBlank]
    private ?string $description = null;

    #[ORM\OneToMany(mappedBy: 'trick', targetEntity: Media::class, cascade: ['persist', 'remove'], orphanRemoval: true)]
    #[Valid]
    private Collection $medias;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $creationDate = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $updatingDate = null;

    #[ORM\ManyToOne(inversedBy: 'tricks')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Group $groupTrick = null;

    #[ORM\OneToMany(mappedBy: 'trick', targetEntity: Message::class, orphanRemoval: true)]
    private Collection $messages;

    #[ORM\OneToOne(inversedBy: 'chosenImageForTrick', cascade: ['persist', 'remove'])]
    private ?Media $chosenImage = null;

    public function __construct()
    {
        $this->medias = new ArrayCollection();
        $this->messages = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): static
    {
        $this->slug = $slug;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

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

    /**
     * @return Collection<int, Media>
     */
    public function getMedias(): Collection
    {
        return $this->medias;
    }

    public function addMedia(Media $media): static
    {
        if (!$this->medias->contains($media)) {
            $this->medias->add($media);
            $media->setTrick($this);
        }

        return $this;
    }

    public function removeMedia(Media $media): static
    {
        if ($this->medias->removeElement($media)) {
            // set the owning side to null (unless already changed)
            if ($media->getTrick() === $this) {
                $media->setTrick(null);
            }
        }

        return $this;
    }

    public function getCreationDate(): ?\DateTimeInterface
    {
        return $this->creationDate;
    }

    public function setCreationDate(\DateTimeInterface $creationDate): static
    {
        $this->creationDate = $creationDate;

        return $this;
    }

    public function getUpdatingDate(): ?\DateTimeInterface
    {
        return $this->updatingDate;
    }

    public function setUpdatingDate(?\DateTimeInterface $updatingDate): static
    {
        $this->updatingDate = $updatingDate;

        return $this;
    }

    public function getGroupTrick(): ?Group
    {
        return $this->groupTrick;
    }

    public function setGroupTrick(?Group $groupTrick): static
    {
        $this->groupTrick = $groupTrick;

        return $this;
    }

    /**
     * @return Collection<int, Message>
     */
    public function getMessages(): Collection
    {
        return $this->messages;
    }

    public function addMessage(Message $message): static
    {
        if (!$this->messages->contains($message)) {
            $this->messages->add($message);
            $message->setTrick($this);
        }

        return $this;
    }

    public function removeMessage(Message $message): static
    {
        if ($this->messages->removeElement($message)) {
            // set the owning side to null (unless already changed)
            if ($message->getTrick() === $this) {
                $message->setTrick(null);
            }
        }

        return $this;
    }

    public function getChosenImage(): ?Media
    {
        return $this->chosenImage;
    }

    public function setChosenImage(?Media $chosenImage): static
    {
        $this->chosenImage = $chosenImage;

        return $this;
    }
}
