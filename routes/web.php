<?php

Route::get('/', 'ProductsController@index');

// Routes Product

Route::get('/products', 'ProductsController@index')->name('products_list');
Route::get('/product/create', 'ProductsController@create')->name('product_create');
Route::get('/product/{id}', 'ProductsController@edit')->name('product_edit');
Route::get('/product/delete/{id}', 'ProductsController@delete')->name('product_delete');

Route::post('/product', 'ProductsController@store')->name('product_store');
Route::post('/product/update', 'ProductsController@update')->name('product_update');

// Routes Category

Route::get('/categories', 'CategoriesController@index')->name('categories_list');
Route::get('/category/create', 'CategoriesController@create')->name('category_create');
Route::get('/category/{id}', 'CategoriesController@edit')->name('category_edit');

Route::post('/category', 'CategoriesController@store')->name('category_store');
Route::post('/category/update', 'CategoriesController@update')->name('category_update');

// Route qui permet d'ajouter une catégorie en dynamique
Route::post('/category/add/jquery', 'CategoriesController@createJquery');
