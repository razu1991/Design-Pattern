<?php
############################
# DECORATOR DESIGN PATTERN #
############################
interface Component
{
    /**
     * Operation func will be used by implemented classes
     * @return mixed
     */
    public function operation();
}

class ConcreteComponent implements Component
{
    /**
     * Concrete or global component
     * @return string
     */
    public function operation()
    {
        return 'ConcreteComponent';
    }
}

class Decorator implements Component
{
    protected $component;

    /**
     * Assign component value as a implemented objects
     * @param Component $component
     */
    public function __construct(Component $component)
    {
        $this->component = $component;
    }

    /**
     * Component operation
     * @return mixed
     */
    public function operation()
    {
        return $this->component->operation();
    }
}

class ConcreteDecoratorA extends Decorator
{
    /**
     * Concrete component A operation
     * @return string
     */
    public function operation()
    {
        return "ConcreteComponentA(" . parent::operation() . ")";
    }
}

class ConcreteDecoratorB extends Decorator
{
    /**
     * Concrete component B operation
     * @return string
     */
    public function operation()
    {
        return "ConcreteComponentB(" . parent::operation() . ")";
    }
}

/**
 * ClientCode act as a func call method
 * @param Component $component
 * @return void
 */
function clientCode(Component $component)
{
    echo "RESULT: " . $component->operation();
}

// Simple components
$simple = new ConcreteComponent();
echo "Client: I've got a simple component." . PHP_EOL;
clientCode($simple);

// Decorator components
$decorator1 = new ConcreteDecoratorA($simple);
$decorator2 = new ConcreteDecoratorB($decorator1);
echo "Client: I've got a decorator component." . PHP_EOL;
clientCode($decorator2);
