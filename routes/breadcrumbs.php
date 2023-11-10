<?php


use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;

// Dashboard
Breadcrumbs::for('dashboard', function ($trail) {
    $trail->push('Dashboard', route('dashboard'));
});

// users
Breadcrumbs::for('users.index', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Users', route('users.index'));
});

Breadcrumbs::for('users.create', function ($trail) {
    $trail->parent('users.index');
    $trail->push('Create', route('users.create'));
});


Breadcrumbs::for('users.show', function ($trail, $user) {
    $trail->parent('users.index');
    $trail->push('Show User', route('users.show', $user));
});

Breadcrumbs::for('users.update', function ($trail, $user) {
    $trail->parent('users.index');
    $trail->push('Update User', route('users.update', $user));
});

// category
Breadcrumbs::for('categories.index', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Categories', route('categories.index'));
});

Breadcrumbs::for('categories.create', function ($trail) {
    $trail->parent('categories.index');
    $trail->push('Create', route('categories.create'));
});

Breadcrumbs::for('categories.edit', function ($trail, $category) {
    $trail->parent('categories.index');
    $trail->push('Edit Category', route('categories.edit', $category));
});

Breadcrumbs::for('categories.show', function ($trail, $category) {
    $trail->parent('categories.index');
    $trail->push('Show Category', route('categories.show', $category));
});

// tag
Breadcrumbs::for('tags.index', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Tags', route('tags.index'));
});

Breadcrumbs::for('tags.create', function ($trail) {
    $trail->parent('tags.index');
    $trail->push('Create', route('tags.create'));
});

Breadcrumbs::for('tags.edit', function ($trail, $tag) {
    $trail->parent('tags.index');
    $trail->push('Edit Tag', route('tags.edit', $tag));
});

Breadcrumbs::for('tags.show', function ($trail, $tag) {
    $trail->parent('tags.index');
    $trail->push('Show Tag', route('categories.show', $tag));
});

// posts
Breadcrumbs::for('posts.index', function ($trail) {
    $trail->parent('dashboard');
    $trail->push('Posts', route('posts.index'));
});

Breadcrumbs::for('posts.create', function ($trail) {
    $trail->parent('posts.index');
    $trail->push('Create', route('posts.create'));
});

Breadcrumbs::for('posts.update', function ($trail, $post) {
    $trail->parent('posts.index');
    $trail->push('Update Post', route('posts.update', $post));
});

Breadcrumbs::for('posts.show', function ($trail, $post) {
    $trail->parent('posts.index');
    $trail->push('Show Post', route('posts.show', $post));
});
