<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use Notifiable,
        SoftDeletes;// add soft delete

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $table = 'users';

    protected $fillable = [
        'email',
        'password',
        'role'
    ];

    public function isAdmin() {
        return $this->role === 1;
    }

    public function isUser() {
        return $this->role === 0;
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function getStrStatusAttribute()
    {
        $strStatus = '';
        if ($this->status == 0) {
            $strStatus = 'Khóa';
        }
        if ($this->status == 1) {
            $strStatus = 'Đang hoạt động';
        }
        return $strStatus;
    }

    public function getStrRolllleAttribute()
    {
        $strRole = '';
        if ($this->role == 0) {
            $strRole = 'Khách Hàng';
        }
        if ($this->role == 1) {
            $strRole = 'Admin';
        }
        return $strRole;
    }

    //get url avatar
    public function getMainAvatarAttribute()
    {
        $defaultavatar = 'https://res.cloudinary.com/quynv300192/image/upload/v1634800182/ixdpahcfqqmee12obutt.png';
        if ($this->avatar != null && strlen($this->avatar) > 0) {
            $this->avatar = substr($this->avatar, 0, -1);
            $arrayavatar = explode(',', $this->avatar);
            if (sizeof($arrayavatar) > 0) {
                return $arrayavatar[0];
            }
        }
        return $defaultavatar;
    }

    public function getArrayAvatarAttribute()
    {
        if ($this->avatar != null && strlen($this->avatar) > 0) {
            $this->avatar = substr($this->avatar, 0, -1);
            $arr_avatar = explode(',', $this->avatar);
            if (sizeof($arr_avatar) >= 0) {
                return $arr_avatar;
            }
        }
        return [];
    }


    public function scopeSortBy($query, $request)
    {
        if ($request->has('sortBy')) {
            switch ($request->sortBy) {
                case 'created_at_desc':
                    return $query->orderBy('created_at', 'desc');
                case 'created_at_asc':
                    return $query->orderBy('created_at', 'asc');
                case 'name_desc':
                    return $query->orderBy('name', 'desc');
                case 'name_asc':
                    return $query->orderBy('name', 'asc');
                case 'id_desc':
                    return $query->orderBy('id', 'desc');
                case 'id_asc':
                    return $query->orderBy('id', 'asc');
                default:
                    return $query->orderBy('created_at', 'asc');
            }
        }
    }

    public function scopeFullName($query, $request)
    {
        if ($request->has('fullName')) {
            if (isset($request->fullName)) {
                $query->where('fullName', 'LIKE', '%' . $request->fullName . '%');
                return $query;
            }
        }
        return $query;
    }

    public function scopePagination($query, $request)
    {
        if ($request->has('pagination_limit')) {
            switch ($request->pagination_limit) {
                case 'limit_9':
                    return $query->paginate(9);
                case 'limit_18':
                    return $query->paginate(18);
                case 'limit_32':
                    return $query->paginate(32);
            }
        }
    }
}
