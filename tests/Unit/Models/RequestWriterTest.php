<?php

namespace Tests\Unit;

use App\Models\RequestWriter;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Tests\TestCase;

class RequestWriterTest extends TestCase
{
    protected $request;

    public function setUp():void
    {
        parent::setUp();
        $this->request = new RequestWriter();
    }

    public function tearDown():void
    {
        parent::tearDown();
        unset($this->request);
    }

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_valid_fillable()
    {
        $this->assertEquals([
            'note',
            'status',
            'role_id',
            'user_id',
        ], $this->request->getFillable());
    }

    public function test_valid_table_properties()
    {
        $this->assertEquals('request_writers', $this->request->getTable());
    }

    public function test_valid_primary_key_properties()
    {
        $this->assertEquals('id', $this->request->getKeyName());
    }

    public function test_relationship_belong_to_author()
    {
        $relation = $this->request->author();
        $this->assertInstanceOf(BelongsTo::class, $relation);
        $this->assertEquals('user_id', $relation->getForeignKeyName());
        $this->assertEquals('request_writers.user_id', $relation->getQualifiedForeignKeyName());
    }

    public function test_relationship_belong_to_role()
    {
        $relation = $this->request->role();
        $this->assertInstanceOf(BelongsTo::class, $relation);
        $this->assertEquals('role_id', $relation->getForeignKeyName());
        $this->assertEquals('request_writers.role_id', $relation->getQualifiedForeignKeyName());
    }
}
