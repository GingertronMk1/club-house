<?php

use App\Models\Club;
use App\Models\User;
use App\Policies\ClubPolicy;

beforeEach(function () {
    $this->user = new User;
    $this->policy = new ClubPolicy;
    $this->club = new Club;
});

test('Anyone can viewAny', function () {
    expect($this->policy->viewAny($this->user))->toBeTrue();
});

test('Anyone can view', function () {
    expect($this->policy->view($this->user, $this->club))->toBeTrue();
});

test('Anyone can create', function () {
    expect($this->policy->create($this->user))->toBeTrue();
});

test('Anyone can update', function () {
    expect($this->policy->update($this->user, $this->club))->toBeTrue();
});

test('Anyone can delete', function () {
    expect($this->policy->delete($this->user, $this->club))->toBeTrue();
});

test('Anyone can restore', function () {
    expect($this->policy->restore($this->user, $this->club))->toBeTrue();
});

test('Anyone can forceDelete', function () {
    expect($this->policy->forceDelete($this->user, $this->club))->toBeTrue();
});
