<?php
####################################
##### FACTORY DESIGN PATTERN ######
######## SIMPLE FACTORY ###########
####################################
interface CarInterface
{
    /**
     * Design func used in implemented classes
     * @return mixed
     */
    public function design();

    /**
     * Assemble func used in implemented classes
     * @return mixed
     */
    public function assemble();

    /**
     * Paint func used in implemented classes
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

class CarFactory
{
    protected $brands = [];

    /**
     * Assign car brands with classes name in array
     */
    public function __construct()
    {
        $this->brands = [
            'mercedes' => 'MercedesCar',
            'toyota' => 'ToyotaCar'
        ];
    }

    /**
     * Create and return car classes instance if exist
     * @param $brand
     * @return Exception|mixed
     */
    public function make($brand)
    {

        if (!array_key_exists($brand, $this->brands)) {
            return new Exception('Not available this car');
        }

        $className = $this->brands[$brand];

        return new $className();
    }
}

// Instantiate carfactory object
$carFactory = new CarFactory;

// Instantiate car name wise car class
$mercedes = $carFactory->make('mercedes');

echo $mercedes->design().'<br/>';
echo $mercedes->assemble().'<br/>';
echo $mercedes->paint().'<br/>';

echo '<br>';

$toyota = $carFactory->make('toyota');
echo $toyota->design().'<br/>';
echo $toyota->assemble().'<br/>';
echo $toyota->paint().'<br/>';

