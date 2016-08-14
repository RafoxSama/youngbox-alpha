<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\NewsCommentsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\NewsCommentsTable Test Case
 */
class NewsCommentsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\NewsCommentsTable
     */
    public $NewsComments;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.news_comments',
        'app.articles',
        'app.users',
        'app.notifications',
        'app.badges',
        'app.badges_users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('NewsComments') ? [] : ['className' => 'App\Model\Table\NewsCommentsTable'];
        $this->NewsComments = TableRegistry::get('NewsComments', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->NewsComments);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
