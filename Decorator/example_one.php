<?php
############################
# DECORATOR DESIGN PATTERN #
############################
interface EmailInterface
{
    /**
     * Body func will be used by implemented classes
     * @return mixed
     */
    public function body();
}

class Email implements EmailInterface
{
    /**
     * Global email body
     * @return string
     */
    public function body()
    {
        return 'Simple email body';
    }
}

abstract class EmailDecorator implements EmailInterface
{
    public $email;

    /**
     * Assign EmailInterface implemented object
     * @param EmailInterface $email
     */
    public function __construct(EmailInterface $email)
    {
        $this->email = $email;
    }

    /**
     * Empty abstract body func
     * @return mixed
     */
    abstract public function body();
}

class NewYearEmailDecorator extends EmailDecorator
{
    /**
     * Email body
     * @return string
     */
    public function body()
    {
        return $this->email->body() . ' additional text from decorator';
    }
}

// Simple Email
$email = new Email();
var_dump($email->body());


// Decorator Email
$emailNewYearDecorator = new NewYearEmailDecorator($email);
var_dump($emailNewYearDecorator->body());