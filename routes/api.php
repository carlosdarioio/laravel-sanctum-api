<?php
//use App\Models\Product;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/




/*Route::post('/products',function(){

    return Product::create([
        'name'=>'Product one',
        'slug'=>'product-one',
        'description'=>'This is products one',
        'price'=>'99.99'
    ]);

});*/



//poniendo las anteriores dos en una sola:
//para ver todas las rutas poner:
//php artisan route:list
//--------------------------public routes

Route::get('/products',[ProductController::class,'index']);
Route::get('/products/{id}',[ProductController::class,'show']);
Route::get('/products/search/{name}',[ProductController::class,'search']);//alola creando busqueda

Route::post('/register',[AuthController::class,'register']);
Route::post('/login',[AuthController::class,'login']);



//protegiendo rutas si no se a auth
//----------------------protected routes
Route::group(['middleware'=>['auth:sanctum']], function () {
    Route::post('/products',[ProductController::class,'store']);
    Route::put('/products/{id}',[ProductController::class,'update']);
    Route::delete('/products/{id}',[ProductController::class,'destroy']);
    Route::post('/logout',[AuthController::class,'logout']);
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
