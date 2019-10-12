<?php

class testContext {
    private $strategy = NULL; 
    //bookList is not instantiated at construct time
    public function __construct($strategy_ind_id) {
        switch ($strategy_ind_id) {
            case "Intra": 
                $this->strategy = new Intra($strategy_ind_id);
            break;
            case "Snot": 
                $this->strategy = new Snot($strategy_ind_id);
            break;
            case "MQ": 
                $this->strategy = new MQ($strategy_ind_id);
            break;
            case "Prick": 
                $this->strategy = new Prick($strategy_ind_id);
            break;
        }
    }
    public function printTest() {
      return $this->strategy->printTest();
    }
    public function printId() {
        return $this->strategy->printId();
    }
}
abstract class Proto 
{
    protected $id;

}
abstract class Test extends Proto
{
    protected $name;
    public function __construct($name_in) 
    {
        $this->name = $name_in;
        $this->id = rand(1,100);
    }
    public function printId()
    {
        echo $this->id;
        echo "\n";
    }
}

interface StrategyInterface {
    public function printTest();
}
 
class Prick extends Test implements StrategyInterface {
    public function printTest()
    {
        echo "I am the I am the" . "Very model of a Prick"  . ".\n";
    }

}

class MQ extends Test implements StrategyInterface {
    public function printTest()
    {
        echo "I am the I am the Very model of an MQ"  . ".\n";
    }

}
class Intra extends Test implements StrategyInterface {
    function __construct()
    {
        parent::__construct();
    }
    public function printTest()
    {
        echo "I am the I am the " . $this->name . "!!!\n";
    }
}

class Snot extends Test implements StrategyInterface {
    public function printTest()
    {
        echo "I am the Snot!!!\n";
    }

}

  writeln('BEGIN TESTING STRATEGY PATTERN');
  writeln('');
 
  $strategyContextC = new testContext('Intra');
  $strategyContextE = new testContext('Snot');
  $strategyContextS = new testContext('MQ');
 
  writeln('test 1 - show name context C');
  writeln($strategyContextC->printTest());
  writeln('');

  writeln('test 2 - show name context E');
  writeln($strategyContextE->printTest());
  writeln('');
 
  writeln('test 3 - show name context S');
  writeln($strategyContextS->printTest());
  writeln('');
  writeln('printing id of intra');
$strategyContextC->printId();
  writeln('END TESTING STRATEGY PATTERN');

  function writeln($line_in) {
    echo $line_in."\n";
  }

?>
