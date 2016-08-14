<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ForumCategoriesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ForumCategoriesTable Test Case
 */
class ForumCategoriesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ForumCategoriesTable
     */
    public $ForumCategories;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.forum_categories',
        'app.forum_threads',
        'app.users',
        'app.notifications',
        'app.badges_users',
        'app.badges',
        'app.forum_posts',
        'app.last_edit_users',
        'app.last_posts',
        'app.forum_posts_likes',
        'app.receivers_users',
        'app.forum_threads_followers',
        'app.first_posts',
        'app.last_post_users',
        'app.last_post'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ForumCategories') ? [] : ['className' => 'App\Model\Table\ForumCategoriesTable'];
        $this->ForumCategories = TableRegistry::get('ForumCategories', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ForumCategories);

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
     * Test validationCreate method
     *
     * @return void
     */
    public function testValidationCreate()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
