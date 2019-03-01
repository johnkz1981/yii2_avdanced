<?php namespace frontend\tests;

use frontend\components\TestService;
use frontend\models\ContactForm;

class FirstTest extends \Codeception\Test\Unit
{
    /**
     * @var \frontend\tests\UnitTester
     */
    protected $tester;
    
    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests
    public function te1stSomeFeature()
    {
      $processor = $this->getMockBuilder(Processor::class)->setMethods(['fill'])->getMock();
      $processor->expects($this->once())->method('fill')->with(2, 'xx')->willReturn(['xx', 'xx']);

      $service = new TestService($processor);

      expect('equals array', $service->run(2, 'xx'))->equals(['xx', 'xx']);
      expect('true', $service->getTrue())->true();
      expect('equals Value', $service->getValue())->equals(5);
      expect('less than', $service->getValue())->lessThan(6);
    }

  public function testFormTest()
  {
    $model = new ContactForm();

    $model->attributes = [
      'name' => 'Tester',
      'email' => 'tester@example.com',
      'subject' => 'very important letter subject',
      'body' => 'body of current message',
    ];

    expect($model->getAttributes())->hasKey('name');
    expect($model)->hasAttribute('name');
  }

}