<?php
namespace App\Test\TestCase\Controller\Admin;

use App\Controller\Admin\DraftsController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\Admin\DraftsController Test Case
 */
class DraftsControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.drafts',
        'app.categories',
        'app.users',
        'app.notifications',
        'app.badges_users',
        'app.badges',
        'app.forum_threads',
        'app.forum_categories',
        'app.last_post',
        'app.last_edit_users',
        'app.forum_posts',
        'app.forum_posts_likes',
        'app.receivers_users',
        'app.last_posts',
        'app.forum_threads_followers',
        'app.first_posts',
        'app.last_post_users'
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
