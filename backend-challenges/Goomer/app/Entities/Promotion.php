<?php


namespace App\Entities;


use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping AS ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="promotion")
 */
class Promotion
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     */
    protected $description;

    /**
     * @ORM\Column(type="float")
     */
    protected $promotional_price;

    /**
     * @ORM\OneToMany(targetEntity="Validity", mappedBy="promotion", cascade={"persist"})
     * @var ArrayCollection|Validity[]
     */
    protected $validity;

    public function __construct(string $description, float $promotional_price)
    {
        $this->description = $description;
        $this->promotional_price = $promotional_price;

        $this->validity = new ArrayCollection();
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return float
     */
    public function getPromotionalPrice(): float
    {
        return $this->promotional_price;
    }

    /**
     * @return Validity[]|ArrayCollection
     */
    public function getValidity()
    {
        return $this->validity;
    }

    public function addValidity(Validity $validity)
    {
        if (!$this->validity->contains($validity)) {
            $validity->setPromotion($this);
            $this->validity->add($validity);
        }
    }
}
