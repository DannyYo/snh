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
    'title' => '动态',

    // 右上角有 `New $single` 的创建新内容的文字
    'single' => '官方动态',

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
            'title' => '内容',
        // 这个参数定义了是否支持排序, 下同
            'sortable' => false,     
        ],
        'user_id' => [
            'title' => '作者',

            // 自定义字段, 读取对应关系里面的数据, 下同
            'relationship' => 'user',

            // 对应关系在这里显示的内容
            'select' => "(:table).name",
        ],
        'comments_count' => [
            'title' => '评论数',
                        // 自定义字段, 读取对应关系里面的数据, 下同
            'relationship' => 'comments',

            // 对应关系在这里显示的内容
            'select' => "count((:table).id)",
        ],
        'like' => [
            'title' => '赞'
        ],
        'keep' => [
            'title' => '收藏数'
        ],

        // 不指定 title 的话, 会使用字段作为 title
        'created_at' => [
            'title' => '创建时间'
        ],
    ],
    'form_width' => 600,
    // 单点击选择单条数据的时候, 右边会出现编辑小视图, 这里定义了视图里面的字段
    'edit_fields' => [

        // 对应字段
//        'content' => [
//
//            // 标题
//            'title' => 'content',
//
//            // 可编辑字段的类型
//            'type' => 'text'
//        ],
        'content' => [
            'type' => 'markdown',
            'title' => '内容',
        ],
        'user' => [

            // 标题
            'title' => '作者',
            'type' => 'relationship',
            'name_field' => 'name',
        ],
        'created_at' => array(
            'title' => '发布日期',
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
    'actions' => [
        //Ordering an item up
        'order_up' => array(
            'title' => '发布',
            'messages' => array(
                'active' => '发布中...',
                'success' => '发布完成',
                'error' => '发布完成',//'出了点问题~',
            ),
            'permission' => function($model)
                {
                    return $model->user_id == 1;
                },
            //the model is passed to the closure
            'action' => function($model)
                {
                    //get all the items of this model and reorder them
                    foreach(\App\User::all() as $user){
                        \App\Helper::set_msg($user->id,3);
                    }
                }
        ),
    ],
];