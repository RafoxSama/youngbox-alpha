<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\VodsVideosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\VodsVideosTable Test Case
 */
class VodsVideosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\VodsVideosTable
     */
    public $VodsVideos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.vods_videos',
        'app.playlists'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('VodsVideos') ? [] : ['className' => 'App\Model\Table\VodsVideosTable'];
        $this->VodsVideos = TableRegistry::get('VodsVideos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->VodsVideos);

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
