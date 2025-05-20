<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Products;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductsTest extends TestCase
{
    use RefreshDatabase;

    public function test_products_index_shows_products()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $category = Category::factory()->create();
        $product = Products::factory()->create(['category_id' => $category->id]);

        $response = $this->get(route('products.index'));

        $response->assertStatus(200);
        $response->assertViewHas('products');
        $response->assertViewHas('categories');
    }

    public function test_create_shows_form_with_categories()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        Category::factory()->count(3)->create();

        $response = $this->get(route('products.create'));

        $response->assertStatus(200);
        $response->assertViewHas('categories');
    }

    public function test_store_creates_product_with_valid_data()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $category = Category::factory()->create();

        $response = $this->post(route('products.store'), [
            'name' => 'Produto Teste',
            'price' => '99.99',
            'category_id' => $category->id,
            'quantity' => 10,
            'promo' => 15,
        ]);

        $response->assertRedirect(route('products.index'));
        $response->assertSessionHas('messageSuccess');

        $this->assertDatabaseHas('products', [
            'name' => 'Produto Teste',
            'price' => 99.99,
            'category_id' => $category->id,
            'quantity' => 10,
            'promo' => 15,
        ]);
    }

    public function test_store_fails_with_missing_fields()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->post(route('products.store'), [
            'name' => '',
            'price' => '',
            'category_id' => '',
            'quantity' => '',
        ]);

        $response->assertRedirect(route('products.create'));
        $response->assertSessionHas('messageError');
    }

    public function test_edit_shows_form_with_product_and_categories()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $category = Category::factory()->create();
        $product = Products::factory()->create(['category_id' => $category->id]);

        $response = $this->get(route('products.edit', $product));

        $response->assertStatus(200);
        $response->assertViewHas('products');
        $response->assertViewHas('categories');
    }

    public function test_update_modifies_product_with_valid_data()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $category = Category::factory()->create();
        $product = Products::factory()->create(['category_id' => $category->id]);

        $newCategory = Category::factory()->create();

        $response = $this->put(route('products.update', $product), [
            'name' => 'Produto Atualizado',
            'price' => '150.00',
            'category_id' => $newCategory->id,
            'quantity' => 20,
            'promo' => 10,
        ]);

        $response->assertRedirect(route('products.index'));
        $response->assertSessionHas('messageSuccess');

        $this->assertDatabaseHas('products', [
            'id' => $product->id,
            'name' => 'Produto Atualizado',
            'price' => 150.00,
            'category_id' => $newCategory->id,
            'quantity' => 20,
            'promo' => 10,
        ]);
    }

    public function test_destroy_deletes_product()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $category = Category::factory()->create();
        $product = Products::factory()->create(['category_id' => $category->id]);

        $response = $this->delete(route('products.destroy', $product));

        $response->assertRedirect(route('products.index'));
        $response->assertSessionHas('messageSuccess');

        $this->assertDatabaseMissing('products', [
            'id' => $product->id,
        ]);
    }

    public function test_routes_redirect_guest_to_login()
    {
        $category = Category::factory()->create();
        $product = Products::factory()->create(['category_id' => $category->id]);

        $routes = [
            'get' => [
                route('products.index'),
                route('products.create'),
                route('products.edit', $product),
            ],
            'post' => [
                route('products.store'),
            ],
            'put' => [
                route('products.update', $product),
            ],
            'delete' => [
                route('products.destroy', $product),
            ],
        ];

        foreach ($routes['get'] as $route) {
            $response = $this->get($route);
            $response->assertRedirect(route('login'));
        }

        foreach ($routes['post'] as $route) {
            $response = $this->post($route, []);
            $response->assertRedirect(route('login'));
        }

        foreach ($routes['put'] as $route) {
            $response = $this->put($route, []);
            $response->assertRedirect(route('login'));
        }

        foreach ($routes['delete'] as $route) {
            $response = $this->delete($route);
            $response->assertRedirect(route('login'));
        }
    }
}
