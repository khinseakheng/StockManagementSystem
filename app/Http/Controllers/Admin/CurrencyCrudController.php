<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\CurrencyRequest as StoreRequest;
use App\Http\Requests\CurrencyRequest as UpdateRequest;

/**
 * Class CurrencyCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class CurrencyCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\Currency');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/currency');
        $this->crud->setEntityNameStrings('currency', 'currencies');

        /*
        |--------------------------------------------------------------------------
        | CrudPanel Configuration
        |--------------------------------------------------------------------------
        */

        // TODO: remove setFromDb() and manually define Fields and Columns
        $this->crud->addColumn([
            'name'=>'currency_code',
            'label'=>'Code',
        ]);
        $this->crud->addColumn([
            'name'=>'currency_name',
            'label'=>'Name',
        ]);
        $this->crud->addColumn([
            'name'=>'currency_symbol',
            'label'=>'Symbol',
        ]);

        $this->crud->addField([
            'name'=>'currency_code',
            'label'=>'Code',
            'wrapperAttributes'=>[
                'class'=>'form-group col-md-12'
            ]

        ]);
        $this->crud->addField([
            'name'=>'currency_name',
            'label'=>'Name',
            'wrapperAttributes'=>[
                'class'=>'form-group col-md-12'
            ]

        ]);
        $this->crud->addField([
            'name'=>'currency_symbol',
            'label'=>'Symbol',
            'wrapperAttributes'=>[
                'class'=>'form-group col-md-12'
            ]

        ]);


        $this->crud->setFromDb();

        // add asterisk for fields that are required in CurrencyRequest
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
