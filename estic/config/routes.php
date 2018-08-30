<?php
/**
 * Created by PhpStorm.
 * User: Rafael
 * Date: 28/08/2018
 * Time: 12:12 AM
 */

// ================= Base routes ====================
$route['base'] = 'backend/base/dashboard';
$route['base/dashboard'] = 'backend/base/dashboard';
// ================= Migration paths ================
$route['base/migrate/fromdatabase'] = 'base/migrate/fromdatabase';
$route['base/migrate/([a-zA-Z]+)/(:num)'] = 'base/migrate/run/$0/$1/$2';
$route['base/migrate/([a-zA-Z]+)/(:num)'] = 'base/migrate/run/$0/$1/$2';
$route['base/migrate/([a-zA-Z]+)'] = 'base/migrate/run/$0/$1';
$route['base/migrate/([a-zA-Z]+)'] = 'base/migrate/run/$0/$1';
$route['base/migrate/(:num)'] = 'base/migrate/run/$0/$1';
$route['base/migrate/(:num)'] = 'base/migrate/run/$0/$1';
// ===================================================
