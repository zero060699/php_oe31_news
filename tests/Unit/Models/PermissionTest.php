<?php

namespace Tests\Unit;

use App\Models\Permission;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Tests\TestCase;

class PermissionTest extends TestCase
{
    protected $permission;

    public function setUp():void
    {
        parent::setUp();
        $this->permission = new Permission;
    }

    public function tearDown():void
    {
        parent::tearDown();
        unset($this->permission);
    }

    public function test_valid_table_properties()
    {
        $this->assertEquals('permissions', $this->permission->getTable());
    }

    public function test_valid_primary_key_properties()
    {
        $this->assertEquals('id', $this->permission->getKeyName());
    }

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_valid_fillable()
    {
        $permission = new Permission();
        $this->assertEquals([
            'name',
        ], $this->permission->getFillable());
    }

    public function test_relationship_belong_to_roles()
    {
        $relation = $this->permission->roles();
        $this->assertInstanceOf(BelongsToMany::class, $relation);
        $this->assertEquals('permission_id', $relation->getForeignPivotKeyName());
        $this->assertEquals('role_id', $relation->getRelatedPivotKeyName());
    }
}
