<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

use Illuminate\Database\Eloquent\SoftDeletes; //línea necesaria

class teste extends Model
{
    use SoftDeletes; //Implementamos 

//	protected $table = 'teste';

    protected $dates = ['deleted_at']; //Registramos la nueva columna
    protected $fillable = ['name','lastname','age'];
}
