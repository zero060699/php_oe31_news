<?php

namespace Tests\Unit;

use App\Models\Role;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Tests\TestCase;

class RoleTest extends TestCase
{
    protected $role;

    public function setUp():void
    {
        parent::setUp();
        $this->role = new Role();
    }

    public function tearDown():void
    {
        parent::tearDown();
        unset($this->role);
    }

    public function test_valid_table_properties()
    {
        $this->assertEquals('roles', $this->role->getTable());
    }

    public function test_valid_primary_key_properties()
    {
        $this->assertEquals('id', $this->role->getKeyName());
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
        ], $this->role->getFillable());
    }

    public function test_relationship_belong_to_many_permission()
    {
        $relation = $this->role->permissions();
        $this->assertInstanceOf(BelongsToMany::class, $relation);
        $this->assertEquals('role_id', $relation->getForeignPivotKeyName());
        $this->assertEquals('role_id', $relation->getRelatedPivotKeyName());
    }

    public function test_relationship_has_many_request_writer()
    {
        $relation = $this->role->requestsWriter();
        $this->assertInstanceOf(HasMany::class, $relation);
        $this->assertEquals('role_id', $relation->getForeignKeyName());
        $this->assertEquals('request_writers.role_id', $relation->getQualifiedForeignKeyName());
    }
}
