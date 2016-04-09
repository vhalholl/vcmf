<?php

class process
{
  private $pid;
  private $command;
  private $output;
  public $cmdOutput;

  public function __construct($cl=false)
  {
    if ($cl != false){
      $this->command = $cl;
      $this->cmdOutput = "processClassOutput.txt";
      $this->runCom();
    }
  }

  private function runCom()
  {
    $command = $this->command.' >'.$this->cmdOutput.' & echo $!';
    exec($command ,$op);
    //print_r($op);
    $this->pid = (int)$op[0];
  }

  /*
   * ;)
   *
  public function setPid($pid)
  {
    $this->pid = $pid;
  }
   */

  public function getPid()
  {
    return $this->pid;
  }

  /*
   * ;)
   */
  public function status()
  {
    $command = '/bin/ps -p '.$this->pid;
    exec($command,$op);
    if (!isset($op[1]))return false;
    else return true;
  }

  public function start()
  {
    if ($this->command != '')$this->runCom();
    else return true;
  }

  public function stop()
  {
    $command = '/bin/kill '.$this->pid;
    if ($this->status() == true) 
    {
      exec($command);
      unlink($this->cmdOutput);
      if ($this->status() == false)return true;
      else return false;
    } else return true;
  }

  public function getOutput()
  {
    if(is_file($this->cmdOutput)){
      return($this->cmdOutput);
    }
  }
}
