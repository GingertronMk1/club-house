<?php

use App\Models\Club;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('ensure index renders', function () {
    $response = $this->get(route('club.index'));

    $response->assertStatus(200);
});

test('ensure create renders', function () {
    $response = $this->get(route('club.create'));

    $response->assertStatus(200);
});

test('ensure store stores', function () {
    $name = uniqid();
    $this->post(
        route('club.store'),
        [
            'name' => $name,
            'description' => '',
            'address' => '',
            'main_colour' => '#ffffff',
            'secondary_colour' => '#ffffff',
        ]
    )->assertRedirectToRoute('club.index');
    $club = Club::where('name', $name)->first();
    expect($club)->toBeInstanceOf(Club::class);
});

test('ensure edit renders', function () {
    $club = Club::factory()->create();
    $response = $this->get(route('club.edit', ['club' => $club]));

    $response->assertStatus(200);
});

test('ensure update updates', function () {
    $name = uniqid();
    $club = Club::factory()->create();
    $response = $this->put(
        route(
            'club.update',
            ['club' => $club]
        ),
        [
            'name' => $name,
        ]
    )->assertRedirectToRoute('club.index');
    $club->refresh();
    expect($club->name)->toBe($name);
});
