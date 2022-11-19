<?php
####################################
##### ITERATOR DESIGN PATTERN #####
####################################
class AlphabeticalOrderIterator implements Iterator
{
    private $collection;
    private $position = 0;
    private $reverse = false;

    /**
     * Assign collection value
     * @param $collection
     * @param $reverse
     */
    public function __construct($collection, $reverse = false)
    {
        $this->collection = $collection;
        $this->reverse = $reverse;
    }

    /**
     * Rewind index or position
     * @return void
     */
    public function rewind()
    {
        $this->position = $this->reverse ?
            count($this->collection->getItems()) - 1 : 0;
    }

    /**
     * Return current index
     * @return mixed
     */
    public function current()
    {
        return $this->collection->getItems()[$this->position];
    }

    /**
     * Return position or key
     * @return int|mixed|null
     */
    public function key()
    {
        return $this->position;
    }

    /**
     * Return next key
     * @return void
     */
    public function next()
    {
        $this->position = $this->position + ($this->reverse ? -1 : 1);
    }

    /**
     * Check value is valid or not
     * @return bool
     */
    public function valid()
    {
        return isset($this->collection->getItems()[$this->position]);
    }
}

class WordsCollection implements IteratorAggregate
{
    private $items = [];

    /**
     * Return items
     * @return array
     */
    public function getItems()
    {
        return $this->items;
    }

    /**
     * Add item to array
     * @param $item
     * @return void
     */
    public function addItem($item)
    {
        $this->items[] = $item;
    }

    /**
     * Passed class object and return iterator object
     * @return AlphabeticalOrderIterator
     */
    public function getIterator()
    {
        return new AlphabeticalOrderIterator($this);
    }

    /**
     * Passed class object and return reverse iterator object
     * @return AlphabeticalOrderIterator
     */
    public function getReverseIterator()
    {
        return new AlphabeticalOrderIterator($this, true);
    }
}

// Instantiate Object
$collection = new WordsCollection();
// Add Item
$collection->addItem("First");
$collection->addItem("Second");
$collection->addItem("Third");

// Traversing
echo "Straight traversal:\n";
foreach ($collection->getIterator() as $item) {
    echo $item . "\n";
}

echo "\n";
echo "Reverse traversal:\n";
foreach ($collection->getReverseIterator() as $item) {
    echo $item . "\n";
}