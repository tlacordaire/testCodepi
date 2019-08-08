<?php

Route::get('/', 'ProductsController@index');

// Routes Product

Route::get('/products', 'ProductsController@index');
Route::get('/product/create', 'ProductsController@create');
Route::get('/product/{id}', 'ProductsController@edit');
Route::get('/product/delete/{id}', 'ProductsController@delete');

Route::post('/product', 'ProductsController@store');
Route::post('/product/update', 'ProductsController@update');


// Routes Category

Route::get('/categories', 'CategoriesController@index');
Route::get('/category/create', 'CategoriesController@create');
Route::get('/category/{id}', 'CategoriesController@edit');

Route::post('/category', 'CategoriesController@store');
Route::post('/category/update', 'CategoriesController@update');

// Route qui permet d'ajouter une catégorie en dynamique
Route::post('/category/add/jquery', 'CategoriesController@createJquery');
