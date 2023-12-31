<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name',
        'email',
        'status',
        'password',
        'social_id',
        'social_type',
        'profile_image',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function getAllUsers()
    {
        return self::orderBy('updated_at', 'desc')->get();
    }

    /**
     * @param string $whereParam
     * @param mixed $value
     *
     * @return
     */
    public static function getSingleUserByParam(string $whereParam, $value)
    {
        return self::where($whereParam, $value)->first();
    }

    /**
     * @param array $userInfo
     *
     * @return
     */
    public static function createUser(array $userInfo)
    {
        return self::create($userInfo);;
    }

    /**
     * @param string $whereParam
     * @param int|string $value
     * @param array|null $updatedInfo
     *
     * @return mixed
     */
    public static function updateUserByParam(string $whereParam, int|string $value, array|null $updatedInfo)
    {
        return self::where($whereParam, $value)->update($updatedInfo);
    }

    /**
     * @param string $whereParam
     * @param int|string $value
     *
     * @return
     */
    public static function deleteUserByParam(string $whereParam, int|string $value)
    {
        return self::where($whereParam, $value)->delete();
    }

    /**
     * @param mixed $query
     * @param mixed $userId
     *
     * @
     */
    public function scopeUserRole($query, $userId) {
        $query->join('model_has_roles', 'model_has_roles.model_id', '=', 'users.id')
        ->join('roles', 'model_has_roles.role_id', '=', 'roles.id')
        ->where('model_has_roles.model_id', $userId)
        ->select('roles.id as role_id', 'roles.name as role', 'model_has_roles.role_id', 'model_has_roles.model_id as user_id');
        return $query->first();
    }
}
