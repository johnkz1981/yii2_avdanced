<?php

namespace frontend\components;

class TestService extends \yii\base\Component
{
  public $processor;

  public function __construct($processor, array $config = [])
  {
    $this->processor = $processor;
    parent::__construct($config);
  }

  public function run($count, $var)
  {
    $data = $this->processor->fill($count, $var);
    return $data;
  }

  public function getTrue()
  {
    return true;
  }

  public function getValue()
  {
    return 5;
  }
}