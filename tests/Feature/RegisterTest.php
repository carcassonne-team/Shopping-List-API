<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegisterTest extends TestCase
{
    public function test_register_account_already_created(): void
    {
        $email = "o@wp.pl";

        $response = $this->post("/api/auth/register", ["name" => "$email", "email" => "$email", "password" => "$email", "password_confirmation" => "$email"]);

        $response->assertStatus(400);
    }

    public function test_register_new_account(): void
    {
        $email = "mysupernewaccount2@wp.pl";

        $response = $this->post("/api/auth/register", ["name" => "$email", "email" => "$email", "password" => "$email", "password_confirmation" => "$email"]);

        $response->assertStatus(200);
    }
}
