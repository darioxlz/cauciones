<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Individual
 *
 * @property int $individual_id
 * @property int $cedula
 * @property string $firstnames
 * @property string $surnames
 * @property string $birthday
 * @property string|null $phone_number
 * @property string $sex
 * @property int $address_id
 * @property string $created_at
 * @property string|null $updated_at
 * @property string|null $deleted_at
 * @property int|null $created_by
 * @method static \Illuminate\Database\Eloquent\Builder|Individual newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Individual newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Individual query()
 * @method static \Illuminate\Database\Eloquent\Builder|Individual whereAddressId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Individual whereBirthday($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Individual whereCedula($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Individual whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Individual whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Individual whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Individual whereFirstnames($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Individual whereIndividualId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Individual wherePhoneNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Individual whereSex($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Individual whereSurnames($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Individual whereUpdatedAt($value)
 * @mixin \Eloquent
 */
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

    public function user()
    {
        return $this->hasOne(User::class, 'individual_id', 'individual_id');
    }

    public function file()
    {
        return $this->hasMany(File::class, 'individual_id', 'individual_id');
    }
}
