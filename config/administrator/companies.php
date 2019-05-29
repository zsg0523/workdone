<?php

/**
 * @Author: Eden
 * @Date:   2019-05-29 16:20:35
 * @Last Modified by:   Eden
 * @Last Modified time: 2019-05-29 18:22:17
 */
use App\Models\Company;

return [

	'title' => '客户资料',

	'single' => '客户资料',

	'model' => Company::class,

	'columns' => [
		'id' => [
			'title' => 'ID',
		],
		'name' => [
			'title' => '公司名称',
			'sortable' => false,
		],
		'address' => [
			'title' => '公司地址',
			'sortable' => false,
		],
		'scale' => [
			'title' => '公司规模',
			'sortable' => false,
		],
		'file' => [
			'title' => '公司资料/画册',
			// 默认情况直接输出数据，可是使用 output 选项来定制输出内容
			'output' => function($file, $model)
			{
				return empty($file) ? 'N/A' : '<a target="_blank" href="'.$file.'"><img src="'.$file.'" width="40"></a>';
			},

			// 是否允许排序
			'sortable' => false,
		],
		'business' => [
			'title' => '公司主营业务',
			'sortable' => false,
		],
		'field' => [
			'title' => '公司专注领域',
			'sortable' => false,
		],
		'product' => [
			'title' => '成品或落地项目',
			'sortable' => false,
		],
		'push_product' => [
			'title' => '公司主推成品',
			'sortable' => false,
		],
		'technology' => [
			'title' => '技术亮点',
			'sortable' => false,
		],
		'corporation' => [
			'title' => '有无合作团队',
			'sortable' => false,
		],
		'intention' => [
			'title' => '意向/对什么感兴趣',
			'sortable' => false,
		],
		'develop' => [
			'title' => '有无机会合作',
			'sortable' => false,
		],
		'way' => [
			'title' => '认识途径',
			'sortable' => false,
		],
		'schedule' => [
			'title' => '进度',
			'sortable' => false,
		],
		'user' => [
			'title' => '对接人',
			'sortable' => false,
		],
		'title' => [
			'title' => '职位',
			'sortable' => false,
		],
		'phone' => [
			'title' => '手机号',
			'sortable' => false,
		],
		'wechat' => [
			'title' => '微信号',
			'sortable' => false,
		],
		'operation' => [
			'title' => '管理',
			'sortable' => false,
		],
	],

	'edit_fields' => [
		'name' => [
			'title' => '公司名称',
		],
		'address' => [
			'title' => '公司地址',
		],
		'scale' => [
			'title' => '公司规模',
		],
		'file' => [
			'title' => '公司资料/画册',
			'type' => 'image',
			'location' => public_path() . '/uploads/images/companies/',
		],
		'business' => [
			'title' => '公司主营业务',
		],
		'field' => [
			'title' => '公司专注领域',
		],
		'product' => [
			'title' => '成品或落地项目',
		],
		'push_product' => [
			'title' => '公司主推成品',
		],
		'technology' => [
			'title' => '技术亮点',
		],
		'corporation' => [
			'title' => '有无合作团队',
		],
		'intention' => [
			'title' => '意向/对什么感兴趣',
		],
		'develop' => [
			'title' => '有无机会合作',
		],
		'way' => [
			'title' => '认识途径',
		],
		'schedule' => [
			'title' => '进度',
		],
		'user' => [
			'title' => '对接人',
		],
		'title' => [
			'title' => '职位',
		],
		'phone' => [
			'title' => '手机号',
		],
		'wechat' => [
			'title' => '微信号',
		]
	],

	'filters' => [
		'id' => [
			'title' => 'ID'
		],
		'name' => [
			'title' => '公司名称'
		]
	],

	'rules' => [
		'name' => 'required',
		'address' => 'required',
	],

	








];