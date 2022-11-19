<?php
####################################
##### PROXY DESIGN PATTERN #####
####################################
interface FileInterface
{
    /**
     * This content func use other implemented classes
     * @return mixed
     */
    public function content();
}

class RealFile implements FileInterface
{
    private $fileName;
    private $fileContent;

    /**
     * Assign file name
     * Call readFile func
     * @param $fileName
     */
    public function __construct($fileName)
    {
        $this->fileName = $fileName;
        $this->readFile();
    }

    /**
     * Read the file and assign in fileContent property
     * @return void
     */
    private function readFile()
    {
        $this->fileContent = file_get_contents($this->fileName);
    }

    /**
     * Get file content
     * @return mixed
     */
    public function content()
    {
        return $this->fileContent;
    }
}

class ProxyFile implements FileInterface
{
    private $fileName;
    private $realFileObject;

    /**
     * Assign file name in fileName property
     * @param $fileName
     */
    public function __construct($fileName)
    {
        $this->fileName = $fileName;
    }

    /**
     * If object not initiated then initiated and return content
     * @return mixed
     */
    public function content()
    {
        // Lazy load the file using the RealFiles class
        if (!$this->realFileObject) {
            $this->realFileObject = new RealFile($this->fileName);
        }

        return $this->realFileObject->content();
    }
}

// Instantiate RealFile object
$realFile = new RealFile(dirname(__FILE__).'/file.txt');
var_dump(memory_get_usage());
$realFile->content();
var_dump(memory_get_usage());

var_dump(memory_get_usage());
$realFile->content();

// Instantiate ProxyFile object
$proxyFile = new ProxyFile(dirname(__FILE__).'/file.txt');
var_dump(memory_get_usage());
$proxyFile->content();
var_dump(memory_get_usage());

$proxyFile->content();
var_dump(memory_get_usage());