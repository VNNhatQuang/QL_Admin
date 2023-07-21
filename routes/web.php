<?php

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];


$routes = [
    '/' => [AdminController::class, 'index'],
    '/search' => [AdminController::class, 'search'],
    '/create' => [AdminController::class, 'showCreateForm'],
    '/store' => [AdminController::class, 'store'],
    '/edit' => [AdminController::class, 'showEditForm'],
    '/update' => [AdminController::class, 'update'],
    '/destroy' => [AdminController::class, 'destroy'],
];