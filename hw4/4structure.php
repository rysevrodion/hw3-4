<?php
interface iTariff
{
    public function calcPrice();
    public function add(iAddition $addition);
    public function getDuration();
    public function getDistance();
}

interface iAddition
{
    public function addition(iTariff $tariff, &$price);
}

abstract class TariffAbstract implements iTariff
{
    protected $priceDistance;
    protected $priceDuration;
    protected $distance;
    protected $duration;
    protected $additions = [];

    public function __construct(int $distance, int $duration)
    {
        $this->distance = $distance;
        $this->duration = $duration;
    }

    public function calcPrice(): int
    {
        $price = $this->distance * $this->priceDistance + $this->duration * $this->priceDuration;

        if ($this->additions) {
            foreach ($this->additions as $addition) {
                $addition->addition($this, $price);
            }
        }
        return $price;
    }

    public function add(iAddition $addition): iTariff
    {
        $this->additions[] = $addition;
        return $this;
    }

    public function getDuration(): int
    {
        return $this->duration;
    }

    public function getDistance(): int
    {
        return $this->distance;
    }
}

class TariffBasic extends TariffAbstract
{
    protected $priceDistance = 10;
    protected $priceDuration = 3;
}

class TariffHour extends TariffAbstract
{
    protected $priceDistance = 0;
    protected $priceDuration = 200 / 60;

    public function __construct(int $distance, int $duration)
    {
        parent::__construct($distance, $duration);
        $this->duration = $this->duration - $this->duration % 60 + 60;
    }
}

class TariffStudent extends TariffAbstract
{
    protected $priceDistance = 4;
    protected $priceDuration = 1;
}

class additionDriver implements iAddition
{
    private $price;

    public function __construct()
    {
        $this->price = 100;
    }

    public function addition(iTariff $tariff, &$price)
    {
        $price += $this->price;
    }
}

class additionGPS implements iAddition
{
    private $priceDurationHours;

    public function __construct()
    {
        $this->priceDurationHours = 15;
    }

    public function addition(iTariff $tariff, &$price)
    {
        $hours = ceil($tariff->getDuration() / 60);
        $price += $this->priceDurationHours * $hours;
    }
}

?>