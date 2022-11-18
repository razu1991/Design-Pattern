<?php
####################################
##### FACTORY DESIGN PATTERN ######
######## FACTORY METHOD ###########
####################################
abstract class VehicleFactoryMethod
{
    /**
     * Make func will be used all extended classes
     * @param $brand
     * @return mixed
     */
    abstract public function make($brand);
}

interface CarInterface
{
    /**
     * Design func will be used  by all implemented classes
     * @return mixed
     */
    public function design();

    /**
     * Assemble func will be used  by all implemented classes
     * @return mixed
     */
    public function assemble();

    /**
     * Paint func will be used  by all implemented classes
     * @return mixed
     */
    public function paint();
}

interface BikeInterface
{
    /**
     * Design func will be used  by all implemented classes
     * @return mixed
     */
    public function design();

    /**
     * Assemble func will be used  by all implemented classes
     * @return mixed
     */
    public function assemble();

    /**
     * Paint func will be used  by all implemented classes
     * @return mixed
     */
    public function paint();
}

class MercedesCar implements CarInterface
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

class ToyotaCar implements CarInterface
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

class YamahaBike implements BikeInterface
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

class DucatiBike implements BikeInterface
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

class CarFactory extends VehicleFactoryMethod
{
    /**
     * Make car
     * @param $brand
     * @return MercedesCar|ToyotaCar|null
     */
    public function make($brand)
    {
        $car = null;

        switch ($brand) {
            case "mercedes":
                $car = new MercedesCar;
                break;
            case "toyota":
                $car = new ToyotaCar;
                break;
        }

        return $car;
    }
}

class BikeFactory extends VehicleFactoryMethod
{
    /**
     * Make bike
     * @param $brand
     * @return DucatiBike|YamahaBike|null
     */
    public function make($brand)
    {
        $bike = null;

        switch ($brand) {
            case "yamaha":
                $bike = new YamahaBike;
                break;
            case "ducati":
                $bike = new DucatiBike;
                break;
        }

        return $bike;
    }
}

// Instantiate car factory
$carFactoryInstance = new CarFactory;

// Instantiate car classes via car factory make func
$mercedes = $carFactoryInstance->make('mercedes');
echo $mercedes->design() . '<br/>';
echo $mercedes->assemble() . '<br/>';
echo $mercedes->paint() . '<br/>';

echo '<br/>';

// Instantiate car classes via car factory make func
$toyota = $carFactoryInstance->make('toyota');
echo $mercedes->design() . '<br/>';
echo $mercedes->assemble() . '<br/>';
echo $mercedes->paint() . '<br/>';

echo '<br/>';

// Instantiate bike factory
$bikeFactoryInstance = new BikeFactory;

// Instantiate bike classes via bike factory make func
$yamaha = $bikeFactoryInstance->make('yamaha');
echo $yamaha->design() . '<br/>';
echo $yamaha->assemble() . '<br/>';
echo $yamaha->paint() . '<br/>';

echo '<br/>';

// Instantiate bike classes via bike factory make func
$ducati = $bikeFactoryInstance->make('ducati');
echo $ducati->design() . '<br/>';
echo $ducati->assemble() . '<br/>';
echo $ducati->paint() . '<br/>';
