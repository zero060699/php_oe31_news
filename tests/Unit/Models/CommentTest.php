<?php

namespace Tests\Unit;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Tests\TestCase;

class CommentTest extends TestCase
{
    protected $comment;

    public function setUp():void
    {
        parent::setUp();
        $this->comment = new Comment;
    }

    public function tearDown():void
    {
        parent::tearDown();
        unset($this->comment);
    }

    public function test_valid_table_properties()
    {
        $this->assertEquals('comments', $this->comment->getTable());
    }

    public function test_valid_primarykey_properties()
    {
        $this->assertEquals('id', $this->comment->getKeyName());
    }
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_valid_fillable()
    {
        $comment = new Comment();
        $this->assertEquals([
            'user_id',
            'post_id',
            'content',
            'parent_id',
        ], $this->comment->getFillable());
    }

    public function test_relationship_belong_to_post()
    {
        $relation = $this->comment->post();
        $this->assertInstanceOf(BelongsTo::class, $relation);
        $this->assertEquals('post_id', $relation->getForeignKeyName());
        $this->assertEquals('comments.post_id', $relation->getQualifiedForeignKeyName());
    }

    public function test_relationship_belong_to_user()
    {
        $relation = $this->comment->user();
        $this->assertInstanceOf(BelongsTo::class, $relation);
        $this->assertEquals('user_id', $relation->getForeignKeyName());
        $this->assertEquals('comments.user_id', $relation->getQualifiedForeignKeyName());
    }

    public function test_relationship_belong_to_replies()
    {
        $relation = $this->comment->replies();
        $this->assertInstanceOf(HasMany::class, $relation);
        $this->assertEquals('parent_id', $relation->getForeignKeyName());
        $this->assertEquals('comments.parent_id', $relation->getQualifiedForeignKeyName());
    }
}
