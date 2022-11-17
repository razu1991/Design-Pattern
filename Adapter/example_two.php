<?php
####################################
##### ADAPTER DESIGN PATTERN ######
####################################
abstract class AbstractBook
{
    /**
     * getAuthor func used in extended classes
     * @return mixed
     */
    abstract function getAuthor();

    /**
     * getTitle func used in extended classes
     * @return mixed
     */
    abstract function getTitle();
}

class HistoricalBook extends AbstractBook
{
    private $author;
    private $title;

    /**
     * Assign author & title value
     * @param $author
     * @param $title
     */
    public function __construct($author, $title)
    {
        $this->author = $author;
        $this->title = $title;
    }

    /**
     * Return author
     * @return mixed
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Return title
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }
}

class MedicalBook extends AbstractBook
{
    private $author;
    private $title;

    /**
     * Assign author & title value
     * @param $author
     * @param $title
     */
    public function __construct($author, $title)
    {
        $this->author = $author;
        $this->title = $title;
    }

    /**
     * Return author
     * @return mixed
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Return title
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

}

class BookAdapter
{
    private $book;

    /**
     * Assign AbstractBook extended classes
     * @param AbstractBook $abstractBook
     */
    public function __construct(AbstractBook $abstractBook)
    {
        $this->book = $abstractBook;
    }

    /**
     * Get author & title info via abstractbook extended classes
     * @return string
     */
    public function getAuthorAndTitle()
    {
        return $this->book->getTitle() . ' by ' . $this->book->getAuthor();
    }
}

// Create instance
$historicalBook = new HistoricalBook("Arif Azad", "Paradoxical Sajid");
// Pass book instance to adapter class
$bookAdapter = new BookAdapter($historicalBook);
echo "Author and Title: " . $bookAdapter->getAuthorAndTitle();
