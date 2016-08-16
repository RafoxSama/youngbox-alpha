<?php
namespace App\Test\TestCase\Controller\Component;

use App\Controller\Component\AccountComponent;
use Cake\Controller\ComponentRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Controller\Component\AccountComponent Test Case
 */
class AccountComponentTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Controller\Component\AccountComponent
     */
    public $Account;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $registry = new ComponentRegistry();
        $this->Account = new AccountComponent($registry);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Account);

        parent::tearDown();
    }

    /**
     * Test initial setup
     *
     * @return void
     */
    public function testInitialization()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
