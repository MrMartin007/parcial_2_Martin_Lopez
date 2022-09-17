<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class libro extends Model
{
    protected $table='libros';
    public $timestamps=false;
    protected $fillable=[
        'id','nombre','fecha','nombre_autor','serie','editorial'
    ];
    protected $primaryKey = 'id';
}
