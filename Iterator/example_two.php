<?php
####################################
##### ITERATOR DESIGN PATTERN #####
####################################
class CarIterator implements Iterator
{
    private $position = 0;
    private $cars;

    /**
     * Assign cars value
     * @param CarCollection $cars
     */
    public function __construct(CarCollection $cars)
    {
        $this->cars = $cars;
    }

    /**
     * Return current value
     * @return array|mixed|null
     */
    public function current()
    {
        return $this->cars->getName($this->position);
    }

    /**
     * Return key or index
     * @return int|mixed|null
     */
    public function key()
    {
        return $this->position;
    }

    /**
     * Return next iteration value via index or key
     * @return void
     */
    public function next()
    {
        $this->position++;
    }

    /**
     * Rewind from 0 or custom key
     * @return void
     */
    public function rewind()
    {
        $this->position = 0;
    }

    /**
     * Check value is valid or not
     * @return bool
     */
    public function valid()
    {
        return !is_null($this->cars->getName($this->position));
    }
}

class CarCollection implements IteratorAggregate
{
    public $names = [];

    /**
     * Pass this object to CarIterator class
     * @return CarIterator
     */
    public function getIterator()
    {
        return new CarIterator($this);
    }


    /**
     * Set name or push name value to array
     * @param $string
     * @return void
     */
    public function setName($string)
    {
        $this->names[] = $string;
    }

    /**
     * Get Name
     * @return array
     */
    public function getName($key)
    {
        if (isset($this->names[$key])) {
            return $this->names[$key];
        }
        return null;
    }

    /**
     * Check empty or not value
     * @return bool
     */
    public function is_empty()
    {
        return empty($this->names);
    }
}

// Instantiate object
$cars = new CarCollection();

// Set name
$cars->setName('Fit');
$cars->setName('Vitz');
$cars->setName('Swift');

// Iterator
foreach ($cars->getIterator() as $car) {
    echo $car . PHP_EOL;
}