<?php

namespace App\Admin\Controllers;

use App\Models\User;
use DB;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use Encore\Admin\Widgets\Box;

class UserController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '用户管理';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new User());

        $grid->column('id', __('Id'))->sortable();
        $grid->column('username', __('Username'));
        $grid->column('nickname', __('Nickname'));
        $grid->column('phone', __('Phone'))->display(function ($phone) {
            return "<a href='tel:$phone'>$phone</a>";
        });
        $grid->column('avatar', __('Avatar'))->lightbox(['with' => '50', 'height' => '50']);
        $grid->column('birthday', __('Birthday'));
        $grid->column('gender', __('Gender'))->using(['0' => '未设置', '1' => '男', '2' => '女', '3' => '未知']);
        $grid->column('email', __('Email'))->display(function ($email) {
            return "<a href='mailto:$email'>$email</a>";
        });
        $grid->column('wechat_open_id', __('Wechat open id'));
        $grid->column('wechat_union_id', __('Wechat union id'));
        $grid->column('status', __('Status'))->display(function ($status) {
            $status_arr = ['1' => '使用中', '2' => '已封禁'];
            switch ($status) {
                case '1':
                    $span = "<span class='label label-success'>{$status_arr[$status]}</span>";
                    break;
                case '2':
                    $span = "<span class='label label-danger'>{$status_arr[$status]}</span>";
                    break;
                default:
                    $span = '未匹配！！';
                    break;
            }
            return $span;
        });

        $grid->column('created_at', __('Created at'))->sortable();
        $grid->column('updated_at', __('Updated at'))->sortable();

        $grid->filter(function ($filter) {
            // 设置created_at字段的范围查询
//            $filter->between('created_at', __('Created at'))->datetime();
            // 范围过滤器，调用模型的`onlyTrashed`方法，查询出被软删除的数据。
            $filter->scope('trashed', '回收站')->onlyTrashed();
        });
        $grid->fixColumns(3, -2);

//        $grid->header(function ($query) {
//
//            $gender = $query->select(DB::raw('count(gender) as count, gender'))
//                ->groupBy('gender')->get()->pluck('count', 'gender')->toArray();
//
//            $doughnut = view('admin.chart.gender', compact('gender'));
//
//            return new Box('性别比例', $doughnut);
//        });

        $grid->model()->orderBy('created_at', 'desc');


        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(User::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('username', __('Username'));
        $show->field('nickname', __('Nickname'));
        $show->field('phone', __('Phone'));
        $show->field('avatar', __('Avatar'));
        $show->field('birthday', __('Birthday'));
        $show->field('gender', __('Gender'));
        $show->field('email', __('Email'));
        $show->field('email_verified_at', __('Email verified at'));
        $show->field('wechat_open_id', __('Wechat open id'));
        $show->field('wechat_union_id', __('Wechat union id'));
        $show->field('status', __('Status'));
        $show->field('password', __('Password'));
        $show->field('remember_token', __('Remember token'));
        $show->field('deleted_at', __('Deleted at'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new User());

        $form->text('username', __('Username'))->required();
        $form->text('nickname', __('Nickname'));
        $form->mobile('phone', __('Phone'));
        $form->image('avatar', __('Avatar'));
        $form->date('birthday', __('Birthday'))->default(date('Y-m-d'));
        $form->text('gender', __('Gender'));
        $form->email('email', __('Email'));
        $form->text('wechat_open_id', __('Wechat open id'))->disable();
        $form->text('wechat_union_id', __('Wechat union id'))->disable();
        $form->password('password', __('Password'));

        return $form;
    }
}
