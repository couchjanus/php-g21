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

    "admin/roles" => "Admin\RoleController@index",
    "admin/roles/create" => "Admin\RoleController@create",
    "admin/roles/store" => "Admin\RoleController@store",
    'admin/roles/show/{id}' => 'Admin\RoleController@show',
    'admin/roles/edit/{id}' => 'Admin\RoleController@edit',
    'admin/roles/update' => 'Admin\RoleController@update',
    'admin/roles/delete/{id}' => 'Admin\RoleController@delete',
       
    "admin/users" => "Admin\UserController@index",
    "admin/users/create" => "Admin\UserController@create",
    "admin/users/store" => "Admin\UserController@store",
    'admin/users/show/{id}' => 'Admin\UserController@show',
    'admin/users/edit/{id}' => 'Admin\UserController@edit',
    'admin/users/update' => 'Admin\UserController@update',
    'admin/users/delete/{id}' => 'Admin\UserController@delete',

    "admin/orders" => "Admin\OrderController@index",
   
   
   'api/products' => 'HomeController@getProductsWithCategory',
   'api/products/{id}' => 'HomeController@getProduct',
   'api/categories'=> 'HomeController@getCategories',
   'api/categories/count'=> 'HomeController@getCategoriesWithCount',

   'api/cart' => 'OrderController@cart',

   'register' => 'RegisterController@signup',
   'login' => 'LoginController@signin',
   'logout' => 'LoginController@logout',
   'profile' => 'ProfileController@index',

   'profile/orders' => 'ProfileController@ordersList',
   'profile/orders/view/{id}'=> 'ProfileController@orderView',
   'profile/orders/check/{id}'=> 'ProfileController@checkOrder',
   'profile/orders/change'=> 'ProfileController@changeOrder',

];