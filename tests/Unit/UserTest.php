<?php

namespace Tests\Unit;

use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;
    protected $seed = true;

    public function test_users_and_tasks_can_be_created(): void
    {
        $this->seed(OrderStatusSeeder::class);
    }
}
