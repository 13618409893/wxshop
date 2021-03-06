<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

return [
    // 生成应用公共文件
    '__file__' => ['common.php', 'config.php', 'database.php'],

    'admin'     => [
        '__file__'   => ['common.php'],
        '__dir__'    => ['controller', 'model', 'view'],
        'controller' => ['Index', 'Ad', 'Category', 'Common', 'Goods'],
        'model'      => ['Category'],
        'view'       => [
            'index/index',
            'ad/index',
            'category/index',
            'goods/index',
            'goods/content',
            'goods/add',
            'goods/edit',
            'goods/addimg'
        ],
    ],

    'api'     => [
        '__file__'   => ['common.php'],
        '__dir__'    => ['controller', 'model', 'view'],
        'controller' => ['Index', 'Common'],
        'model'      => [],
        'view'       => [],
    ],

];
