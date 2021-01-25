<?php

namespace Tests\Unit;

use App\Models\Category;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    protected $category;

    public function setUp():void
    {
        parent::setUp();
        $this->category = new Category;
    }

    public function tearDown():void
    {
        parent::tearDown();
        unset($this->category);
    }

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_valid_fillable()
    {
        $this->assertEquals([
            'name',
            'parent_id',
        ], $this->category->getFillable());
    }

    public function test_valid_table_properties()
    {
        $this->assertEquals('categories', $this->category->getTable());
    }

    public function test_valid_primary_key_properties()
    {
        $this->assertEquals('id', $this->category->getKeyName());
    }

    public function test_relationship_has_many_posts()
    {
        $relation = $this->category->posts();
        $this->assertInstanceOf(HasMany::class, $relation);
        $this->assertEquals('category_id', $relation->getForeignKeyName());
        $this->assertEquals('posts.category_id', $relation->getQualifiedForeignKeyName());
    }

    public function test_relationship_has_many_children()
    {
        $relation = $this->category->children();
        $this->assertInstanceOf(HasMany::class, $relation);
        $this->assertEquals('parent_id', $relation->getForeignKeyName());
        $this->assertEquals('categories.parent_id', $relation->getQualifiedForeignKeyName());
    }

    public function test_relationship_has_many_parent()
    {
        $relation = $this->category->parent();
        $this->assertInstanceOf(BelongsTo::class, $relation);
        $this->assertEquals('parent_id', $relation->getForeignKeyName());
        $this->assertEquals('categories.parent_id', $relation->getQualifiedForeignKeyName());
    }
}
