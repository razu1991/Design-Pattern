<?php
####################################
##### FACADE DESIGN PATTERN #######
####################################
class Cpu
{
    /**
     * Run cpu
     * @return void
     */
    public function run()
    {
        echo "Cpu starts to run<br/>";
    }
}

class Memory
{
    /**
     * Run memory
     * @return void
     */
    public function run()
    {
        echo "Memory starts to run<br/>";
    }
}

class Monitor
{
    /**
     * Run monitor
     * @return void
     */
    public function run()
    {
        echo "Monitor starts to run<br/>";
    }
}

class ComputerFacade
{
    protected $cpu;
    protected $memory;
    protected $monitor;

    /**
     * Assign cpu, memory, monitor class instantiate
     */
    public function __construct()
    {
        $this->cpu = new Cpu();
        $this->memory = new Memory();
        $this->monitor = new Monitor();
    }

    /**
     * Run cpu, memory, monitor
     * @return void
     */
    public function run()
    {
        $this->cpu->run();
        $this->memory->run();
        $this->monitor->run();
    }
}

// Instantiate facade class and run
$computer = new ComputerFacade();
$computer->run();