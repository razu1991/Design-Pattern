<?php
####################################
##### FACTORY DESIGN PATTERN ######
####### ABSTRACT FACTORY ##########
####################################
abstract class AbstractVehicleFactory
{
    /**
     * makeCar func will be used by extended classes
     * @return mixed
     */
    abstract public function makeCar();

    /**
     * makeBike func will be used by extended classes
     * @return mixed
     */
    abstract public function makeBike();
}

class BangladeshFactory extends AbstractVehicleFactory
{
    /**
     * makeCar func create ToyotaCar class instance
     * @return ToyotaCar
     */
    public function makeCar()
    {
        return new ToyotaCar();
    }

    /**
     * makeBike func create YamahaBike class instance
     * @return YamahaBike
     */
    public function makeBike()
    {
        return new YamahaBike();
    }

}

class USAFactory extends AbstractVehicleFactory
{
    /**
     * makeCar func create MercedesCar class instance
     * @return MercedesCar
     */
    public function makeCar()
    {
        return new MercedesCar();
    }

    /**
     * makeBike func create DucatiBike class instance
     * @return DucatiBike
     */
    public function makeBike()
    {
        return new DucatiBike();
    }
}

abstract class AbstractVehicle
{
    /**
     * design func will be used by extended classes
     * @return mixed
     */
    abstract public function design();

    /**
     * assemble func will be used by extended classes
     * @return mixed
     */
    abstract public function assemble();

    /**
     * paint func will be used by extended classes
     * @return mixed
     */
    abstract public function paint();
}

abstract class AbstractCarVehicle extends AbstractVehicle
{

}

abstract class AbstractBikeVehicle extends AbstractVehicle
{

}

class MercedesCar extends AbstractCarVehicle
{
    /**
     * Design mercedes car
     * @return string
     */
    public function design()
    {
        return 'Designing Mercedes Car';
    }

    /**
     * Assemble mercedes car
     * @return string
     */
    public function assemble()
    {
        return 'Assembling Mercedes Car';
    }

    /**
     * Paint mercedes car
     * @return string
     */
    public function paint()
    {
        return 'Painting Mercedes Car';
    }
}

class ToyotaCar extends AbstractCarVehicle
{
    /**
     * Design toyota car
     * @return string
     */
    public function design()
    {
        return 'Designing Toyota Car';
    }

    /**
     * Assemble toyota car
     * @return string
     */
    public function assemble()
    {
        return 'Assembling Toyota Car';
    }

    /**
     * Paint toyota car
     * @return string
     */
    public function paint()
    {
        return 'Painting Toyota Car';
    }
}

class YamahaBike extends AbstractBikeVehicle
{
    /**
     * Design yamaha bike
     * @return string
     */
    public function design()
    {
        return 'Designing Yamaha Bike';
    }

    /**
     * Assemble yamaha bike
     * @return string
     */
    public function assemble()
    {
        return 'Assembling Yamaha Bike';
    }

    /**
     * Paint yamaha bike
     * @return string
     */
    public function paint()
    {
        return 'Painting Yamaha Bike';
    }
}

class DucatiBike extends AbstractBikeVehicle
{
    /**
     * Design ducati bike
     * @return string
     */
    public function design()
    {
        return 'Designing Ducati Bike';
    }

    /**
     * Assemble ducati bike
     * @return string
     */
    public function assemble()
    {
        return 'Assembling Ducati Bike';
    }

    /**
     * Paint ducati bike
     * @return string
     */
    public function paint()
    {
        return 'Painting Ducati Bike';
    }
}

// Instantiate factory
$bangladeshiFactoryInstance = new BangladeshFactory();

// Instantiate product
$car = $bangladeshiFactoryInstance->makeCar();
echo $car->design() . '<br/>';
echo $car->assemble() . '<br/>';
echo $car->paint() . '<br/>';

echo '<br/>';

// Instantiate product
$bike = $bangladeshiFactoryInstance->makeBike();
echo $bike->design() . '<br/>';
echo $bike->assemble() . '<br/>';
echo $bike->paint() . '<br/>';

echo '<br/>';

// Instantiate factory
$usaFactoryInstance = new USAFactory;

// Instantiate product
$car = $usaFactoryInstance->makeCar();
echo $car->design() . '<br/>';
echo $car->assemble() . '<br/>';
echo $car->paint() . '<br/>';

echo '<br/>';

$bike = $usaFactoryInstance->makeCar();
echo $bike->design() . '<br/>';
echo $bike->assemble() . '<br/>';
echo $bike->paint() . '<br/>';