<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass="App\Repository\TypeRepository")
 */
class Type
{
    /**
     * @Groups({"readertrans", "writertrans"})
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Action", mappedBy="type")
     */
    private $actions;

    /**
     * @Groups({"readertrans", "writertrans"})
     * @Groups({"readeraction", "writeraction"})
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $libelletype;

    public function __construct()
    {
        $this->actions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|Action[]
     */
    public function getActions(): Collection
    {
        return $this->actions;
    }

    public function addAction(Action $action): self
    {
        if (!$this->actions->contains($action)) {
            $this->actions[] = $action;
            $action->setType($this);
        }

        return $this;
    }

    public function removeAction(Action $action): self
    {
        if ($this->actions->contains($action)) {
            $this->actions->removeElement($action);
            // set the owning side to null (unless already changed)
            if ($action->getType() === $this) {
                $action->setType(null);
            }
        }

        return $this;
    }

    public function getLibelletype(): ?string
    {
        return $this->libelletype;
    }

    public function setLibelletype(?string $libelletype): self
    {
        $this->libelletype = $libelletype;

        return $this;
    }
}
