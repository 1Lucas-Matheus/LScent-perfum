<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    use RefreshDatabase;

    public function test_guest_cannot_access_category_routes()
    {
        $this->get(route('categories.index'))->assertRedirect(route('login'));
        $this->post(route('categories.store'), [])->assertRedirect(route('login'));
    }

    public function test_authenticated_user_can_access_category_index()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        Category::factory()->count(2)->create();

        $response = $this->get(route('categories.index'));

        $response->assertStatus(200);
        $response->assertViewHas('categories');
    }

    public function test_store_category_requires_name()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->post(route('categories.store'), [
            'name' => ''
        ]);

        $response->assertRedirect(route('categories.index'));
        $response->assertSessionHas('messageError', 'Preencha todos os campos obrigatórios.');
    }

    public function test_store_category_with_existing_name_fails()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        Category::factory()->create(['name' => 'Categoria X']);

        $response = $this->post(route('categories.store'), [
            'name' => 'Categoria X'
        ]);

        $response->assertRedirect(route('categories.index'));
        $response->assertSessionHas('messageError', 'Já existe uma categoria com esse nome.');
    }

    public function test_store_category_successfully()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $response = $this->post(route('categories.store'), [
            'name' => 'Nova Categoria'
        ]);

        $response->assertRedirect(route('categories.index'));
        $response->assertSessionHas('messageSuccess', 'Categoria criada com êxito.');
        $this->assertDatabaseHas('categories', ['name' => 'Nova Categoria']);
    }

    public function test_edit_returns_category_view()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $category = Category::factory()->create();

        $response = $this->get(route('categories.edit', $category->id));

        $response->assertStatus(200);
        $response->assertViewHas('category', $category);
    }

    public function test_update_category_requires_name()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $category = Category::factory()->create();

        $response = $this->put(route('categories.update', $category->id), [
            'name' => ''
        ]);

        $response->assertRedirect(route('categories.edit', ['category' => $category->id]));
        $response->assertSessionHas('messageError', 'Preencha todos os campos obrigatórios.');
    }

    public function test_update_category_with_existing_name_fails()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $cat1 = Category::factory()->create(['name' => 'Categoria 1']);
        $cat2 = Category::factory()->create(['name' => 'Categoria 2']);

        $response = $this->put(route('categories.update', $cat2->id), [
            'name' => 'Categoria 1'
        ]);

        $response->assertRedirect(route('categories.edit', ['category' => $cat2->id]));
        $response->assertSessionHas('messageError', 'Já existe outra categoria com esse nome.');
    }

    public function test_update_category_successfully()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $category = Category::factory()->create(['name' => 'Antigo Nome']);

        $response = $this->put(route('categories.update', $category->id), [
            'name' => 'Novo Nome'
        ]);

        $response->assertRedirect(route('categories.index'));
        $response->assertSessionHas('messageSuccess', 'A categoria foi atualizada com êxito.');
        $this->assertDatabaseHas('categories', ['name' => 'Novo Nome']);
    }

    public function test_destroy_category_with_products_fails()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $category = Category::factory()->create();
        \App\Models\Products::factory()->create([
            'category_id' => $category->id
        ]);

        $response = $this->delete(route('categories.destroy', $category->id));

        $response->assertRedirect(route('categories.index'));
        $response->assertSessionHas('messageError', 'Não é possível excluir essa categoria. Existem produtos associados a ela.');
        $this->assertDatabaseHas('categories', ['id' => $category->id]);
    }

    public function test_destroy_category_successfully()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $category = Category::factory()->create();

        $response = $this->delete(route('categories.destroy', $category->id));

        $response->assertRedirect(route('categories.index'));
        $response->assertSessionHas('messageSuccess', 'Categoria excluída com êxito.');
        $this->assertDatabaseMissing('categories', ['id' => $category->id]);
    }
}
