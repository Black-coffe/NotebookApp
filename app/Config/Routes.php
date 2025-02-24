<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');          // Главная страница
$routes->post('/store', 'Home::store');    // Сохранение заметки
$routes->get('/filter/(:any)', 'Home::filter/$1'); // Фильтрация по важности