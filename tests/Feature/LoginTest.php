<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class LoginTest extends TestCase
{
    public function test_login(): void
    {
        $email = "w@wp.pl";

        $response = $this->post("/api/auth/login", ["email" => "$email", "password" => "$email"]);

        $response->assertStatus(200);
    }

    public function test_login_with_bad_credentials(): void
    {
        $email = "qwertyuiop@wp.pl";

        $response = $this->post("/api/auth/login", ["email" => "$email", "password" => "$email"]);

        $response->assertStatus(400);
    }

    public function test_login_with_no_credentials(): void
    {
        $response = $this->post("/api/auth/login", ["email" => "", "password" => ""]);

        $response->assertStatus(400);
    }
}
