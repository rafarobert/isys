<?php
/**
 * Created by PhpStorm.
 * User: Rafael
 * Date: 28/08/2018
 * Time: 12:31 AM
 */


/*
|--------------------------------------------------------------------------
| Base Site URL
|--------------------------------------------------------------------------
|
| URL to your CodeIgniter root. Typically this will be your base URL,
| WITH a trailing slash:
|
|	http://example.com/
|
| If this is not set then CodeIgniter will try guess the protocol, domain
| and path to your installation. However, you should always configure this
| explicitly and never rely on auto-guessing, especially in production
| environments.
|
*/
$config['base_url'] = WEBSERVER;

$config['sys_title'] = 'Estic - Admin';
$config['sys_name'] = 'estic Framework para desarrollo agil';

$config['sess_key_admin'] = 'admin_loggedin';
$config['sess_key_base'] = 'base_loggedin';
$config['sess_key_sys'] = 'sys_loggedin';
$config['sess_key'] = 'loggedin';
$config['sess_table'] = 'ci_users';
$config['sess_idTable'] = 'id_user';
$config['sess_object'] = 'oUser';

$config['var_excepts'] = [null,'',""];
$config['tab_excepts'] = ['migrations'];

$config['tab_titles'] = ['nombre','name','title','titulo','apellido','lastname'];

$config['isysDirs']= array(
    'modules' => [
        'sys' => 'HMVC',
    ],
    'migrations' => [
        'tables' => 'TAB'
    ]
);

$config['ormDirs'] = array(
    'crud' => [
        'admin' => 'HMVC',
        'base' => 'HMVC',
        'front' => 'HMVC'
    ]
);

$config['dirs'] = array(
    'isys' => [
        'modules' => [
            'base' => 'HMVC',
        ],
    ],
    'app' => [
        'modules' => [
            'admin' => 'HMVC',
            'base' => 'HMVC',
            'front' => 'HMVC'
        ],
        'layouts' => [
            'backend' => 'HMVC',
            'frontend' => 'HMVC'
        ]
    ],
    'orm' => [
        'crud' => [
            'admin' => 'HMVC',
            'base' => 'HMVC',
            'front' => 'HMVC'
        ],
        'migrations' => [
            'tables' => 'TAB'
        ]
    ]
);
