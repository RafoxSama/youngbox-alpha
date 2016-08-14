<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ForumsTrackTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ForumsTrackTable Test Case
 */
class ForumsTrackTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ForumsTrackTable
     */
    public $ForumsTrack;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.forums_track',
        'app.users',
        'app.notifications',
        'app.badges',
        'app.badges_users',
        'app.forums',
        'app.categories',
        'app.topics',
        'app.posts',
        'app.topics_track'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ForumsTrack') ? [] : ['className' => 'App\Model\Table\ForumsTrackTable'];
        $this->ForumsTrack = TableRegistry::get('ForumsTrack', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ForumsTrack);

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
