<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_login(): void
    {
        $email = "w@wp.pl";

        $response = $this->post("/api/auth/login", ["email" => "$email", "password" => "$email"]);

        $response->assertStatus(200);
    }

    public function test_register_account_already_created(): void
    {
        $email = "o@wp.pl";

        $response = $this->post("/api/auth/register", ["name"=> "$email","email" => "$email", "password" => "$email", "password_confirmation" =>"$email"]);

        $response->assertStatus(400);
    }

//    public function test_register_new_account(): void
//    {
//        $email = "newaccount@wp.pl";
//
//        $response = $this->post("/api/auth/register", ["name"=> "$email","email" => "$email", "password" => "$email", "password_confirmation" =>"$email"]);
//
//        $response->assertStatus(200);
//    }

    public function test_getting_lists(): void
    {
        $response = $this->get("/api/lists/");
        $response->assertStatus(200);
    }

    public function test_getting_products(): void
    {
        $response = $this->get("/api/products/");
        $response->assertStatus(200);
    }

    public function test_getting_categories(): void
    {
        $response = $this->get("/api/categories/");
        $response->assertStatus(200);
    }

    public function test_creating_category(): void
    {
        $response = $this->post("/api/categories/create", ["name"=> "testing_category"]);

        $response->assertStatus(200);
    }

    public function test_creating_product(): void
    {
        $response = $this->post("/api/products/create", ["name"=> "testing_product","category_id" => "2"]);

        $response->assertStatus(200);
    }


}
