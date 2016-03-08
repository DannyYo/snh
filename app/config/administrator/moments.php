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
    'title' => 'Moment',

    // 右上角有 `New $single` 的创建新内容的文字
    'single' => 'Moment',

    // 依赖于 Eloquent ORM 作数据读取和处理
    'model' => 'App\Moment',

    // 显示页面
    'columns' => [

        // 当前列在数据库中的字段名称, 下同
        'id' => [
            // 这个参数定义当前列的名称, 下同
            'title' => 'ID'
        ],
        'content' => [
            'title' => 'Content',
        // 这个参数定义了是否支持排序, 下同
            'sortable' => false,     
        ],
        'user_id' => [
            'title' => 'Author',

            // 自定义字段, 读取对应关系里面的数据, 下同
            'relationship' => 'user',

            // 对应关系在这里显示的内容
            'select' => "(:table).name",
        ],
        'comments_count' => [
            'title' => 'Comments Count',
                        // 自定义字段, 读取对应关系里面的数据, 下同
            'relationship' => 'comments',

            // 对应关系在这里显示的内容
            'select' => "count((:table).id)",
        ],
        'like' => [
            'title' => 'likes Count'
        ],
        'keep' => [
            'title' => 'keeps Count'
        ],

        // 不指定 title 的话, 会使用字段作为 title
        'created_at',
    ],

    // 单点击选择单条数据的时候, 右边会出现编辑小视图, 这里定义了视图里面的字段
    'edit_fields' => [

        // 对应字段
        'content' => [

            // 标题
            'title' => 'content',

            // 可编辑字段的类型
            'type' => 'text'
        ],
        'user' => [

            // 标题
            'title' => 'Author',
            'type' => 'relationship',
            'name_field' => 'name',
        ],
        'created_at' => array(
            'title' => 'Release Date',
            'type' => 'date',
            'date_format' => 'yy-mm-dd',
        ),
    ],

    // 过滤, 搜索
    'filters' => [
        'user' => [
            'title' => 'Author',
            'type' => 'relationship',
            'name_field' => 'name',
        ]
    ],

    // 点击选择某条数据时候, 右上角的链接
    'link' => function($model)
    {
        return url('moment/'.$model->id);
    },
];