<?php

namespace Tests\Services;

use Italofantone\RoleLadder\Services\RoleLadderService;
use Italofantone\RoleLadder\Tests\TestCase;

class RoleServiceTest extends TestCase
{
    protected $role;

    public function setUp(): void
    {
        parent::setUp();

        $this->role = new RoleLadderService();
    }

    public function test_it_returns_the_correct_ladder_steps()
    {
        $expectedLadderSteps = [
            'admin' => 900,
            'user'  => 100,
        ];

        $this->assertEquals($expectedLadderSteps, $this->role->getLadderSteps());
    }

    public function test_it_returns_the_correct_ladder_steps_keys()
    {
        $expectedLadderStepsKeys = [
            'admin',
            'user',
        ];

        $this->assertEquals($expectedLadderStepsKeys, array_keys($this->role->getLadderSteps()));
    }

    public function test_it_returns_the_correct_ladder_steps_values()
    {
        $expectedLadderStepsValues = [
            900,
            100,
        ];

        $this->assertEquals($expectedLadderStepsValues, array_values($this->role->getLadderSteps()));
    }

    public function test_it_returns_the_correct_step_weight()
    {
        $this->assertEquals(900, $this->role->getStepWeight('admin'));
        $this->assertEquals(100, $this->role->getStepWeight('user'));
    }

    public function test_it_throws_exception_for_an_unknown_step()
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage("Role 'Unknown Step' not found in ladder steps.");
        
        $this->role->getStepWeight('Unknown Step');
    }

    public function test_it_throws_exception_if_user_role_is_null()
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage("Role is missing or empty.");
        
        $this->role->getStepWeight(null);
    }

    public function test_it_compares_roles_correctly()
    {
        $this->assertTrue($this->role->compareRoles('admin', 'user'));

        $this->assertFalse($this->role->compareRoles('user', 'admin'));
    }  

    public function test_get_steps()
    {
        $expectedSteps = [
            'admin',
            'user',
        ];

        $this->assertEquals($expectedSteps, $this->role->getSteps());
    }
}