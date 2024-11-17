<?php

use App\Models\Question;

use function Pest\Laravel\{actingAs, get};

it('should list all the questions', function () {
    // Arrange
    $user      = \App\Models\User::factory()->create();
    $questions = Question::factory(5)->create();

    // Act
    actingAs($user);
    $response = get(route('dashboard'));

    // Assert
    /** @var $var Question $item */
    foreach ($questions as $item) {
        $response->assertSee($item->question);
    }

});
