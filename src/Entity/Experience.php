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
 * @ORM\Entity(repositoryClass="App\Repository\ExperienceRepository")
 */
class Experience
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
     * @Assert\Length(min=5, max=255, minMessage="Votre titre d'expérience doit comporter au moins {{ limit }} caractères", maxMessage="Votre titre d'expérience ne peut pas contenir plus de {{ limit }} caractères")
     * @Groups({"read"})
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min=4, max=255, minMessage="Votre nom d'entreprise doit comporter au moins {{ limit }} caractères", maxMessage="Votre nom d'entreprise ne peut pas contenir plus de {{ limit }} caractères")
     * @Groups({"read"})
     */
    private $nameCompany;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min=5, max=5, maxMessage="Votre code postal d'école ne peut pas contenir plus de {{ limit }} caractères", maxMessage="Votre code postal d'école ne peut pas contenir plus de {{ limit }} caractères")
     * @Groups({"read"})
     */
    private $postCode;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(max=255, maxMessage="Votre lieu d'entreprise ne peut pas contenir plus de {{ limit }} caractères")
     * @Groups({"read"})
     */
    private $place;

    /**
     * @ORM\Column(type="dateinterval")
     * @Groups({"read"})
     */
    private $duration;

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

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getNameCompany(): ?string
    {
        return $this->nameCompany;
    }

    public function setNameCompany(string $nameCompany): self
    {
        $this->nameCompany = $nameCompany;

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

    public function getDuration(): ?\DateInterval
    {
        return $this->duration;
    }

    public function setDuration(\DateInterval $duration): self
    {
        $this->duration = $duration;

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
