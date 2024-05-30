<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reporte extends Model
{
    use HasFactory;

    protected $table = "reportes";
    protected $primaryKey = "id";

    protected $fillable = [
        'nombre',
        'fecha',
        'isla',
        'estado',
        'archivo',
    ];

    public function turnos()
    {
        return $this->hasMany(Turno::class);
    }
}
