<?php


namespace App\Entities;

use DateTime;

use Doctrine\ORM\Mapping AS ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="validity")
 */
class Validity
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
    protected $start_at;

    /**
     * @ORM\Column(type="time")
     */
    protected $end_at;

    /**
     * @ORM\Column(type="integer")
     */
    protected $day_of_week;

    /**
     * @ORM\ManyToOne(targetEntity="Promotion", inversedBy="validity")
     * @ORM\JoinColumn(name="promotion_id", referencedColumnName="id")
     * @var Promotion
     */
    protected $promotion;

    /**
     * Validity constructor.
     * @param DateTime $start_at
     * @param DateTime $end_at
     * @param int $day_of_week
     * @param null $promotion
     */
    public function __construct(DateTime $start_at, DateTime $end_at, int $day_of_week, $promotion = null)
    {
        $this->start_at = $start_at;
        $this->end_at = $end_at;
        $this->day_of_week = $day_of_week;
        $this->promotion = $promotion;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return Promotion
     */
    public function getPromotion(): Promotion
    {
        return $this->promotion;
    }

    /**
     * @return int
     */
    public function getDayOfWeek(): int
    {
        return $this->day_of_week;
    }

    /**
     * @return mixed
     */
    public function getEndAt()
    {
        return $this->end_at->format('H:i');
    }

    /**
     * @return string
     */
    public function getStartAt(): string
    {
        return $this->start_at->format('H:i');
    }

    /**
     * @param Promotion $promotion
     */
    public function setPromotion(Promotion $promotion)
    {
        $this->promotion = $promotion;
    }
}
