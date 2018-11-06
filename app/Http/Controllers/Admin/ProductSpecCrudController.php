<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\ProductSpecRequest as StoreRequest;
use App\Http\Requests\ProductSpecRequest as UpdateRequest;

/**
 * Class ProductSpecCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class ProductSpecCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\ProductSpec');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/product-spec');
        $this->crud->setEntityNameStrings('product-spec', 'product speces');

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
            'name'=>'price',
            'label'=>'Price',
            'type'=>'enum',
        ]);
        $this->crud->addColumn([
            'name'=>'cost',
            'label'=>'Cost',
            'type'=>'enum',
        ]);
        $this->crud->addColumn([
            'name'=>'status',
            'label'=>'Status',
            'type'=>'enum',
        ]);
        $this->crud->addColumn([
            'name'=>'image',
            'label'=>'Image',
            'type'=>'enum',
        ]);

        $this->crud->addColumn([
            'label'=>'Category',
            'type'=>'select',
            'name'=>'categories',//categories ជាឈ្មោះfuntionដែលមានក្នុង Modelsរបស់spec ខុសពីុធម្មតា
            'entity'=>'categories',
            'attribute'=>'name',//name is category name from product_categories
            'model'=>'App\Models\ProductSpec'

        ]);

        $this->crud->addField([
            'name'=>'name',
            'label'=>'Name',
            'wrapperAttributes'=>[
                'class'=>'form-group col-md-4'
            ]
        ]);
        $this->crud->addField([
            'name'=>'price',
            'label'=>'Price',
            'type'=>'enum',
            'wrapperAttributes'=>[
                'class'=>'form-group col-md-4'
            ]
        ]);
        $this->crud->addField([
            'name'=>'cost',
            'label'=>'Cost',
            'type'=>'enum',
            'wrapperAttributes'=>[
                'class'=>'form-group col-md-4'
            ]
        ]);
        $this->crud->addField([
            'name'=>'image',
            'label'=>'Image',
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
            'label'=>'Category',
            'type'=>'select2_multiple',
            'name'=>'categories',//categories ជាឈ្មោះfuntionដែលមានក្នុង Modelsរបស់spec ខុសពីុធម្មតា
            'entity'=>'categories',
            'attribute'=>'name',
            'model'=>'App\Models\ProductCategory',//ខុសពី addColumn ។ វាជាModelរបស់tabel មួយទៀតដែលមានទំនាក់ទំនងជាមួយវា
            'placeholder'=>"",
            'minimum_input_length'=>0,
            'pivot'=> true,
            'wrapperAttributes'=>[
                'class'=>'form-group col-md-4'
            ]
        ]);




        $this->crud->setFromDb();

        // add asterisk for fields that are required in ProductSpecRequest
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
