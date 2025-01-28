<?php

$storeRequest = new \App\Http\Requests\StoreClubRequest;
$updateRequest = new \App\Http\Requests\UpdateClubRequest;

test('authorize is true for store', function () use ($storeRequest) {
    expect($storeRequest->authorize())->toBeTrue();
});

test('authorize is true for update', function () use ($updateRequest) {
    expect($updateRequest->authorize())->toBeTrue();
});

test('store rules are accurate', function () use ($storeRequest, $updateRequest) {
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

    expect($storeRequest->rules())->toBe($createRules)
        ->and($updateRequest->rules())->toBe($updateRules);
});
