<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employe extends Model
{
    use HasFactory;

    protected $table = 'employes';
    protected $fillable = [
        'firstname',
        'lastname',
        'company_id',
        'email',
        'phone',
        'created_at',
        'updated_at',
    ];
}
