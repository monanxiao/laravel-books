<?php

namespace App\Admin\Controllers;

use App\Models\Article;
use App\Models\Chapter;
use App\Models\Book;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ArticleController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '文章管理';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Article());

        // $grid->column('id', __('Id'));
        $grid->column('books', __('书籍'))->display(function($model){

            
            return Book::find($this->chapter['book_id'])->name;
        });
        $grid->column('chapter.name', __('章节'));

        $grid->column('title', __('名称'));
        // $grid->column('content', __('内容'));
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
        $form = new Form(new Article());

        
        $data = Chapter::pluck('name','id');

        $serial_number = Article::max('serial_number');

        $form->select('chapter_id', __('章节'))
                ->options($data)
                ->required()
                ->setWidth(2, 2);

        $form->text('title', __('章节名称'))
                ->required()
                ->setWidth(2, 2);

        $form->number('serial_number', __('排序'))
                ->default($serial_number+1)
                ->setWidth(2, 2);
                
        $form->editormd('content', __('内容'))->default('> 更新中');

        

        return $form;
    }
}
