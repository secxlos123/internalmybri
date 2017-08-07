<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('internals.home.index');
});
Route::get('/nasabah', function () {
    return view('internals.customers.index');
});
Route::get('/nasabah/detail', function () {
    return view('internals.customers.detail');
});
Route::get('/roles', function () {
    return view('internals.roles.index');
});
Route::get('/roles/create', function () {
    return view('internals.roles.create');
});
Route::get('/login', function () {
    return view('internals.auth.login');
});
Route::get('/logout', function () {
    return view('internals.auth.logout');
});
Route::get('/forgot-password', function () {
    return view('internals.auth.forgot-password');
});
Route::get('/email-sent', function () {
    return view('internals.auth.email-sent');
});
