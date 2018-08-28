<?php
/**
 * Created by PhpStorm.
 * User: Rafael
 * Date: 28/08/2018
 * Time: 12:31 AM
 */

$config['var_excepts'] = [null,'',""];

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
