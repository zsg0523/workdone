<?php

/**
 * @Author: Eden
 * @Date:   2019-05-29 16:20:35
 * @Last Modified by:   Eden
 * @Last Modified time: 2019-06-04 10:55:57
 */
use App\Models\Company;

return [

	'title' => '公司资料',

	'single' => '公司资料',

	'model' => Company::class,

	'columns' => [
		'id' => [
			'title' => 'ID',
		],
		'name' => [
			'title' => '名称',
			'sortable' => false,
		],
		'address' => [
			'title' => '地址',
			'sortable' => false,
		],
		'scale' => [
			'title' => '规模',
			'sortable' => false,
		],
		'file' => [
			'title' => '资料/画册',
			// 默认情况直接输出数据，可是使用 output 选项来定制输出内容
			'output' => function($file, $model)
			{
				return empty($file) ? '空' : '<a target="_blank" href="'.$file.'"><img src="'.$file.'" width="40"></a>';
			},

			// 是否允许排序
			'sortable' => false,
		],
		'business' => [
			'title' => '主营业务',
			'sortable' => false,
		],
		'field' => [
			'title' => '专注领域',
			'sortable' => false,
		],
		'product' => [
			'title' => '成品或落地项目',
			'sortable' => false,
		],
		'push_product' => [
			'title' => '主推成品',
			'sortable' => false,
		],
		'technology' => [
			'title' => '技术亮点',
			'sortable' => false,
		],
		'corporation' => [
			'title' => '合作团队',
			'sortable' => false,
		],
		'intention' => [
			'title' => '意向/兴趣',
			'sortable' => false,
		],
		'develop' => [
			'title' => '合作机会',
			'sortable' => false,
		],
		'way' => [
			'title' => '认识途径',
			'sortable' => false,
		],
		'operation' => [
			'title' => '管理',
			'sortable' => false,
		],
	],

	'edit_fields' => [
		'name' => [
			'title' => '名称',
		],
		'address' => [
			'title' => '地址',
		],
		'scale' => [
			'title' => '规模',
		],
		'file' => [
			'title' => '资料/画册',
			'type' => 'image',
			'location' => public_path() . '/uploads/images/companies/',
		],
		'business' => [
			'title' => '主营业务',
		],
		'field' => [
			'title' => '专注领域',
		],
		'product' => [
			'title' => '成品/落地项目',
		],
		'push_product' => [
			'title' => '主推成品',
		],
		'technology' => [
			'title' => '技术亮点',
		],
		'corporation' => [
			'title' => '合作团队',
		],
		'intention' => [
			'title' => '意向/兴趣',
		],
		'develop' => [
			'title' => '合作机会',
		],
		'way' => [
			'title' => '认识途径',
		]
	],

	'filters' => [
		'id' => [
			'title' => 'ID'
		],
		'name' => [
			'title' => '名称'
		]
	],

	'rules' => [
		'name' => 'required',
	],

	'messages' => [
		'name.required' => '公司名称必填！'
	],

	








];