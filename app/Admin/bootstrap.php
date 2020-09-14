<?php

/**
 * Laravel-admin - admin builder based on Laravel.
 * @author z-song <https://github.com/z-song>
 *
 * Bootstraper for Admin.
 *
 * Here you can remove builtin form field:
 * Encore\Admin\Form::forget(['map', 'editor']);
 *
 * Or extend custom form field:
 * Encore\Admin\Form::extend('php', PHPEditor::class);
 *
 * Or require js and css assets:
 * Admin::css('/packages/prettydocs/css/styles.css');
 * Admin::js('/packages/prettydocs/js/main.js');
 *
 */

use Encore\Admin\Form;
use Encore\Admin\Grid;

Form::forget(['map', 'editor']);
// 重写页面
app('view')->prependNamespace('admin',resource_path('views/admin'));


Grid::init(function (\Encore\Admin\Grid $grid) {
//    // 全局去掉表格导出按钮
//    $grid->disableExport();
    $grid->filter(function ($filter) {
        // 设置created_at字段的范围查询
        $filter->between('created_at', __('Created at'))->datetime();
    });
});

Form::init(function (Form $form) {
//    $form->tools(function (Form\Tools $tools) {
//        // 去掉`列表`按钮
//        $tools->disableList();
//        // 去掉`删除`按钮
//        $tools->disableDelete();
//        // 去掉`查看`按钮
//        $tools->disableView();
//    });
//    $form->footer(function ($footer) {
//        // 去掉`查看`checkbox
//        $footer->disableViewCheck();
//        // 去掉`继续编辑`checkbox
//        $footer->disableEditingCheck();
//        // 去掉`继续创建`checkbox
//        $footer->disableCreatingCheck();
//    });
});
