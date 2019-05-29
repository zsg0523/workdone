<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //获取faker实例
        $faker = app(Faker\Generator::class);

        // 头像假数据
        $avatars = [
            'https://iocaffcdn.phphub.org/uploads/images/201710/14/1/s5ehp11z6s.png?imageView2/1/w/200/h/200',
            'https://iocaffcdn.phphub.org/uploads/images/201710/14/1/Lhd1SHqu86.png?imageView2/1/w/200/h/200',
            'https://iocaffcdn.phphub.org/uploads/images/201710/14/1/LOnMrqbHJn.png?imageView2/1/w/200/h/200',
            'https://iocaffcdn.phphub.org/uploads/images/201710/14/1/xAuDMxteQy.png?imageView2/1/w/200/h/200',
            'https://iocaffcdn.phphub.org/uploads/images/201710/14/1/ZqM7iaP4CR.png?imageView2/1/w/200/h/200',
            'https://iocaffcdn.phphub.org/uploads/images/201710/14/1/NDnzMutoxX.png?imageView2/1/w/200/h/200',
        ];

        //生成数据集合
        $users = factory(User::class)
        				->times(10)
        				->make()
        				->each(function($user, $index)
        					use ($faker, $avatars)
        				{
        					//从头像数组中随机取出一个赋值
        					$user->avatar = $faker->randomElement($avatars);
        				});

        				//让隐藏的字段可见，并转换为数组	
        				$user_array = $users->makeVisible(['password','remember_token'])->toArray();

        				//插入数据库
        				User::insert($user_array);

        				//单独处理第一个用户的数据
        				$user = User::find(1);
        				$user->name = 'Eden';
                        $user->phone = '18902448086';
        				$user->email = 'shenggen93@163.com';
        				$user->avatar = 'https://iocaffcdn.phphub.org/uploads/images/201710/14/1/ZqM7iaP4CR.png?imageView2/1/w/200/h/200';
                        
        				$user->save();

                        // 初始化用户角色，将 1 号用户指派为『站长』
                        $user->assignRole('Founder');

                        // 将 2 号用户指派为『管理员』
                        $user = User::find(2);
                        $user->assignRole('Maintainer');
    }
}
