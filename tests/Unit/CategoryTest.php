<?php

use App\Http\Controllers\CategoryController;

test('example', function () {
    expect(true)->toBeTrue();
});

test('sum', function () {
    $category = new CategoryController();
    $sum = $category->sum(2, 3);
    expect($sum)->toBe(5);
});
