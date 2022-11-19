<?php
####################################
##### PROXY DESIGN PATTERN #####
####################################
interface SubjectInterface
{
    /**
     * Request class will be used by implemented classes
     * @return mixed
     */
    public function request();
}

class RealSubject implements SubjectInterface
{
    /**
     * Handle request
     * @return mixed|void
     */
    public function request()
    {
        echo "RealSubject: Handling request." . PHP_EOL;
    }
}

class Proxy implements SubjectInterface
{
    private $realSubject;

    /**
     * Assign realSubject
     * @param RealSubject $realSubject
     */
    public function __construct(RealSubject $realSubject)
    {
        $this->realSubject = $realSubject;
    }

    /**
     * Request func check access then handle request and record log
     * @return mixed|void
     */
    public function request()
    {
        if ($this->checkAccess()) {
            $this->realSubject->request();
            $this->logAccess();
        }
    }

    /**
     * Check access
     * @return false
     */
    private function checkAccess()
    {
        echo "Proxy: Checking access prior to firing a real request.".PHP_EOL;
        return false;
    }

    /**
     * Print log of access request
     * @return void
     */
    private function logAccess()
    {
        echo "Proxy: Logging the time of request.".PHP_EOL;
    }
}

/**
 * Request wrapper func
 * @param SubjectInterface $subject
 * @return void
 */
function clientCode(SubjectInterface $subject)
{
    $subject->request();
}

echo "Client: Executing the client code with a real subject:".PHP_EOL;
// Instantiate object
$realSubject = new RealSubject();
clientCode($realSubject);

echo "Client: Executing the same client code with a proxy:".PHP_EOL;
// Instantiate Object
$proxy = new Proxy($realSubject);
clientCode($proxy);