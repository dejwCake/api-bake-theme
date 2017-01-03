<?php
namespace DejwCake\ApiBakeTheme\Test\TestCase\Shell\Task;

use Cake\TestSuite\TestCase;
use DejwCake\ApiBakeTheme\Shell\Task\ApiModelTask;

/**
 * DejwCake\ApiBakeTheme\Shell\Task\ApiModelTask Test Case
 */
class ApiModelTaskTest extends TestCase
{

    /**
     * ConsoleIo mock
     *
     * @var \Cake\Console\ConsoleIo|\PHPUnit_Framework_MockObject_MockObject
     */
    public $io;

    /**
     * Test subject
     *
     * @var \DejwCake\ApiBakeTheme\Shell\Task\ApiModelTask
     */
    public $ApiModel;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $this->io = $this->getMockBuilder('Cake\Console\ConsoleIo')->getMock();

        $this->ApiModel = $this->getMockBuilder('DejwCake\ApiBakeTheme\Shell\Task\ApiModelTask')
            ->setConstructorArgs([$this->io])
            ->getMock();
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ApiModel);

        parent::tearDown();
    }

    /**
     * Test main method
     *
     * @return void
     */
    public function testMain()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
