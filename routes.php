<?php

return [
    // IndexController
    "/" => [
        'GET' => ['IndexController', 'index'],
    ],
    "/about" => [
        'GET' => ['IndexController', 'about']
    ],
    "/help" => [
        'GET' => ['IndexController', 'help']
    ],
    // BookController
    "/book" => [
        'GET' => ['BookController', 'show'],
        'POST' => ['BookController', 'store'],
        'PATCH' => ['BookController', 'update'],
        'DELETE' => ['BookController', 'destroy'],
    ],
    "/books" => [
        'GET' => ['BookController', 'index'],
        'POST' => ['BookController', 'store'],
    ],
    "/books/create" => [
        'GET' => ['BookController', 'create'],
    ],
    "/book/edit" => [
        'GET' => ['BookController', 'edit'],
    ],
    // RegistrationController

    // SessionController
];