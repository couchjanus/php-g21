<?php

$address = conf('contacts');
$title = 'Contact us';

// var_dump($address);

render('contact/index', [
    'title' => $title,
    'address' => $address[0],
]);
