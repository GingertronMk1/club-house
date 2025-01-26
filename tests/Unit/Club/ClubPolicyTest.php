<?php

use App\Models\Club;
use App\Models\User;
use App\Policies\ClubPolicy;

$user = new User();
$policy = new ClubPolicy();
$club = new Club();

test('Anyone can viewAny', function () use ($user, $policy) {
    expect($policy->viewAny($user))->toBeTrue();
});

test('Anyone can view', function () use ($user, $policy, $club) {
    expect($policy->view($user, $club))->toBeTrue();
});

test('Anyone can create', function () use ($user, $policy) {
    expect($policy->create($user))->toBeTrue();
});

test('Anyone can update', function () use ($user, $policy, $club) {
    expect($policy->update($user, $club))->toBeTrue();
});

test('Anyone can delete', function () use ($user, $policy, $club) {
    expect($policy->delete($user, $club))->toBeTrue();
});

test('Anyone can restore', function () use ($user, $policy, $club) {
    expect($policy->restore($user, $club))->toBeTrue();
});

test('Anyone can forceDelete', function () use ($user, $policy, $club) {
    expect($policy->forceDelete($user, $club))->toBeTrue();
});
