<?php
namespace Tests\Entities;

use App\Entities\Category;

class CategoryTest extends \PHPUnit_Framework_TestCase
{
    const NAME = 'test_category;';
    const POSITION = 5;
    const PARENT_ID = 123;
    const ALLEGRO_ID = 333;
    const ALLEGRO_PARENT_ID = 667;

    /**
     * @var Category $category
     */
    protected $category;

    public function setUp()
    {
        $this->category = new Category(self::NAME, self::POSITION, self::PARENT_ID, self::ALLEGRO_ID, self::ALLEGRO_PARENT_ID);
    }

    /**
     * @test
     */
    public function newCategoryHasNoIdUntilSaved()
    {
        $this->assertNull($this->category->getId());
    }

    /**
     * @test
     */
    public function hasParentId()
    {
        $this->assertEquals(self::PARENT_ID, $this->category->getParentId());
    }

    /**
     * @test
     */
    public function hasName()
    {
        $this->assertEquals(self::NAME, $this->category->getName());
    }

    /**
     * @test
     */
    public function hasPosition()
    {
        $this->assertEquals(self::POSITION, $this->category->getPosition());
    }

    /**
     * @test
     */
    public function hasAllegroId()
    {
        $this->assertEquals(self::ALLEGRO_ID, $this->category->getAllegroId());
    }

    /**
     * @test
     */
    public function hasAllegroParentId()
    {
        $this->assertEquals(self::ALLEGRO_PARENT_ID, $this->category->getAllegroParentId());
    }
}