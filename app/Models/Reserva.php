<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'sala_id',
        'fecha',
        'bloque_id',
        'estado_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function sala()
    {
        return $this->belongsTo(Sala::class);
    }

    public function bloqueHorario()
    {
        return $this->belongsTo(BloqueHorario::class,'bloque_id');
    }

    public function estado()
    {
        return $this->belongsTo(EstadoReserva::class);
    }
}
