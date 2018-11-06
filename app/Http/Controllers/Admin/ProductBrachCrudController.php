<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\ProductBrachRequest as StoreRequest;
use App\Http\Requests\ProductBrachRequest as UpdateRequest;

/**
 * Class ProductBrachCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class ProductBrachCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\ProductBrach');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/product-branch');
        $this->crud->setEntityNameStrings('productbrach', 'product braches');

        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */

        // TODO: remove setFromDb() and manually define Fields and Columns
        $this->crud->addColumn([
            'name'=>'name',
            'label'=>'Name',
        ]);
        $this->crud->addColumn([
            'name'=>'description',
            'label'=>'Description',
        ]);
        $this->crud->addColumn([
            'name'=>'note',
            'label'=>'Note',
        ]);

        $this->crud->addField([
            'name'=>'name',
            'label'=>'Name',
            'wrapperAttributes'=>[
                'class'=>'form-group col-md-4'
            ]

        ]);
        $this->crud->addField([
            'name'=>'description',
            'label'=>'Description',
            'wrapperAttributes'=>[
                'class'=>'form-group col-md-4'
            ]

        ]);
        $this->crud->addField([
            'name'=>'note',
            'label'=>'Note',
            'wrapperAttributes'=>[
                'class'=>'form-group col-md-4'
            ]

        ]);
        //$this->crud->setFromDb();

        // add asterisk for fields that are required in ProductBrachRequest
        $this->crud->setRequiredFields(StoreRequest::class, 'create');
        $this->crud->setRequiredFields(UpdateRequest::class, 'edit');
    }

    public function store(StoreRequest $request)
    {
        // your additional operations before save here
        $redirect_location = parent::storeCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }

    public function update(UpdateRequest $request)
    {
        // your additional operations before save here
        $redirect_location = parent::updateCrud($request);
        // your additional operations after save here
        // use $this->data['entry'] or $this->crud->entry
        return $redirect_location;
    }
}
