<?php

namespace Tests\Unit;

use App\Models\Like;
use Tests\TestCase;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LikeTest extends TestCase
{
    protected $like;

    public function setUp():void
    {
        parent::setUp();
        $this->like = new Like;
    }

    public function tearDown():void
    {
        parent::tearDown();
        unset($this->like);
    }

    public function test_valid_table_properties()
    {
        $this->assertEquals('likes', $this->like->getTable());
    }

    public function test_valid_primary_key_properties()
    {
        $this->assertEquals('id', $this->like->getKeyName());
    }

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_valid_fillable()
    {
        $like = new Like();
        $this->assertEquals([
            'user_id',
            'post_id',
            'status',
            'like',
        ], $this->like->getFillable());
    }

    public function test_relationship_belong_to_post()
    {
        $relation = $this->like->post();
        $this->assertInstanceOf(BelongsTo::class, $relation);
        $this->assertEquals('post_id', $relation->getForeignKeyName());
        $this->assertEquals('likes.post_id', $relation->getQualifiedForeignKeyName());
    }

    public function test_relationship_belong_to_user()
    {
        $relation = $this->like->user();
        $this->assertInstanceOf(BelongsTo::class, $relation);
        $this->assertEquals('user_id', $relation->getForeignKeyName());
        $this->assertEquals('likes.user_id', $relation->getQualifiedForeignKeyName());
    }
}
