<?php
namespace App\Test\TestCase\Controller\Admin;

use App\Controller\Admin\ForumCategoriesController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\Admin\ForumCategoriesController Test Case
 */
class ForumCategoriesControllerTest extends IntegrationTestCase
{

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
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
