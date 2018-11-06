<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\ProductInventoryRequest as StoreRequest;
use App\Http\Requests\ProductInventoryRequest as UpdateRequest;

/**
 * Class ProductInventoryCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class ProductInventoryCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\ProductInventory');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/product-inventory');
        $this->crud->setEntityNameStrings('productinventory', 'product inventories');

        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */

        // TODO: remove setFromDb() and manually define Fields and Columns
        $this->crud->addColumn([
            'name'=>'name',
            'label'=>'name'
        ]);
        $this->crud->addColumn([
            'name'=>'SKU',
            'label'=>'SKU'
        ]);
        $this->crud->addColumn([
            'name'=>'UPC',
            'label'=>'UPC'
        ]);
        $this->crud->addColumn([
            'name'=>'code_symbol',
            'label'=>'Code_Symbol',
            'type'=>'enum'
        ]);

        $this->crud->addColumn([
            'name'=>'status',
            'label'=>'Status',
            'type'=>'enum'
        ]);

        $this->crud->addColumn([
            'name'=>'initail_qty_on_hand',
            'label'=>'initail_qty_on_hand',
        ]);
        $this->crud->addColumn([
            'name'=>'recorder_point',
            'label'=>'recorder_point',
        ]);

        $this->crud->addColumn([
            'name'=>'as_of_date',
            'label'=>'as_of_date',
        ]);



    

        $this->crud->addField([
            'name'=>'name',
            'label'=>'name',
            'wrapperAttributes'=>[
                'class'=>'form-group col-md-4'
            ]
        

        ]);
        $this->crud->addField([
            'label' => "category", // Table column heading
            'type' => "select2_from_ajax",
            'name' => 'category_id', // the column that contains the ID of that connected entity
            'entity' => 'category', // the method that defines the relationship in your Model
            'attribute' => "name", // foreign key attribute that is shown to user
            'model' => "App\Models\ProductCategory", // foreign key model
            'data_source' => url("api/Category"), // url to controller search function (with /{id} should return model)
            'placeholder' => "Select a category", // placeholder for the select
            'minimum_input_length' =>0, // minimum characters to type before querying result
            'wrapperAttributes'=>[
                'class'=>'form-group col-md-4'
            ]
        ]);
        $this->crud->addField([
            'name'=>'SKU',
            'label'=>'SKU',
            'wrapperAttributes'=>[
                'class'=>'form-group col-md-4'
            ]

        ]);
        $this->crud->addField([
            'name'=>'UPC',
            'label'=>'UPC',
            
            'wrapperAttributes'=>[
                'class'=>'form-group col-md-4'
            ]

        ]);
        $this->crud->addField([
            'name'=>'code_symbol',
            'label'=>'Code_Symbol',
            'type'=>'enum',
            'wrapperAttributes'=>[
                'class'=>'form-group col-md-4'
            ]

        ]);
        $this->crud->addField([
            'name'=>'status',
            'label'=>'Status',
            'type'=>'enum',
            'wrapperAttributes'=>[
                'class'=>'form-group col-md-4'
            ]

        ]);
        $this->crud->addField([
            'name'=>'initail_qty_on_hand',
            'label'=>'initail_qty_on_hand',
            'wrapperAttributes'=>[
                'class'=>'form-group col-md-4'
            ]

        ]);
       
        $this->crud->addField([
            'name'=>'recorder_point',
            'label'=>'recorder_point',
            'wrapperAttributes'=>[
                'class'=>'form-group col-md-4'
            ]

        ]);
        $this->crud->addField([
            'name'=>'as_of_date',
            'label'=>'as_of_date',
            'type'=>'date',
            'wrapperAttributes'=>[
                'class'=>'form-group col-md-4'
            ]
        ]);
        


        $this->crud->setFromDb();

        // add asterisk for fields that are required in ProductInventoryRequest
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
