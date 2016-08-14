<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ForumsCategoriesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ForumsCategoriesTable Test Case
 */
class ForumsCategoriesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ForumsCategoriesTable
     */
    public $ForumsCategories;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.forums_categories'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ForumsCategories') ? [] : ['className' => 'App\Model\Table\ForumsCategoriesTable'];
        $this->ForumsCategories = TableRegistry::get('ForumsCategories', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ForumsCategories);

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
