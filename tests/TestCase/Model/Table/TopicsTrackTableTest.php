<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TopicsTrackTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TopicsTrackTable Test Case
 */
class TopicsTrackTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TopicsTrackTable
     */
    public $TopicsTrack;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.topics_track',
        'app.users',
        'app.notifications',
        'app.badges',
        'app.badges_users',
        'app.topics',
        'app.forums',
        'app.categories',
        'app.forums_track',
        'app.posts'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('TopicsTrack') ? [] : ['className' => 'App\Model\Table\TopicsTrackTable'];
        $this->TopicsTrack = TableRegistry::get('TopicsTrack', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->TopicsTrack);

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
