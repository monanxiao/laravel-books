<?php

namespace App\Admin\Controllers;

use App\Models\Book;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class BookController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '书籍管理';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Book());

        // $grid->column('id', __('ID'));
        $grid->column('name', __('名称'));
        // $grid->column('presentation', __('介绍'));
        $grid->column('cover_src', __('封面'))->image(env('IMG_URL'),50,50);
        $grid->column('created_at', __('创建时间'));

        return $grid;
    }


    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Book());

        $form->text('name', __('名称'))->setWidth(2, 2);
        $form->textarea('presentation', __('介绍'))->setWidth(3, 2)->rows(10);
        $form->image('cover_src', __('封面'))->setWidth(3, 2);

            // 直接添加一对多的关联模型
            $form->hasMany('chapter', '章节列表', function (Form\NestedForm $form) {
                $form->text('name', __('名称'))
                    ->required()
                    ->setWidth(2, 2);
            $form->number('serial_number', __('排序'))
                    ->default(1)
                    ->setWidth(2, 2);
        });

        return $form;
    }
}
