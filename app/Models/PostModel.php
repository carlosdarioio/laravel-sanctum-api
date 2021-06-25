<?php
//php artisan make:model PostModel -m
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostModel extends Model
{
    use HasFactory;
    //cosas que podes hacer en el model
    //Table Name por defecto aqui seria PostModel
        //protected $table='posts';
    //definir primary key
    public $primaryKey = 'id';
    //especificar si usaras timestamp
        //public $timestamps=true;


        //alola creando relacion
        public function user(){
            return $this->belongsTo('App\Models\User');
        }

}
//PostModel::all();
