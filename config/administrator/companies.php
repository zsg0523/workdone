<?php

/**
 * @Author: Eden
 * @Date:   2019-05-29 16:20:35
 * @Last Modified by:   Eden
 * @Last Modified time: 2019-06-04 17:27:20
 */
use App\Models\Company;

return [

	'title' => '公司信息',

	'single' => '公司信息',

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

		'user' => [
			'title' => '创建人',

			'sortable' => false,

			'output' => function ($value, $model) {
				return $model->user->name;
			}
		],

		// 'scale' => [
		// 	'title' => '规模',
		// 	'sortable' => false,
		// ],
		// 'file' => [
		// 	'title' => '资料/画册',
		// 	// 默认情况直接输出数据，可是使用 output 选项来定制输出内容
		// 	'output' => function($file, $model)
		// 	{
		// 		return empty($file) ? '空' : '<a target="_blank" href="'.$file.'"><img src="'.$file.'" width="40"></a>';
		// 	},

		// 	// 是否允许排序
		// 	'sortable' => false,
		// ],
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
			'title' => '意向/合作机会',
			'sortable' => false,
		],
		// 'develop' => [
		// 	'title' => '合作机会',
		// 	'sortable' => false,
		// ],
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

		'user' => [
			'title'        => '创建人',
			'type'         => 'relationship',
			'name_field'   => 'name',
			// 自动补全
			'autocomplete' => false,
			// 自动补全搜索字段
			'search_fields' => ["CONCAT(id,'', name)"],
			// 自动补全排序
			'options_sort_field' => 'id',
		],

		'address' => [
			'title' => '地址',
		],
		// 'scale' => [
		// 	'title' => '规模',
		// ],
		// 'file' => [
		// 	'title' => '资料/画册',
		// 	'type' => 'image',
		// 	'location' => public_path() . '/uploads/images/companies/',
		// ],
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
			'title' => '意向/合作机会',
		],
		// 'develop' => [
		// 	'title' => '合作机会',
		// ],
		'way' => [
			'title' => '认识途径',
		]
	],

	'filters' => [
		'id' => [
			'title' => 'ID'
		],

		'user' => [
			'title' => '创建人',
			'type' => 'relationship',
			'name_field' => 'name',
			'autocomplete' => false,
			'search_fields' => ["CONCAT(id,'', name)"],
			'options_sort_field' => 'id'
		],

		'name' => [
			'title' => '名称'
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
		// 'corporation' => [
		// 	'title' => '合作团队',
		// ],
		'intention' => [
			'title' => '意向/合作机会',
		],
	],

	'rules' => [
		'name' => 'required',
	],

	'messages' => [
		'name.required' => '公司名称必填！'
	],

	








];