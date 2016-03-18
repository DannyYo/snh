<?php

return [
    'permission'=> function()
    {
        return Auth::user()->id == 1;
    },
    'action_permissions'=> array(
        'delete' => function($model)
        {
            return Auth::user()->id == 1;
        }
    ),
    // 菜单里面显示的名字
    'title' => '用户',

    // 右上角有 `New $single` 的创建新内容的文字
    'single' => '用户',

    // 依赖于 Eloquent ORM 作数据读取和处理
    'model' => 'App\User',

    // 显示页面
    'columns' => [

        // 当前列在数据库中的字段名称, 下同
        'id' => [
            // 这个参数定义当前列的名称, 下同
            'title' => 'ID'
        ],
        'name' => [
            'title' => '用户名',
//        // 这个参数定义了是否支持排序, 下同
//            'sortable' => false,
        ],

        'email' => [
            'title' => '邮箱',
        ],
        'lock' => [
            'title' => '是否锁定'
        ],

        // 不指定 title 的话, 会使用字段作为 title
        'created_at' => [
            'title' => '创建时间'
        ],
    ],
    'form_width' => 600,
    // 单点击选择单条数据的时候, 右边会出现编辑小视图, 这里定义了视图里面的字段
    'edit_fields' => [
        'name' => [
            'type' => 'text',
            'title' => '用户名',
        ],
        'email' => [
            'title' =>'邮箱',
            'type' => 'text'
        ],
        'id' => [
            // 这个参数定义当前列的名称, 下同
            'title' => 'ID',
            'type' => 'text'
        ],
        'lock' => [
            'title' => '锁定/解锁',
            'type' => 'text'
        ],
    ],

    // 过滤, 搜索
    'filters' => [
        'name' => [
            'title' => '用户',

        ],
        'email' => [
        'title' => '邮箱',
        ],
    ],

    // 点击选择某条数据时候, 右上角的链接
    'link' => function($model)
    {
        return url('profile/'.$model->id);
    },
];