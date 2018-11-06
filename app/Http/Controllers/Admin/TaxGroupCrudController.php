<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\TaxGroupRequest as StoreRequest;
use App\Http\Requests\TaxGroupRequest as UpdateRequest;

/**
 * Class TaxGroupCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class TaxGroupCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\TaxGroup');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/tax-group');
        $this->crud->setEntityNameStrings('taxgroup', 'tax groups');

        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */

        // TODO: remove setFromDb() and manually define Fields and Columns

        $this->crud->addColumn([
            'name'=>'code',
            'label'=>'Code',
        ]);
        $this->crud->addColumn([
            'name'=>'tax_name',
            'label'=>'Name',
        ]);
        $this->crud->addColumn([
            'name'=>'tax',
            'label'=>'Tax',
        ]);
        $this->crud->addColumn([
            'name'=>'Type',
            'label'=>'Type',
            'type'=>'enum'
        ]);

        $this->crud->addField([
            'name'=>'code',
            'label'=>'Code',
            'wrapperAttributes'=>[
                'class'=>'form-group col-md-12'
            ]

        ]);
        $this->crud->addField([
            'name'=>'tax_name',
            'label'=>'Name',
            'wrapperAttributes'=>[
                'class'=>'form-group col-md-4'
            ]

        ]);
        $this->crud->addField([
            'name'=>'tax',
            'label'=>'Tax',
            'wrapperAttributes'=>[
                'class'=>'form-group col-md-4'
            ]

        ]);
        $this->crud->addField([
            'name'=>'Type',
            'label'=>'Type',
            'type'=>'enum',
            'wrapperAttributes'=>[
                'class'=>'form-group col-md-4'
            ]

        ]);



        $this->crud->setFromDb();

        // add asterisk for fields that are required in TaxGroupRequest
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
