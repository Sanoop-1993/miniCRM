<?php

use Illuminate\Support\Facades\Route;

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
    return view('auth.login');
});

Auth::routes([
    'register'=>false
]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/companies', [App\Http\Controllers\CompanyController::class, 'index'])->name('company');
Route::post('/companies/store', [App\Http\Controllers\CompanyController::class, 'store'])->name('company.store');
Route::get('/companies/create', [App\Http\Controllers\CompanyController::class, 'create'])->name('companies.create');
Route::get('/companies/edit/{id}', [App\Http\Controllers\CompanyController::class, 'edit'])->name('companies.edit');
Route::get('/companies/delete/{id}', [App\Http\Controllers\CompanyController::class, 'destroy'])->name('companies.delete');
Route::post('/companies/update/{id}', [App\Http\Controllers\CompanyController::class, 'update']);



Route::get('/employees', [App\Http\Controllers\EmployeeController::class, 'index'])->name('employees');
Route::get('/employees/create', [App\Http\Controllers\EmployeeController::class, 'create'])->name('employee.create');
Route::post('/employees/store', [App\Http\Controllers\EmployeeController::class, 'store'])->name('employees.store');
Route::get('/employees/edit/{id}', [App\Http\Controllers\EmployeeController::class, 'edit'])->name('employees.edit');
Route::get('/employees/delete/{id}', [App\Http\Controllers\EmployeeController::class, 'destroy'])->name('employees.update');
Route::post('/employees/update/{id}', [App\Http\Controllers\EmployeeController::class, 'update']);
