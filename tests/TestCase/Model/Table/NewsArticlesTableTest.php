<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\NewsArticlesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\NewsArticlesTable Test Case
 */
class NewsArticlesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\NewsArticlesTable
     */
    public $NewsArticles;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.news_articles',
        'app.categories',
        'app.users',
        'app.notifications',
        'app.badges',
        'app.badges_users',
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
        $config = TableRegistry::exists('NewsArticles') ? [] : ['className' => 'App\Model\Table\NewsArticlesTable'];
        $this->NewsArticles = TableRegistry::get('NewsArticles', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->NewsArticles);

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
