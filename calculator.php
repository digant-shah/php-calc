<?php

require __DIR__ . "/vendor/autoload.php";

use Tarsana\Command\Command;

class calculatorController extends Command {

  /**
   * calculator function will perform mathematical operations
   * @param $argv
   */
  public function calculator($argv) {
    $action = isset($argv[1]) ? $argv[1] : '';
    $numString = isset($argv[2]) ? $argv[2] : 0;

    switch ($action) {
      case 'sum' :
        $validArr = explode(',', $numString);
        if (count($validArr) > 2) {
          $this->console->error("Maximum two parameters allow in Sum");
        } else {
          $sumArr = array_sum($validArr);
          $this->console->line("<background:15><color:19>Output : {$sumArr} <reset>");
        }
        break;
        
      case 'add' :
        $isValidateString = preg_replace('/[^,0-9\-]/', ',', $numString);
        $sumArr = array_sum(explode(',', $numString));
        $this->console->line("<background:15><color:19>Output : {$sumArr} <reset>");
        break;  

      default;
    }
  }

}

/*
 * Execute the calculatorController with command line args.
 *
 * */
(new calculatorController)->calculator($argv);




