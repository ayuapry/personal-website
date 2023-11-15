<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\BlogCategoryController;

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

// Route::get('/', function () {
//     return view('about');
// });

// User Routing
Route::get("/", [PageController::class, "index"]);
Route::get("/about", [PageController::class, "about"]);
Route::get("/blog", [PageController::class, "blog"]);


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
    }
);
