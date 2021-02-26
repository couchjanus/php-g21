<?php

return [
    "" => "HomeController@index",
    "about" => "AboutController@index",
    "blog" => "BlogController@index",
    "contact" => "ContactController@index",
    "errors" => "ErrorController@index",
    "admin" => "Admin\DashboardController@index",
    "admin/contact" => "Admin\ContactController@index",
    "admin/categories" => "Admin\CategoryController@index",
    "admin/categories/create" => "Admin\CategoryController@create",
    "admin/categories/store" => "Admin\CategoryController@store",
    'admin/categories/show/{id}' => 'Admin\CategoryController@show',
    'admin/categories/edit/{id}' => 'Admin\CategoryController@edit',
    'admin/categories/update' => 'Admin\CategoryController@update',
    'admin/categories/delete/{id}' => 'Admin\CategoryController@delete',

    "admin/brands" => "Admin\BrandController@index",
    "admin/brands/create" => "Admin\BrandController@create",
    "admin/brands/store" => "Admin\BrandController@store",
    'admin/brands/show/{id}' => 'Admin\BrandController@show',
    'admin/brands/edit/{id}' => 'Admin\BrandController@edit',
    'admin/brands/update' => 'Admin\BrandController@update',
    'admin/brands/delete/{id}' => 'Admin\BrandController@delete',

    "admin/products" => "Admin\ProductController@index",
    "admin/products/create" => "Admin\ProductController@create",
    "admin/products/store" => "Admin\ProductController@store",
    'admin/products/show/{id}' => 'Admin\ProductController@show',
    'admin/products/edit/{id}' => 'Admin\ProductController@edit',
    'admin/products/update' => 'Admin\ProductController@update',
    'admin/products/delete/{id}' => 'Admin\ProductController@delete',
    
   // 'api/products' => 'HomeController@getProducts',
   'api/products' => 'HomeController@getProductsWithCategory',
   'api/products/{id}' => 'HomeController@getProduct',
   
   'api/categories'=> 'HomeController@getCategories',
   'api/categories/count'=> 'HomeController@getCategoriesWithCount',

];