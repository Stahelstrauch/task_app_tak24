<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model {
    use HasFactory;

    // Kui tabeli nimi ei vasta standardile
    // protected $table = 'todos';

    //Lubatud mass-assign veerud
    protected $fillable = [
        'title',
        'description',
        'is_completed'
    ];
    // Created_at ja updated_at on vaikimisi Carbon objektid
    
}
