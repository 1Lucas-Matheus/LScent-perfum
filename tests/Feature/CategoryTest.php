<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    use RefreshDatabase; // Reseta o banco a cada teste

    public function test_homepage_is_accessible()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_categories_index_requires_authentication()
    {
        // Se a rota de categorias for protegida por auth, teste o redirecionamento
        $response = $this->get(route('categories.index'));
        $response->assertRedirect(route('login'));
    }

    public function test_authenticated_user_can_view_categories_index()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        // Criar algumas categorias para aparecer no index
        Category::factory()->count(3)->create();

        $response = $this->get(route('categories.index'));

        $response->assertStatus(200);
        $response->assertViewHas('categories');
    }
}
