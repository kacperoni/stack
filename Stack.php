<?php

final class Stack
{
    private const SIZE = 10;

    /** @param int[] $stack */
    public function __construct(
        private array $stack = [],
        private int $top = 0,
    ){
    }

    public function push(mixed $num) : void
    {
        if(!is_numeric($num) && strpos($num, '.')){
            $this->printOutput("Inserted value is not integer type!");

            return;
        }
        
        if($this->isFull()){
            $this->printOutput("Stack is full!");

            return;
        }

        $this->stack[] = $num;
        $this->printOutput(sprintf('Pushed %s to stack', $num));
        $this->top++;
    }

    public function pop() : int
    {
        if($this->isEmpty()){
            $this->printOutput("Stack is empty!");

            return 0;
        }

        $elem = $this->stack[$this->top-1];
        unset($this->stack[$this->top-1]);
        $this->top--;
        $this->printOutput(sprintf('Poped %s from stack!', $elem));

        return $elem;
    }

    private function isEmpty() : bool
    {
        return !$this->top;
    }

    private function isFull() : bool
    {
        return self::SIZE === count($this->stack);
    }

    private function getSize() : int
    {
        return self::SIZE;
    }

    public function printStack() : void
    {   
        if($this->isEmpty()){
            $this->printOutput("Stack is empty!");

            return;
        }

        $this->printOutput(sprintf("Current stack: %s", implode(' ', $this->stack)));
    }

    private function printOutput(string $message) : void
    {
        echo $message.PHP_EOL.PHP_EOL;
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
                    $this->printOutput("Unknown command!");
            }
        }
    }
}

(new Stack())->run();