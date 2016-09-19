<?php

//-------- For enums in Seeders --------
return [
    'roles'        => [
        'admin'  => '管理员',
        'person' => '用户',
    ],

    'permissions'  => [
        'manager_goods'  => '管理商品',
        'manager_orders' => '管理订单',
        'manager_users'  => '管理用户',
    ],

    'verification' => [
        'yes' => 'yes',
        'no'  => 'no',
    ],

    'status'       => [
        'normal' => '正常',
        'lock'   => '异常',
        'stop'   => '停用',
    ],
];
