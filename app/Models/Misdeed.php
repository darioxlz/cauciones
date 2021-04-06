<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Misdeed
 *
 * @property int $misdeed_id
 * @property string $description
 * @method static \Illuminate\Database\Eloquent\Builder|Misdeed newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Misdeed newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Misdeed query()
 * @method static \Illuminate\Database\Eloquent\Builder|Misdeed whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Misdeed whereMisdeedId($value)
 * @mixin \Eloquent
 */
class Misdeed extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $primaryKey = 'misdeed_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'description',
    ];

    public function file()
    {
        return $this->hasMany(File::class, 'misdeed_id', 'misdeed_id');
    }
}
