<?php

namespace App\Admin\Controllers;

use App\Models\User;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

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

        $grid->column('id', __('Id'));
        $grid->column('username', __('Username'));
        $grid->column('nickname', __('Nickname'));
        $grid->column('phone', __('Phone'));
        $grid->column('avatar', __('Avatar'));
        $grid->column('birthday', __('Birthday'));
        $grid->column('gender', __('Gender'));
        $grid->column('email', __('Email'));
        $grid->column('wechat_open_id', __('Wechat open id'));
        $grid->column('wechat_union_id', __('Wechat union id'));
        $grid->column('status', __('Status'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

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
