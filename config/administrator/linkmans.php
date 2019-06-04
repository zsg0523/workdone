<?php

/**
 * @Author: Eden
 * @Date:   2019-05-30 12:00:23
 * @Last Modified by:   Eden
 * @Last Modified time: 2019-06-04 10:58:06
 */
use App\Models\Linkman;

return [

	'title' => '联系人',

	'single' => '联系人',

	'model' => Linkman::class,

	'columns' => [

		'id' => [
			'title' => 'ID',
		],

		'company' => [
			'title' => '公司',

			'sortable' => false,

			'output' => function ($value, $model) {
				return $model->company->name;
			}
		],

		'name' => [
			'title' => '姓名',
			'sortable' => false,
		],
		'title' => [
			'title' => '职位',
			'sortable' => false,
		],
		'card' => [
			'title' => '名片',
			// 默认情况直接输出数据，可是使用 output 选项来定制输出内容
			'output' => function($card, $model)
			{
				return empty($card) ? '空' : '<a href="'.$card.'" target="_blank"><img src="'.$card.'" width="40"></a>';
			},

			// 是否允许排序
			'sortable' => false,
		],
		'phone' => [
			'title' => '电话',
			'sortable' => false,
		],
		'email' => [
			'title' => '邮箱',
			'sortable' => false,
		],
		'wechat' => [
			'title' => '微信',
			'sortable' => false,
		],

		'operation' => [
			'title' => '管理',
			'sortable' => false,
		],
	],

	'edit_fields' => [

		'company' => [
			'title'        => '公司',
			'type'         => 'relationship',
			'name_field'   => 'name',
			// 自动补全
			'autocomplete' => true,
			// 自动补全搜索字段
			'search_fields' => ["CONCAT(id,'', name)"],
			// 自动补全排序
			'options_sort_field' => 'id',
		],

		'name' => [
			'title' => '姓名',
		],

		'title' => [
			'title' => '职位',
		],

		'card' => [
			'title' => '名片',
			'type' => 'image',
			// 图片上传路径
			'location' => public_path() . '/uploads/images/cards/'
		],

		'phone' => [
			'title' => '电话',
		],

		'email' => [
			'title' => '邮箱',
		],

		'wechat' => [
			'title' => '微信',
		]
	],

	'filters' => [
		'id' => [
			'title' => 'ID'
		],
		'company' => [
			'title' => '公司',
			'type' => 'relationship',
			'name_field' => 'name',
			'autocomplete' => true,
			'search_fields' => ["CONCAT(id,'', name)"],
			'options_sort_field' => 'id'
		],

		'name' => [
			'title' => '姓名',
		],

		'title' => [
			'title' => '职位',
		],

		'phone' => [
			'title' => '电话'
		],

		'email' => [
			'title' => '邮箱',
		],

		'wechat' => [
			'title' => '微信',
		]
	],

	'rules' => [
		'company_id' => 'required',
	],

	'messages' => [
        'company_id.required' => '请选择所属公司',
    ],

























];