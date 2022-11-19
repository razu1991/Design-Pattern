<?php
####################################
##### STRATEGY DESIGN PATTERN ######
####################################
interface Filter
{
    /**
     * Filter func will be used by implemented classes
     * @param $str
     */
    public function filter($str);
}

class HTMLFilter implements Filter
{
    /**
     * Filter and remove html code
     * @param $str
     * @return Filter
     */
    public function filter($str)
    {
        // stripe out HTML
        return $str;
    }
}

class SwearFilter implements Filter
{
    /**
     * Filter remove swear words
     * @param $str
     * @return Filter
     */
    public function filter($str)
    {
        // cross out swear words
        return $str;
    }
}

class FormData
{
    private $data;

    /**
     * Assign input value to data property
     * @param $input
     */
    public function __construct($input)
    {
        $this->data = $input;
    }

    /**
     * Process data and filter out according to input
     * @param Filter $type
     * @return Filter
     */
    public function process(Filter $type)
    {
        return $this->data = $type->filter($this->data);
    }
}

// Instantiate  object
$form = new FormData("HTML Codes");
$output = $form->process(new HTMLFilter);
echo $output;

echo "<br/>";

// Instantiate object
$form = new FormData("Swear Words");
$output = $form->process(new SwearFilter);
echo $output;