<?php


namespace App\Entities;

use Doctrine\ORM\Mapping AS ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @ORM\Entity
 * @ORM\Table(name="restaurant")
 */
class Restaurant
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
    protected $name;

    /**
     * @ORM\Column(type="string")
     */
    protected $address;

    /**
     * @ORM\OneToMany(targetEntity="Product", mappedBy="restaurant", cascade={"persist"})
     * @var ArrayCollection|Product[]
     */
    protected $products;

    /**
     * @ORM\Column(type="string")
     */
    protected $photo_url;

    /**
     * @ORM\OneToMany(targetEntity="Operation", mappedBy="restaurant", cascade={"persist"})
     * @var ArrayCollection|Operation[]
     */
    protected $operation;

    public function __construct(string $name, string $address, string $photo_url)
    {
        $this->name = $name;
        $this->address = $address;
        $this->photo_url = $photo_url;

        $this->products = new ArrayCollection();
        $this->operation = new ArrayCollection();
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getAddress(): string
    {
        return $this->address;
    }

    /**
     * @return Operation[]|ArrayCollection
     */
    public function getOperation()
    {
        return $this->operation;
    }

    /**
     * @return string
     */
    public function getPhotoUrl(): string
    {
        return $this->photo_url;
    }

    /**
     * @return Product[]|ArrayCollection
     */
    public function getProducts()
    {
        return $this->products;
    }

    /**
     * @param string $address
     */
    public function setAddress(string $address)
    {
        $this->address = $address;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * @param string $photo_url
     */
    public function setPhotoUrl(string $photo_url)
    {
        $this->photo_url = $photo_url;
    }

    public function addProduct(Product $product)
    {
        if (!$this->products->contains($product)) {
            $product->setRestaurant($this);
            $this->products->add($product);
        }
    }

    public function addOperation(Operation $operation)
    {
        if (!$this->operation->contains($operation)) {
            $operation->setRestaurant($this);
            $this->operation->add($operation);
        }
    }
}
