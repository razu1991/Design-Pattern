<?php
####################################
##### ITERATOR DESIGN PATTERN #####
####################################
class Book
{
    private $title;

    /**
     * Assign title value
     * @return mixed
     */
    public function __construct($title)
    {
        $this->title = $title;
    }

    /**
     * Get title
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }
}

class BookList implements Iterator, Countable
{
    private $books = [];

    private $currentIndex = 0;

    /**
     * Get current book
     * @return mixed
     */
    public function current()
    {
        return $this->books[$this->currentIndex];
    }

    /**
     * Get current index
     * @return int|mixed|null
     */
    public function key()
    {
        return $this->currentIndex;
    }

    /**
     * Next index
     * @return void
     */
    public function next()
    {
        $this->currentIndex++;
    }

    /**
     * Reset or set index value 0
     * @return void
     */
    public function rewind()
    {
        $this->currentIndex = 0;
    }

    /**
     * Check index wise book or others is valid or not
     * @return bool
     */
    public function valid()
    {
        return isset($this->books[$this->currentIndex]);
    }

    /**
     * Count books total
     * @return int
     */
    public function count()
    {
        return count($this->books);
    }

    /**
     * Add book or push book in array
     * @param Book $book
     * @return void
     */
    public function addBook(Book $book)
    {
        $this->books[] = $book;
    }

    /**
     * Remove book from array
     * @param Book $bookToRemove
     * @return void
     */
    public function removeBook(Book $bookToRemove)
    {
        foreach ($this->books as $key => $book) {
            if ($book->getTitle() === $bookToRemove->getTitle()) {
                unset($this->books[$key]);
            }
        }

        $this->books = array_values($this->books);
    }
}

// Instantiate booklist class object
$bookList = new BookList();
// Add book in array or collection
$bookList->addBook(new Book('Design Pattern'));
$bookList->addBook(new Book('Head First Design Pattern'));
$bookList->addBook(new Book('Clean Code'));
$bookList->addBook(new Book('The Pragmatic Programmer'));

// Remove book
$bookList->removeBook(new Book('Design Pattern'));

// Foreach or iterator
foreach ($bookList as $book) {
    echo $book->getTitle() . PHP_EOL;
}