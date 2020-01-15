<?php


namespace App\Entities;


use Doctrine\ORM\Mapping AS ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="operation")
 */
class Operation
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    protected $id;

    /**
     * @ORM\Column(type="time")
     */
    protected $opening;

    /**
     * @ORM\Column(type="time")
     */
    protected $closing;

    /**
     * @ORM\Column(type="integer")
     */
    protected $day_of_week;

    /**
     * @ORM\ManyToOne(targetEntity="Restaurant", inversedBy="operation")
     * @ORM\JoinColumn(name="restaurant_id", referencedColumnName="id")
     * @var Restaurant
     */
    protected $restaurant;

    public function __construct(
        string $opening,
        string $closing,
        int $day_of_week,
        Restaurant $restaurant
    ) {
        $this->opening = $opening;
        $this->closing = $closing;
        $this->day_of_week = $day_of_week;
        $this->restaurant = $restaurant;
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
    public function getClosing(): string
    {
        return $this->closing;
    }

    /**
     * @return int
     */
    public function getDayOfWeek(): int
    {
        return $this->day_of_week;
    }

    /**
     * @return string
     */
    public function getOpening(): string
    {
        return $this->opening;
    }

    /**
     * @return Restaurant
     */
    public function getRestaurant(): Restaurant
    {
        return $this->restaurant;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @param string $closing
     */
    public function setClosing(string $closing)
    {
        $this->closing = $closing;
    }

    /**
     * @param int $day_of_week
     */
    public function setDayOfWeek(int $day_of_week)
    {
        $this->day_of_week = $day_of_week;
    }

    /**
     * @param string $opening
     */
    public function setOpening(string $opening)
    {
        $this->opening = $opening;
    }

    /**
     * @param Restaurant $restaurant
     */
    public function setRestaurant(Restaurant $restaurant)
    {
        $this->restaurant = $restaurant;
    }
}
