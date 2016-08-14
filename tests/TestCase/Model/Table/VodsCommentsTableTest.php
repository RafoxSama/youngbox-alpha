<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\VodsCommentsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\VodsCommentsTable Test Case
 */
class VodsCommentsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\VodsCommentsTable
     */
    public $VodsComments;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.vods_comments',
        'app.videos',
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
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('VodsComments') ? [] : ['className' => 'App\Model\Table\VodsCommentsTable'];
        $this->VodsComments = TableRegistry::get('VodsComments', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->VodsComments);

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
