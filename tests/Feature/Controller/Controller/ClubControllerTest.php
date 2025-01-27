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

test('ensure edit renders', function () {
    $club = Club::factory()->create();
    $response = $this->get(route('club.edit', ['club' => $club]));

    $response->assertStatus(200);
});
