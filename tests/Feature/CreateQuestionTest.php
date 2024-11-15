<?php

use App\Models\User;

use function Pest\Laravel\{actingAs, assertDatabaseCount, assertDatabaseHas, post};

it('should be able to create a new question bigger than 255 characters', function () {
    // Arrange :: preparar
    $user = User::factory()->create();
    actingAs($user);

    // Act :: agir
    $request = post(route('question.store'), [
        'question' => str_repeat('*', 260) . '?',
    ]);

    // Assert :: verificar
    $request->assertRedirect(route('dashboard'));
    assertDatabaseCount('questions', 1);
    assertDatabaseHas('questions', ['question' => str_repeat('*', 260) . '?']);
});

test('it should to check if ends with question mark "?"', function () {
    $response = post('question.create', [
        'question' => 'this is not a question?',
    ]);

    $response->assertStatus(201);
})->todo();

test('should have at least 10 characters', function () {
    $response = post('question.create', [
        'question' => 'short?',
    ]);

    $response->assertStatus(200)
        ->assertJsonPath('errors.question.0', 'The question must be at least 10 characters.');
})->todo();
