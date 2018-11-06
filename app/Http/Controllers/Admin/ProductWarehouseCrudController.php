<?php

namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;

// VALIDATION: change the requests to match your own file names if you need form validation
use App\Http\Requests\ProductWarehouseRequest as StoreRequest;
use App\Http\Requests\ProductWarehouseRequest as UpdateRequest;

/**
 * Class ProductWarehouseCrudController
 * @package App\Http\Controllers\Admin
 * @property-read CrudPanel $crud
 */
class ProductWarehouseCrudController extends CrudController
{
    public function setup()
    {
        /*
        |--------------------------------------------------------------------------
        | CrudPanel Basic Information
        |--------------------------------------------------------------------------
        */
        $this->crud->setModel('App\Models\ProductWarehouse');
        $this->crud->setRoute(config('backpack.base.route_prefix') . '/product-warehouse');
        $this->crud->setEntityNameStrings('productwarehouse', 'product warehouses');
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
            'name'=>'phone',
            'label'=>'Phone',
           
        ]);
        $this->crud->addColumn([
            'name'=>'address',
            'label'=>'Address',
            
        ]);
        $this->crud->addColumn([
            'name'=>'email',
            'label'=>'Email',
           
        ]);
       

        $this->crud->addColumn([
            'label'=>'Category',
            'type'=>'select',
           'name'=>'categories',//categories ជាឈ្មោះfuntionដែលមានក្នុង Modelsរបស់warehouse ខុសពីុធម្មតា
           'entity'=>'categories',
           'attribute'=>'name',//name is category name from product_categories
           'model'=>'App\Models\ProductWarehouse'

       ]);
       $this->crud->addColumn([
        'name'=>'image',
        'label'=>'Image',
        'type' => 'image',
        
    ]);

        $this->crud->addField([
            'name'=>'name',
            'label'=>'Name',
            'wrapperAttributes'=>[
                'class'=>'form-group col-md-4'
            ]
        ]);
        $this->crud->addField([
            'name'=>'phone',
            'label'=>'Phone',
            'wrapperAttributes'=>[
                'class'=>'form-group col-md-4'
            ]
           
        ]);
        $this->crud->addField([
            'name'=>'address',
            'label'=>'Address',
            'type'=>'address',
            'wrapperAttributes'=>[
                'class'=>'form-group col-md-4'
            ]
            
        ]);
        $this->crud->addField([
            'name'=>'email',
            'label'=>'Email',
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
        $this->crud->addField([
            'name'=>'image',
            'label'=>'Image',
            'type' => 'image',
           
            
            'upload' => true,
            'crop' => true, // set to true to allow cropping, false to disable
            'aspect_ratio' => 1,
          
        ]); 
        $this->crud->setFromDb();

        // add asterisk for fields that are required in ProductWarehouseRequest
        $this->crud->setRequiredFields(StoreRequest::class, 'create');
        $this->crud->setRequiredFields(UpdateRequest::class, 'edit');
    }

    public function setImageAttribute($value)
    {
    $attribute_name = "image";
    $disk = "public/";
    
    // if the image was erased
    if (($value == null && $this->id == 0) || ($this->id > 0 && $value != null && starts_with($value, 'data:image'))) {
    
    // delete the image from disk
    if (File::exists($this->image)) File::delete($this->image);
    
    // set null in the database column
    $this->attributes[$attribute_name] = null;
    }
    
    // if a base64 was sent, store it in the db
    if (starts_with($value, 'data:image')) {
    //dd(file_get_contents($value));
    $filename = rand(11111, 99999) . '_' . time() . '_' . rand(1000, 5000).'.png';
    Image::make(file_get_contents($value))->save("uploads/products/$filename");
    $this->attributes[$attribute_name] = "uploads/products/$filename";
    }
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
