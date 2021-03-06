<?php

/**
 * @Author: Eden
 * @Date:   2019-06-04 12:25:41
 * @Last Modified by:   Eden
 * @Last Modified time: 2019-06-04 16:54:41
 */
use App\Models\CompanyFile;

return [

	'title' => '文档管理',

	'single' => '文档',

	'model' => CompanyFile::class,

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

		'image' => [
			'title' => '图片',
			// 默认情况直接输出数据，可是使用 output 选项来定制输出内容
			'output' => function($image, $model)
			{
				return empty($image) ? '空' : '<a target="_blank" href="'.$image.'"><img src="'.$image.'" width="40" height="40"></a>';
			},

			// 是否允许排序
			'sortable' => false,
		],

		'file' => [
			'title' => '文档',
			// 默认情况直接输出数据，可是使用 output 选项来定制输出内容
			'output' => function($file, $model)
			{
				return empty($file) ? '空' : '<a href="'.$file.'" target="_blank">文件</a>';
			},

			// 是否允许排序
			'sortable' => false,
		],

		'description' => [
			'title' => '备注',
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
			'autocomplete' => false,
			// 自动补全搜索字段
			'search_fields' => ["CONCAT(id,'', name)"],
			// 自动补全排序
			'options_sort_field' => 'id',
		],

		'image' => [
			'title' => '画册/资料',
			'type' => 'image',
			// 图片上传路径
			'location' => public_path() . '/uploads/images/files/',
		],

		'file' => [
			'title' => '画册/资料',
			'type' => 'file',
			// 图片上传路径
			'location' => public_path() . '/uploads/images/files/',
			'size_limit' => 20,
		],

		'description' => [
			'title' => '备注',
		],
	],

	'filters' => [
		'id' => [
			'title' => 'ID'
		],
		'company' => [
			'title' => '公司',
			'type' => 'relationship',
			'name_field' => 'name',
			'autocomplete' => false,
			'search_fields' => ["CONCAT(id,'', name)"],
			'options_sort_field' => 'id'
		],

		'description' => [
			'title' => '描述',
		]

	],

	'rules' => [
		'company_id' => 'required',
	],

	'messages' => [
        'company_id.required' => '请选择所属公司',
    ],

























];