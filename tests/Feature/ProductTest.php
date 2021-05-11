<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductTest extends TestCase
{
    public function test_getting_products(): void
    {
        $response = $this->get("/api/products/");
        $response->assertStatus(200);
    }

    public function test_creating_product(): void
    {
        $response = $this->post("/api/products/create", ["name" => "testing_product", "category_id" => "1"]);

        $response->assertStatus(200);
    }

    public function test_deleting_product(): void
    {
        $response = $this->delete("/api/products/1");

        $response->assertStatus(200);
    }
}
