<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\File
 *
 * @property int $file_id
 * @property int $individual_id
 * @property int $misdeed_id
 * @property string $descripton
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property int $created_by
 * @method static \Illuminate\Database\Eloquent\Builder|File newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|File newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|File query()
 * @method static \Illuminate\Database\Eloquent\Builder|File whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereDescripton($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereFileId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereIndividualId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereMisdeedId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|File whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class File extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $primaryKey = 'file_id';

    protected $fillable = [
        'individual_id',
        'misdeed_id',
        'description',
        'created_at',
        'created_by'
    ];

    public function caution()
    {
        return $this->hasOne(Caution::class, 'file_id', 'file_id');
    }

    public function individual()
    {
        return $this->belongsTo(Individual::class, 'individual_id', 'individual_id');
    }

    public function misdeed()
    {
        return $this->belongsTo(Misdeed::class, 'misdeed_id', 'misdeed_id');
    }
}
