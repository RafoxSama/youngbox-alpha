<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\VodsPlaylistsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\VodsPlaylistsTable Test Case
 */
class VodsPlaylistsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\VodsPlaylistsTable
     */
    public $VodsPlaylists;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.vods_playlists'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('VodsPlaylists') ? [] : ['className' => 'App\Model\Table\VodsPlaylistsTable'];
        $this->VodsPlaylists = TableRegistry::get('VodsPlaylists', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->VodsPlaylists);

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
}
