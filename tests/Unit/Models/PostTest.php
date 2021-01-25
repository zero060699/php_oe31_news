<?php

namespace Tests\Unit;

use App\Models\Post;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Tests\TestCase;

class PostTest extends TestCase
{
    protected $post;

    public function setUp():void
    {
        parent::setUp();
        $this->post = new Post();
    }

    public function tearDown():void
    {
        parent::tearDown();
        unset($this->post);
    }

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_valid_fillable()
    {
        $this->assertEquals([
            'title',
            'user_id',
            'content',
            'image',
            'view',
            'category_id',
            'status',
        ], $this->post->getFillable());
    }

    public function test_valid_table_properties()
    {
        $this->assertEquals('posts', $this->post->getTable());
    }

    public function test_valid_primary_key_properties()
    {
        $this->assertEquals('id', $this->post->getKeyName());
    }

    public function test_relationship_belong_to_category()
    {
        $relation = $this->post->category();
        $this->assertInstanceOf(BelongsTo::class, $relation);
        $this->assertEquals('category_id', $relation->getForeignKeyName());
        $this->assertEquals('posts.category_id', $relation->getQualifiedForeignKeyName());
    }

    public function test_relationship_has_many_like()
    {
        $relation = $this->post->likes();
        $this->assertInstanceOf(HasMany::class, $relation);
        $this->assertEquals('post_id', $relation->getForeignKeyName());
        $this->assertEquals('likes.post_id', $relation->getQualifiedForeignKeyName());
    }

    public function test_relationship_has_many_comment()
    {
        $relation = $this->post->comments();
        $this->assertInstanceOf(HasMany::class, $relation);
        $this->assertEquals('post_id', $relation->getForeignKeyName());
        $this->assertEquals('comments.post_id', $relation->getQualifiedForeignKeyName());
    }

    public function test_relationship_belong_to_author()
    {
        $relation = $this->post->author();
        $this->assertInstanceOf(BelongsTo::class, $relation);
        $this->assertEquals('user_id', $relation->getForeignKeyName());
        $this->assertEquals('posts.user_id', $relation->getQualifiedForeignKeyName());
    }
}
