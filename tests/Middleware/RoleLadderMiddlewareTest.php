<?php

namespace Tests\Services;

use Italofantone\RoleLadder\Http\Middleware\RoleLadderMiddleware;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Italofantone\RoleLadder\Tests\Models\User;
use Italofantone\RoleLadder\Tests\TestCase;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Response;

class RoleLadderMiddlewareTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        Route::get('/test-route', function () {
            return response()->json([
                'message' => 'You have access to this route'
            ]);
        })
        ->middleware(RoleLadderMiddleware::class.':admin')
        ->name('test-route');
    }

    public function test_admin_has_access_to_protected_route()
    {
        $this->login('admin');

        $response = $this->get(route('test-route'));

        $response->assertStatus(Response::HTTP_OK);
    }

    public function test_user_does_not_have_access_to_protected_route()
    {
        $this->login('user');

        $response = $this->get(route('test-route'));

        $response->assertStatus(Response::HTTP_FORBIDDEN);
    }

    protected function login($role): User
    {
        $user = User::create([
            'name' => 'Test User',
            'role' => $role,
        ]);

        $this->actingAs($user);

        return $user;
    }
}