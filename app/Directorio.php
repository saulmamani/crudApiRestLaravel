<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Directorio extends Model
{
    protected $table = 'directorios';

    protected $fillable = [
        'nombre_completo',
        'direccion',
        'telefono',
        'foto'
    ];

    protected $hidden = [
        'created_at', 'updated_at'
    ];

    public static function rules($isNew = true)
    {
        return [
            'nombre_completo' => 'required|min:5|max:100',
            'telefono' => 'required|unique:directorios,telefono,' . ($isNew ? '' : request('directorio')->id)
        ];
    }
}
