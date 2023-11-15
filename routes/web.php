<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\BlogCategoryController;
use App\Http\Controllers\BlogController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// User Routing
Route::get("/", [PageController::class, "index"]);
Route::get("/about", [PageController::class, "about"]);
Route::get("/blog", [PageController::class, "blog"]);
Route::get("/contact", [PageController::class, "contact"]);
Route::get("/portfolio", [PageController::class, "portfolio"]);


//Admin Routing
Route::prefix('admin')->group(
    function () {
        Route::get("/dashboard", [PageController::class, "adminDashboard"]);

        //blogCategory
        Route::get("/blogcategory", [BlogCategoryController::class, "index"]);
        Route::get("/blogcategory/add", [BlogCategoryController::class, "create"]);
        Route::post("/blogcategory", [BlogCategoryController::class, "store"]);
        Route::get('/blogcategory/{id}/edit', [BlogCategoryController::class, 'show']);
        Route::put('/blogcategory/{id}', [BlogCategoryController::class, 'update']);
        Route::get("/blogcategory/{id}/delete", [BlogCategoryController::class, "destroy"]);

        //blog
        Route::get("/blog", [BlogController::class, "index"]);
        Route::get("/blog/add", [BlogController::class, "create"]);
        Route::post("/blog", [BlogController::class, "store"]);
        Route::get("/blog/{id}/edit", [BlogController::class, "show"]);
        Route::put("/blog/{id}", [BlogController::class, "update"]);
        Route::get("/blog/{id}/delete", [BlogController::class, "destroy"]);
    }
);
