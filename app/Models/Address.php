<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Address
 *
 * @property int $address_id
 * @property int $city_id
 * @property string $address_exact
 * @method static \Illuminate\Database\Eloquent\Builder|Address newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Address newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Address query()
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereAddressExact($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereAddressId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Address whereCityId($value)
 * @mixin \Eloquent
 */
class Address extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $primaryKey = 'address_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'city_id',
        'address_exact',
    ];
}
