<?php

use App\Events\CreateCategoryEvent;
use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Hash;

uses(RefreshDatabase::class);

test('it creates a user', function () {
    $user = User::factory()->create([
        'name' => 'John Doe',
        'email' => 'JohnDoe@gmail.com',
        'password' => Hash::make('password'),
    ]);
    $this->assertDatabaseHas('users', ['name' => 'John Doe',
        'email' => 'JohnDoe@gmail.com']);
});

//test routs
test('it index a category', function () {
    $categories = Category::factory()->count(3)->create();
    $response = $this->get('/category/index');
    $response->assertStatus(200);
   $data= $response->json();
   $this->assertEquals(3,count($data));
   foreach ($categories as $key => $value){
//       dd($value);
       $this->assertDatabaseHas('categories',[
           'id'=>$value->id,
           'name'=>$value->name,
           'description'=>$value->description,
       ]);
       $this->assertDatabaseHas('categories',$value->toArray());
   }

});
test('it create a category', function () {
  $category = [
        'name' =>'php',
        'description'=>'php description'
    ];
    $response = $this->postJson('/category/create',$category);
    $response->assertStatus(201);
    $this->assertDatabaseHas('categories',$category);
    $response->assertJson($category);

});
test('it update a category', function () {
    $category = Category::factory()->create();
    $data = [
        'name' =>'laravel',
        'description'=>'laravel description'
    ];
    $response = $this->put('/category/update/'.$category->id,$data);
    $response->assertStatus(self::Success);
    $this->assertDatabaseHas('categories',$data);
    $response->assertJson($data);
});
test('it delete a category', function () {
    $category = Category::factory()->create();
    $response = $this->delete('/category/delete/'.$category->id);
    $response->assertStatus(self::Success);
    $this->assertDatabaseMissing('categories',$category->toArray());
});

//test blade views with data

test('it all a categories', function () {
    $categories = Category::factory()->count(5)->create();
    $response = $this->get('/categories');
    $response->assertStatus(200);
    $response->assertViewIs('category.index');
    $response->assertViewHas('categories'); // variable with compact
    foreach ($categories as $key => $value){
        $response->assertSee($value->name);
        $response->assertSee($value->description);
    }
});

//Test user login and Auth middleware

test('it all login a categories', function () {
    $user = User::factory()->create();
    $categories = Category::factory()->count(5)->create();
    $response = $this->actingAs($user)->get('/categoriesWithLogin');
    $response->assertStatus(200);
    $response->assertViewIs('category.index');
    $response->assertViewHas('categories'); // variable with compact
    foreach ($categories as $key => $value){
        $response->assertSee($value->name);
        $response->assertSee($value->description);
    }
});

//Test Events Listners

test('it create Events a category', function () {
    Event::fake();
    $category = [
        'name' =>'php',
        'description'=>'php description'
    ];
    $response = $this->postJson('/category/create',$category);
    $response->assertStatus(201);
    Event::assertDispatched(CreateCategoryEvent::class,function ($e) use ($category){
        return $e->category->name === $category['name'];
    });
    $this->assertDatabaseHas('categories',$category);
    $response->assertJson($category);

});

//test validation errors

test('it create validation a category', function () {
    $categoryData = [
//        'name' =>'php',
//        'description'=>'php description'
    ];
    $response = $this->postJson('/category/create',$categoryData);
    $response->assertStatus(422);
    //    $response->assertSessionHasErrors(['name', 'description']);
    $response->assertJsonValidationErrors(['name', 'description']);
    $response->assertJson($categoryData);

});