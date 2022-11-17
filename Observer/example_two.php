<?php
####################################
##### OBSERVER DESIGN PATTERN #####
####################################
abstract class AbstractSubject
{
    /**
     * Attach observer
     * @param AbstractObserver $observer_in
     * @return mixed
     */
    abstract function attach(AbstractObserver $observer_in);

    /**
     * Detach observer
     * @param AbstractObserver $observer_in
     * @return mixed
     */
    abstract function detach(AbstractObserver $observer_in);

    /**
     * Notify observer
     * @return mixed
     */
    abstract function notify();
}

abstract class AbstractObserver
{
    /**
     * Subject updated
     * @param AbstractSubject $subject_in
     * @return mixed
     */
    abstract function update(AbstractSubject $subject_in);
}

class Subject extends AbstractSubject
{

    private $observers = array();

    function __construct(){}

    /**
     * Attach observer
     * @param AbstractObserver $observer_in
     * @return mixed|void
     */
    function attach(AbstractObserver $observer_in)
    {
        //could also use array_push($this->observers, $observer_in);
        $this->observers[] = $observer_in;
    }

    /**
     * Detach observer
     * @param AbstractObserver $observer_in
     * @return mixed|void
     */
    function detach(AbstractObserver $observer_in)
    {
        //$key = array_search($observer_in, $this->observers);
        foreach ($this->observers as $okey => $oval) {
            if ($oval == $observer_in) {
                unset($this->observers[$okey]);
            }
        }
    }

    /**
     * Notify observer
     * @return mixed|void
     */
    function notify()
    {
        foreach ($this->observers as $obs) {
            $obs->update($this);
        }
    }

    /**
     * Update subject property and notify observer
     * @param $newFavorites
     * @return void
     */
    function updateFavorites($newFavorites)
    {
        $this->favorites = $newFavorites;
        $this->notify();
    }

    /**
     * Get updated info
     * @return mixed
     */
    function getFavorites()
    {
        return $this->favorites;
    }

}

class Observer extends AbstractObserver
{
    /**
     * Notify when subject is updated
     * @param AbstractSubject $subject
     * @return mixed|void
     */
    public function update(AbstractSubject $subject)
    {
        echo get_class($subject) . ' has been updated' . '<br>';
    }
}

// Instantiate the subject
$subject = new Subject();

// Instantiate the observers
$observer = new Observer();

// Attach the observers to subject
$subject->attach($observer);
$subject->updateFavorites('Hello Subject Updated');
$subject->updateFavorites('Hello Subject Again Updated');

// Detach the observer
$subject->detach($observer);

?>