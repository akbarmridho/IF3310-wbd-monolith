<?php

// Homepage
\Core\Router\Router::get("", [], \App\Http\Controller\AnimeController::class, 'index');

// Endpoint for ajax search request
\Core\Router\Router::get("search", [], \App\Http\Controller\AnimeController::class, 'search');

// add anime
\Core\Router\Router::get("admin/anime/add", [\App\Http\Middleware\Admin::class], \App\Http\Controller\AddAnimeController::class, 'addAnimeView');
\Core\Router\Router::post("admin/anime", [\App\Http\Middleware\Admin::class], \App\Http\Controller\AddAnimeController::class, 'addAnime');

// edit anime
\Core\Router\Router::get("admin/anime/{id}", [\App\Http\Middleware\Admin::class], \App\Http\Controller\EditAnimeController::class, 'editAnimeView');
\Core\Router\Router::put("admin/anime/{id}", [\App\Http\Middleware\Admin::class], \App\Http\Controller\EditAnimeController::class, 'editAnime');
\Core\Router\Router::delete("admin/anime/{id}", [\App\Http\Middleware\Admin::class], \App\Http\Controller\EditAnimeController::class, 'deleteAnime');

// Anime watch page
\Core\Router\Router::get('episode/{id}', [\App\Http\Middleware\Premium::class], \App\Http\Controller\AnimeStreamController::class, 'view');
\Core\Router\Router::get('stream/{id}', [\App\Http\Middleware\Premium::class], \App\Http\Controller\AnimeStreamController::class, 'index');

// Anime detail page
\Core\Router\Router::get('anime/{id}', [], \App\Http\Controller\AnimeController::class, 'view');

// add review
\Core\Router\Router::get("review/add/{id}", [\App\Http\Middleware\Authenticated::class], \App\Http\Controller\ReviewController::class, 'addReviewView');
\Core\Router\Router::post("review/add/{id}", [\App\Http\Middleware\Authenticated::class], \App\Http\Controller\ReviewController::class, 'addReview');

// edit review
\Core\Router\Router::get("review/edit/{id}", [\App\Http\Middleware\Authenticated::class], \App\Http\Controller\ReviewController::class, 'editReviewView');
\Core\Router\Router::put("review/edit/{id}", [\App\Http\Middleware\Authenticated::class], \App\Http\Controller\ReviewController::class, 'editReview');

// delete review
\Core\Router\Router::delete("review/delete/{id}", [\App\Http\Middleware\Authenticated::class], \App\Http\Controller\ReviewController::class, 'deleteReview');

// Update profile
\Core\Router\Router::get('profile/edit', [\App\Http\Middleware\Authenticated::class], \App\Http\Controller\ProfileController::class, 'updateView');
\Core\Router\Router::put('profile/edit', [\App\Http\Middleware\Authenticated::class], \App\Http\Controller\ProfileController::class, 'update');
\Core\Router\Router::get('profile/password', [\App\Http\Middleware\Authenticated::class], \App\Http\Controller\ProfileController::class, 'passwordView');
\Core\Router\Router::put('profile/password', [\App\Http\Middleware\Authenticated::class], \App\Http\Controller\ProfileController::class, 'password');
\Core\Router\Router::delete('profile', [\App\Http\Middleware\Authenticated::class], \App\Http\Controller\ProfileController::class, 'delete');

// Profile detail page
\Core\Router\Router::get('profile/{id}', [], \App\Http\Controller\ProfileController::class, 'view');

// Auth Login logout
\Core\Router\Router::get("login", [\App\Http\Middleware\Guest::class], \App\Http\Controller\AuthController::class, 'loginView');
\Core\Router\Router::post("login", [\App\Http\Middleware\Guest::class], \App\Http\Controller\AuthController::class, 'login');
\Core\Router\Router::post("logout", [\App\Http\Middleware\Authenticated::class], \App\Http\Controller\AuthController::class, 'logout');

// Auth Register
\Core\Router\Router::get('register', [], \App\Http\Controller\AuthController::class, 'registerView');
\Core\Router\Router::post('register', [], \App\Http\Controller\AuthController::class, 'register');

// Anime Status
\Core\Router\Router::post("anime/{id}/status", [\App\Http\Middleware\Authenticated::class], \App\Http\Controller\StatusController::class, 'updateStatus');
\Core\Router\Router::delete("anime/{id}/status", [\App\Http\Middleware\Authenticated::class], \App\Http\Controller\StatusController::class, "deleteStatus");