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
];