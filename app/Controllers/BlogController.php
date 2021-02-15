<?php


class BlogController
{
//    public function __construct()
//    {
//        render('blog/index', ['title' => 'Blog Page']);
//    }

    public function index()
    {
        render('blog/index', ['title' => 'Blog Page']);
    }
}