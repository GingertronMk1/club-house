<?php

beforeEach(function () {
    $this->storeRequest = new \App\Http\Requests\StoreClubRequest;
    $this->updateRequest = new \App\Http\Requests\UpdateClubRequest;
});

test('authorize is true for store', function () {
    expect($this->storeRequest->authorize())->toBeTrue();
});

test('authorize is true for update', function () {
    expect($this->updateRequest->authorize())->toBeTrue();
});

test('store rules are accurate', function () {
    $createRules = [
        'name' => ['required', 'string'],
        'description' => ['nullable', 'string'],
        'address' => ['nullable', 'string'],
        'main_colour' => ['required', 'hex_color'],
        'secondary_colour' => ['required', 'hex_color'],
    ];

    $updateRules = [
        ...$createRules,
        'main_colour' => ['hex_color'],
        'secondary_colour' => ['hex_color'],
    ];

    expect($this->storeRequest->rules())->toBe($createRules)
        ->and($this->updateRequest->rules())->toBe($updateRules);
});
