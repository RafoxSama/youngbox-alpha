<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\NewsCategoriesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\NewsCategoriesTable Test Case
 */
class NewsCategoriesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\NewsCategoriesTable
     */
    public $NewsCategories;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.news_categories'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('NewsCategories') ? [] : ['className' => 'App\Model\Table\NewsCategoriesTable'];
        $this->NewsCategories = TableRegistry::get('NewsCategories', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->NewsCategories);

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
