<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\NewsTagsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\NewsTagsTable Test Case
 */
class NewsTagsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\NewsTagsTable
     */
    public $NewsTags;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.news_tags',
        'app.categories',
        'app.news_articles_tags'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('NewsTags') ? [] : ['className' => 'App\Model\Table\NewsTagsTable'];
        $this->NewsTags = TableRegistry::get('NewsTags', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->NewsTags);

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
