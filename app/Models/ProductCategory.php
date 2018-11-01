<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\CrudTrait;

class ProductCategory extends Model
{
    use CrudTrait;

    /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    protected $table = 'product_categories';
     protected $primaryKey = 'id';
    // public $timestamps = false;
    // protected $guarded = ['id'];
    protected $fillable = ['name','slug','parent_id'];
    // protected $hidden = [];
    // protected $dates = [];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */
    public  function parent(){
        return $this->belongsTo('App\Models\ProductCategory','parent_id');
    }

    public  function children(){
        return $this->hasMany('App\Models\ProductCategory','parent_id');
    }
    public function specs(){
        return $this -> belongsToMany(
            'App\Models\ProductSpec',
            'spec_categories',
            'category_id',
            'spec_id'
        );
    }
    public function warehouses(){
        return $this -> belongsToMany(
            'App\Models\ProductWarehouse',
            'warehouse_categories',
            'category_id',
            'warehouse_id'
        );
    }
    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | ACCESORS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
}
