<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    public function test_getting_categories(): void
    {
        $response = $this->get("/api/categories/");
        $response->assertStatus(200);
    }

    public function test_creating_category(): void
    {
        $response = $this->post("/api/categories/create", ["name" => "testing_category"]);

        $response->assertStatus(200);
    }

    public function test_deleting_category(): void
    {
        $response = $this->delete("/api/categories/1");

        $response->assertStatus(200);
    }
}
