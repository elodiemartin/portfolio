<?php

namespace App\Entity;

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
 * @ORM\Entity(repositoryClass="App\Repository\FormationRepository")
 */
class Formation
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     * @Groups({"read"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min=5, max=255, minMessage="Votre nom de formation doit comporter au moins {{ limit }} caractères", maxMessage="Votre nom de formation ne peut pas contenir plus de {{ limit }} caractères")
     * @Groups({"read"})
     */
    private $nameEducation;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min=5, max=255, minMessage="Votre nom d'école doit comporter au moins {{ limit }} caractères", maxMessage="Votre nom d'école ne peut pas contenir plus de {{ limit }} caractères")
     * @Groups({"read"})
     */
    private $nameSchool;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min=5, max=5, maxMessage="Votre code postal d'école ne peut pas contenir plus de {{ limit }} caractères", maxMessage="Votre code postal d'école ne peut pas contenir plus de {{ limit }} caractères")
     * @Groups({"read"})
     */
    private $postCode;
    
    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(max=255, maxMessage="Votre lieu d'école ne peut pas contenir plus de {{ limit }} caractères")
     * @Groups({"read"})
     */
    private $place;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @Assert\Length(min=5, max=255, minMessage="Votre spécialité doit comporter au moins {{ limit }} caractères",maxMessage="Votre spécialité ne peut pas contenir plus de {{ limit }} caractères")
     * @Groups({"read"})
     */
    private $specialty;

    /**
     * @ORM\Column(type="date")
     * @Groups({"read"})
     */
    private $year;

    /**
     * @ORM\Column(type="text")
     * @Assert\Length(min=10, minMessage="Votre description doit comporter au moins {{ limit }} caractères")
     * @Groups({"read"})
     */
    private $content;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameEducation(): ?string
    {
        return $this->nameEducation;
    }

    public function setNameEducation(string $nameEducation): self
    {
        $this->nameEducation = $nameEducation;

        return $this;
    }

    public function getNameSchool(): ?string
    {
        return $this->nameSchool;
    }

    public function setNameSchool(string $nameSchool): self
    {
        $this->nameSchool = $nameSchool;

        return $this;
    }

    public function getPostCode(): ?string
    {
        return $this->postCode;
    }

    public function setPostCode(string $postCode): self
    {
        $this->postCode = $postCode;

        return $this;
    }

    public function getPlace(): ?string
    {
        return $this->place;
    }

    public function setPlace(string $place): self
    {
        $this->place = $place;

        return $this;
    }

    public function getSpecialty(): ?string
    {
        return $this->specialty;
    }

    public function setSpecialty(?string $specialty): self
    {
        $this->specialty = $specialty;

        return $this;
    }

    public function getYear(): ?\DateTimeInterface
    {
        return $this->year;
    }

    public function setYear(\DateTimeInterface $year): self
    {
        $this->year = $year;

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
