<?php

$storeRequest = new \App\Http\Requests\StoreClubRequest;
$updateRequest = new \App\Http\Requests\UpdateClubRequest;

test('authorize is true for store', function () use ($storeRequest) {
    expect($storeRequest->authorize())->toBeTrue();
});

test('authorize is true for update', function () use ($updateRequest) {
    expect($updateRequest->authorize())->toBeTrue();
});

test('rules are same for store and update', function () use ($storeRequest, $updateRequest) {
    $rules = [
        'name' => ['required', 'string'],
        'description' => ['nullable', 'string'],
        'address' => ['nullable', 'string'],
        'main_colour' => ['required', 'hex_color'],
        'secondary_colour' => ['required', 'hex_color'],
    ];

    expect($storeRequest->rules())->toBe($rules)
        ->and($updateRequest->rules())->toBe($rules);
});
