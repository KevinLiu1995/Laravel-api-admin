
php >= 7.2.* Laravel 6.* Laravel-admin 1.8.1

安装步骤
-
~~~
- cp .env.example .env (生成 .env 文件，并配置环境变量与数据库相关信息)
- composer install
- php artisan key:generate
- php artisan jwt:secret
- php artisan migrate --seed
~~~

常用命令行
-
- model 类
~~~
生成 model 类 -fm 代表一并生成迁移文件与 factory 文件
php artisan make:model Models/User -fm
~~~

- controller 类
~~~
生成 controller 类 并关联相关 model 类，自动依赖注入,--api 只生成默认 5 个方法
php artisan make:controller UserController -m Models/User --api
~~~

- request 类
~~~
生成 request 表单验证
php artisan make:request UserRequest
~~~

- seeder 类
~~~
生成 seeder 类
php artisan make:seeder UserSeeder
~~~

- 数据库迁移
~~~
新建数据表
php artisan make:migration create_xxx_table --create=xxx

向已存在的表中添加字段
php artisan make:migration add_columns_to_xxx_table --table=xxx

执行迁移文件
php artisan migrate

回滚迁移文件
php artisan migrate:rollback

重新执行迁移文件和seed类
php artisan migrate:refresh --seed
~~~
拓展工具
-
- 逆向数据填充
[iseed](https://github.com/orangehill/iseed)
~~~ 
单张表/多张表
php artisan iseed my_table
php artisan iseed my_table,another_table

指定类名前缀，防止与原seeder文件冲突：
php artisan iseed my_table --classnameprefix=Customized
~~~

-状态码
~~~
400-参数、其他错误，在 msg中体现
~~~
