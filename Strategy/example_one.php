<?php
####################################
##### STRATEGY DESIGN PATTERN ######
####################################
interface TravelStrategy
{
    /**
     * Travel func will be used by implemented classes
     * @return mixed
     */
    public function travel();
}

class BusTravelStrategy implements TravelStrategy
{
    /**
     * Travel via bus
     * @return mixed|void
     */
    public function travel()
    {
        echo "Travel via bus<br/>";
    }
}

class TrainTravelStrategy implements TravelStrategy
{
    /**
     * Travel via train
     * @return mixed|void
     */
    public function travel()
    {
        echo "Travel via train<br/>";
    }
}

class PlaneTravelStrategy implements TravelStrategy
{
    /**
     * Travel via plane
     * @return mixed|void
     */
    public function travel()
    {
        echo "Travel via plane<br/>";
    }
}

class Traveler
{
    protected $traveler;

    /**
     * Assign TravelStrategy class via interface
     * @param TravelStrategy $travelStrategy
     */
    public function __construct(TravelStrategy $travelStrategy)
    {
        $this->traveler = $travelStrategy;
    }

    /**
     * Travel via bus,train or travel
     * @return void
     */
    public function travel()
    {
        $this->traveler->travel();
    }
}

// Instantiate object
$traveler = new Traveler(new BusTravelStrategy());
$traveler->travel();

// Instantiate object
$traveler1 = new Traveler(new TrainTravelStrategy());
$traveler1->travel();