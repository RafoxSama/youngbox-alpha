<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\NewsArticlesTagsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\NewsArticlesTagsTable Test Case
 */
class NewsArticlesTagsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\NewsArticlesTagsTable
     */
    public $NewsArticlesTags;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.news_articles_tags',
        'app.news_tags',
        'app.categories',
        'app.news_articles',
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
        $config = TableRegistry::exists('NewsArticlesTags') ? [] : ['className' => 'App\Model\Table\NewsArticlesTagsTable'];
        $this->NewsArticlesTags = TableRegistry::get('NewsArticlesTags', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->NewsArticlesTags);

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
