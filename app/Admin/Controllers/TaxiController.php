<?php

namespace App\Admin\Controllers;

use App\Models\Taxi;
use App\Models\Location;
use App\Models\User;
use App\Http\Controllers\Controller;
use Encore\Admin\Controllers\HasResourceActions;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class TaxiController extends Controller
{
    use HasResourceActions;

    /**
     * Index interface.
     *
     * @param Content $content
     * @return Content
     */
    public function index(Content $content)
    {
        return $content
            ->header('Taxis solicitados')
            ->description(' ')
            ->body($this->grid());
    }

    /**
     * Show interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function show($id, Content $content)
    {
        return $content
            ->header('Detail')
            ->description('description')
            ->body($this->detail($id));
    }

    /**
     * Edit interface.
     *
     * @param mixed $id
     * @param Content $content
     * @return Content
     */
    public function edit($id, Content $content)
    {
        return $content
            ->header('Edit')
            ->description('description')
            ->body($this->form()->edit($id));
    }

    /**
     * Create interface.
     *
     * @param Content $content
     * @return Content
     */
    public function create(Content $content)
    {
        return $content
            ->header('Create')
            ->description('description')
            ->body($this->form());
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Taxi);

        $grid->id('ID');
        $grid->capacity('Capacidad');
        $grid->departure('Hora de salida');
        $grid->arrival('Hora de llegada');
        $grid->origin_id('Origen')->display(function($origin_id) {
        return Location::find($origin_id)->name;
        });
        $grid->destination_id('Destino')->display(function($destination_id) {
        return Location::find($destination_id)->name;
        });
        $grid->user_id('Solicitado por')->display(function($user_id) {
        return User::find($user_id)->name;
        });
        $grid->created_at('Created at');
        #$grid->updated_at('Updated at');

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
        $show = new Show(Taxi::findOrFail($id));
        $show->id('ID');
        $show->capacity('Capacidad');
        $show->departure('Hora de salida');
        $show->arrival('Hora de llegada');
        $show->origin_id('Origen')->as(function($origin_id) {
        return Location::find($origin_id)->name;
        });
        $show->destination_id('Destino')->as(function($destination_id) {
        return Location::find($destination_id)->name;
        });
        $show->user_id('Solicitado por')->as(function($user_id) {
        return User::find($user_id)->name;
        });
        $show->created_at('Created at');
        $show->updated_at('Updated at');
    

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Taxi);

        
        $form->select('origin_id','Origen')->options(Location::pluck('name','id'));
        $form->select('destination_id','Destino')->options(Location::pluck('name','id'));
        $form->datetime('departure','Hora de Salida');
        $form->datetime('arrival','Hora de llegada');        
        $form->select('user_id','Solicitado por')->options(User::pluck('name','id'));
        


        return $form;
    }
}
