<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\ProductCategoryRequest as StoreRequest;
use App\Http\Requests\ProductCategoryRequest as UpdateRequest;

/**
 * Class ProductCategoryCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class ProductCategoryCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\ProductCategory');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/product-category');
        $this->crud->setEntityNameStrings('productcategory', 'product_categories');

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
            'name'=>'slug',
            'label'=>'Slug',
        ]);
        $this->crud->addColumn([
            'name'=>'parent_id',
            'label'=>'Parent',
            'type'=>'select',
            'entity'=>'parent',  //function
            'attribute'=>'name',
            'model'=>'App\\Models\\ProductCategory',
        ]);

        //add field
        $this->crud->addField([
            'name'=>'name',
            'label'=>'Name',
        ]);

        $this->crud->addField([
            'name'=>'slug',
            'label'=>'Slug',
        ]);

        $this->crud->addField([
            'name'=>'parent_id',
            'label'=>'Parent',
            'type'=>'select',
            'entity'=>'parent',//function
            'attribute'=>'name',
            'model'=>'App\\Models\\ProductCategory',
        ]);




        $this->crud->setFromDb();

        // add asterisk for fields that are required in ProductCategoryRequest
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
