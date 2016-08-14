<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\VodsCategoriesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\VodsCategoriesTable Test Case
 */
class VodsCategoriesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\VodsCategoriesTable
     */
    public $VodsCategories;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.vods_categories'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('VodsCategories') ? [] : ['className' => 'App\Model\Table\VodsCategoriesTable'];
        $this->VodsCategories = TableRegistry::get('VodsCategories', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->VodsCategories);

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
