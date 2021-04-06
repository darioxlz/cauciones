<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Caution
 *
 * @property int $caution_id
 * @property int $file_id
 * @property string $image_path
 * @property \Illuminate\Support\Carbon $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property int $created_by
 * @method static \Illuminate\Database\Eloquent\Builder|Caution newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Caution newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Caution query()
 * @method static \Illuminate\Database\Eloquent\Builder|Caution whereCautionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Caution whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Caution whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Caution whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Caution whereFileId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Caution whereImagePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Caution whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Caution extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $primaryKey = 'caution_id';

    protected $fillable = [
        'file_id',
        'image_path',
        'created_at',
        'created_by'
    ];

    public function file()
    {
        return $this->belongsTo(File::class, 'file_id', 'file_id');
    }
}
