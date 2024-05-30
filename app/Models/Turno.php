<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Turno extends Model
{
    use HasFactory;

    protected $table = "turnos";
    protected $primaryKey = "id";

    protected $fillable = [
        'reporte_id',
        'numero_turno',
        'inventario_recibido',
        'reposicion',
        'venta_contado',
        'venta_credito',
        'inventario_final',
    ];

    public function reporte()
    {
        return $this->belongsTo(Reporte::class);
    }
}
