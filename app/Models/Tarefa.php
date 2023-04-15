<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Tarefa extends Model
{
    use HasFactory;

    protected $fillable = [
        'tarefa',
        'data_limite_conclusao',
    ];

    public function users(){
        return $this->belongsToMany(User::class, 'tarefa_usuario','tarefa_id','user_id');
    }
}
