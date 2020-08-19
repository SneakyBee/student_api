<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;
use App\Repository\GradeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource(
 *      collectionOperations={"get","post",
 *          "get_global_average"={
 *              "path"="/grades/global_average",
 *              "controller"="GetGlobalAverageController::class"
 *          }
 *      },
 *      itemOperations={"get","put","patch","delete"}
 * )
 * @ORM\Entity(repositoryClass=GradeRepository::class)
 */
class Grade
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     * @Assert\Range(
     *      min = 0,
     *      max = 20,
     *      notInRangeMessage = "A grade must be between 0 to 20"
     * )
     */
    private $value;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $subject;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Student", inversedBy="grade")
     * @ORM\JoinColumn(nullable=false, onDelete="CASCADE")
     * @Groups({"grade:read", "grade:write"})
     */
    private $student;

    public function __construct()
    {
        $this->student_id = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getValue(): ?int
    {
        return $this->value;
    }

    public function setValue(int $value): self
    {
        $this->value = $value;

        return $this;
    }

    public function getSubject(): ?string
    {
        return $this->subject;
    }

    public function setSubject(string $subject): self
    {
        $this->subject = $subject;

        return $this;
    }

    public function getStudent(): ?Student
    {
        return $this->student;
    }

    public function setStudent(?Student $student): self{
        $this->student = $student;

        return $this;
    }

}
