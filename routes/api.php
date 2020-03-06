<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Story;
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

Route::middleware( 'auth:api' )->get( '/user', function ( Request $request ) {
    return $request->user();
} );

Route::get( '/story/create', function ( Request $request ) {
} );

Route::post( '/stories', function ( Request $request ) {
    $attr = $request->validate( [
        'title' => 'required',
        'body' => 'required'
    ]);
    $story = Story::create($attr);

    return response()->json($story, 201);
});
