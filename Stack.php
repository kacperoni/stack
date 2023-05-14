<?php

final class Stack
{
    private array $stack;
    private int $size;
    private int $top;
    private string $output;

    public function __construct(int $size = 10)
    {
        $this->size = $size;
        $this->stack = [];
        $this->top = 0;
        $this->output = "";
    }

    public function push(mixed $num) : void
    {
        if(is_numeric($num) && !strpos($num, '.')){
            if(!$this->isFull()){
                $this->stack[]=$num;
                $this->output="Pushed $num to stack";
                $this->top++;
            }else{
                $this->output="Stack is full!";
            }
        }else{
            $this->output = "Inserted value is not integer type!";
        }
        
        $this->printOutput();
    }

    public function pop() : int
    {
        if($this->isEmpty()){
            $this->output = "Stack is empty!";
            $this->printOutput();
            return 0;
        }

        $elem = $this->stack[$this->top-1];
        unset($this->stack[$this->top-1]);
        $this->top--;
        $this->output = "Poped $elem from stack!";
        $this->printOutput();
        return $elem;
    }

    private function isEmpty() : bool
    {
        return !$this->top;
    }

    private function isFull() : bool
    {
        return $this->size === count($this->stack);
    }

    private function getSize() : int
    {
        return $this->size;
    }

    public function printStack() : void
    {   
        if($this->isEmpty()){
            $this->output = "Stack is empty!";
        }else{
            $this->output = "Current stack: ";
            foreach($this->stack as $elem){
                $this->output .= $elem." ";
            }
        }

        $this->printOutput();
    }

    private function printOutput() : void
    {
        echo $this->output.PHP_EOL;
        $this->output = "";
    }

    public function run() : void
    {
        while(True){
            echo "[1]push [2]pop [3]print [4]exit";
            $command = readline("\nChoose command (1-4): ");
            switch($command){
                case 1:
                    $number = readline("\nEnter integer value: ");
                    $this->push($number);
                    break;
                case 2:
                    $this->pop();
                    break;
                case 3:
                    $this->printStack();
                    break;
                case 4:
                    exit();
                default:
                    $this->output = "Unknown command!";
                    $this->printOutput();
            }
        }
    }
}

$stack = new Stack();
$stack->run();

