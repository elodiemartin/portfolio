<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Annotation\ApiResource;


/**
 * @ApiResource(
 *  attributes={
 *         "normalization_context"={"groups"={"read"}}
 *     },
 *       collectionOperations={
 *         "get"
 *     },
 *      itemOperations={
 *          "get"
 *     }
 * )
 * @ORM\Entity(repositoryClass="App\Repository\TechnologieRepository")
 */
class Technologie
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min=3, max=255, minMessage="Votre nom doit comporter au moins {{ limit }} caractères", maxMessage="Votre nom ne peut pas contenir plus de {{ limit }} caractères")
     * @Groups({"read"})
     */
    private $name;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Projet", mappedBy="technologies")
     */
    private $projets;

    public function __construct()
    {
        $this->projets = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection|Projet[]
     */
    public function getProjets(): Collection
    {
        return $this->projets;
    }

    public function addProjet(Projet $projet): self
    {
        if (!$this->projets->contains($projet)) {
            $this->projets[] = $projet;
        }

        return $this;
    }

    public function removeProjet(Projet $projet): self
    {
        if ($this->projets->contains($projet)) {
            $this->projets->removeElement($projet);
        }

        return $this;
    }
}
