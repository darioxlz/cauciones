<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Individual extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $primaryKey = 'individual_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cedula',
        'firstnames',
        'surnames',
        'birthday',
        'phone_number',
        'sex',
        'address_id',
        'created_at',
        'created_by'
    ];
}
