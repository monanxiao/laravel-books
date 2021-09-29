<?php

namespace App\Admin\Controllers;

use App\Models\Chapter;
use App\Models\Book;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ChapterController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '章节管理';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Chapter());

        // $grid->column('id', __('Id'));
        $grid->column('name', __('名称'));
        $grid->column('books.name', __('书籍'));
        $grid->column('serial_number', __('排序'))->editable();
        $grid->column('created_at', __('创建时间'));
        // $grid->column('updated_at', __('Updated at'));

        return $grid;
    }



    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Chapter());

        $data = Book::pluck('name','id');

        $serial_number = Chapter::max('serial_number');

        $form->select('book_id', __('书籍'))
                ->options($data)
                ->required()
                ->setWidth(2, 2);

        $form->text('name', __('名称'))
                ->required()
                ->setWidth(2, 2);

        $form->number('serial_number', __('排序'))
                ->default($serial_number+1)
                ->setWidth(2, 2);

        return $form;
    }
}
