<?php
####################################
##### OBSERVER DESIGN PATTERN #####
####################################
class Model implements SplSubject
{
    protected $observers;

    /**
     * Store observers in SplObjectStorage
     */
    public function __construct()
    {
        $this->observers = new SplObjectStorage();
    }

    /**
     * Attach observer
     * @param SplObserver $observer
     * @return void
     */
    public function attach(SplObserver $observer)
    {
        $this->observers->attach($observer);
    }

    /**
     * Detach observer
     * @param SplObserver $observer
     * @return void
     */
    public function detach(SplObserver $observer)
    {
        $this->observers->detach($observer);
    }

    /**
     * When model subject is updated notify the observer
     * @return void
     */
    public function notify()
    {
        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
    }

    /**
     * This method set any anonymous property
     * @param $name
     * @param $value
     * @return void
     */
    public function __set($name, $value)
    {
        $this->data[$name] = $value;
        $this->notify();
    }
}


class ModelObserver implements SplObserver
{
    /**
     * Notify when subject is updated
     * @param SplSubject $subject
     * @return void
     */
    public function update(SplSubject $subject)
    {
        echo get_class($subject) . ' has been updated' . '<br>';
    }
}

class Observer2 implements SplObserver
{
    /**
     * Notify when subject is udpated
     * @param SplSubject $subject
     * @return void
     */
    public function update(SplSubject $subject)
    {
        echo get_class($subject) . ' has been updated' . '<br>';
    }
}


// Instantiate the model class for 2 different objects
$model1 = new Model();
$model2 = new Model();

// Instantiate the observers
$modelObserver = new ModelObserver();
$observer2 = new Observer2();

// Attach the observers to $model1
$model1->attach($modelObserver);
$model2->attach($observer2);

// Attach the observers to $model2
$model2->attach($observer2);

// Change the subject properties
$model1->title = 'Ba Ba Black Ship..';
$model2->body = 'Twinkle Twinkle Little Star..';
