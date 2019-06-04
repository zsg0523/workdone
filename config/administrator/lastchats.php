<?php

/**
 * @Author: Eden
 * @Date:   2019-05-30 12:31:22
 * @Last Modified by:   Eden
 * @Last Modified time: 2019-06-04 11:00:12
 */
use App\Models\LastChat;

return [

	'title' => '沟通记录',

	'single' => '沟通记录',

	'model' => LastChat::class,

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

		'conversation' => [
			'title' => '记录',
			'sortable' => false,
		],
		'image' => [
			'title' => '截图',
			// 默认情况直接输出数据，可是使用 output 选项来定制输出内容
			'output' => function($image, $model)
			{
				return empty($image) ? '空' : '<a target="_blank" href="'.$image.'"><img src="'.$image.'" width="40"></a>';
			},

			// 是否允许排序
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

		'conversation' => [
			'title' => '记录',
			'type' => 'textarea'
		],

		'image' => [
			'title' => '截图',
			'type' => 'image',
			// 图片上传路径
			'location' => public_path() . '/uploads/images/conversations/'
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
		]
	],

	'rules' => [
		'company_id' => 'required',
	],

	'messages' => [
        'company_id.required' => '请选择所属公司',
    ],

























];