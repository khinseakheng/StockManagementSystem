<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\ProductUnitRequest as StoreRequest;
use App\Http\Requests\ProductUnitRequest as UpdateRequest;

/**
 * Class ProductUnitCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class ProductUnitCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\ProductUnit');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/product-unit');
        $this->crud->setEntityNameStrings('productunit', 'product_units');

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
            'name'=>'operator',
            'label'=>'Operator',
        ]);
        $this->crud->addColumn([
            'name'=>'operator_value',
            'label'=>'Operator_Value',
        ]);
        $this->crud->addColumn([
            'name'=>'base_unit',
            'label'=>'Base_Unit',
            'type'=>'select',
            'entity'=>'parent',  //function
            'attribute'=>'name',
            'model'=>'App\\Models\\ProductUnit',
        ]);

        //add field
        $this->crud->addField([
            'name'=>'name',
            'label'=>'Name',
        ]);

        $this->crud->addField([
            'name'=>'operator',
            'label'=>'Operator',
            'type'=>'enum',

        ]);
        $this->crud->addField([
            'name'=>'operator_value',
            'label'=>'Operator_Value',
        ]);

        $this->crud->addField([
            'name'=>'base_unit',
            'label'=>'Base_Unit',
            'type'=>'number',
            'entity'=>'parent',//function
            'attribute'=>'name',
            'model'=>'App\\Models\\ProductUnit',
        ]);




        $this->crud->setFromDb();

        // add asterisk for fields that are required in ProductUnitRequest
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
