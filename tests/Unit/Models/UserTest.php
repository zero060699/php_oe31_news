<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Tests\TestCase;

class UserTest extends TestCase
{
    protected $user;

    public function setUp():void
    {
        parent::setUp();
        $this->user = new User;
    }

    public function tearDown():void
    {
        parent::tearDown();
        unset($this->user);
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
            'email',
            'password',
            'image',
            'status',
            'role_id',
            'banned_until',
        ], $this->user->getFillable());
    }

    public function test_valid_table_properties()
    {
        $this->assertEquals('users', $this->user->getTable());
    }

    public function test_valid_primary_key_properties()
    {
        $this->assertEquals('id', $this->user->getKeyName());
    }

    public function test_relationship_belong_to_request_writer()
    {
        $relation = $this->user->requestwriter();
        $this->assertInstanceOf(HasOne::class, $relation);
        $this->assertEquals('user_id', $relation->getForeignKeyName());
        $this->assertEquals('id', $relation->getLocalKeyName());
    }
    public function test_relationship_belong_to_role()
    {
        $relation = $this->user->role();
        $this->assertInstanceOf(BelongsTo::class, $relation);
        $this->assertEquals('role_id', $relation->getForeignKeyName());
        $this->assertEquals('users.role_id', $relation->getQualifiedForeignKeyName());
    }

    public function test_relationship_has_many_comment()
    {
        $relation = $this->user->comments();
        $this->assertInstanceOf(HasMany::class, $relation);
        $this->assertEquals('user_id', $relation->getForeignKeyName());
        $this->assertEquals('comments.user_id', $relation->getQualifiedForeignKeyName());
    }

    public function test_relationship_has_many_posts()
    {
        $relation = $this->user->posts();
        $this->assertInstanceOf(HasMany::class, $relation);
        $this->assertEquals('user_id', $relation->getForeignKeyName());
        $this->assertEquals('posts.user_id', $relation->getQualifiedForeignKeyName());
    }

    public function test_relationship_has_many_likes()
    {
        $relation = $this->user->likes();
        $this->assertInstanceOf(HasMany::class, $relation);
        $this->assertEquals('user_id', $relation->getForeignKeyName());
        $this->assertEquals('likes.user_id', $relation->getQualifiedForeignKeyName());
    }
}
