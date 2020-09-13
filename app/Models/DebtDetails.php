<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DebtDetails extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'debt_id',
        'total',
        'descrip',
        'due_date',
        'status'
    ];
}
