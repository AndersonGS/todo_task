<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Tarefa extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'descricao',
        'data_limite_conclusao',
        'concluida'
    ];

    public function users(){
        return $this->belongsToMany(User::class, 'tarefa_usuario','tarefa_id','user_id');
    }
}
