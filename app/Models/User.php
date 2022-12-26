<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    const ROLE_ADMIN = 0;
    const ROLE_READER = 1;
    const ROLE_HOSTEl = 2;
    const ROLE_CAFE = 3;



    public static function getRoles()
    {
        return [
            self::ROLE_ADMIN => 'Админ',
            self::ROLE_READER => 'Пользователь',
            self::ROLE_HOSTEl => 'Отель',
            self::ROLE_CAFE => 'Кофе',
        ];
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'city_id',
        'republic_id',
        'district_id',
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
    public function posts()
    {
        return $this->hasMany(Post::class, 'user_id','id');
    }
    public function city(){
        return $this->belongsTo(City::class, 'city_id','id');
    }
    public function republic(){
        return $this->belongsTo(Republic::class, 'republic_id','id');
    }
    public function district(){
        return $this->belongsTo(District::class, 'district_id','id');
    }
    //hostels
    public function hostelPosts()
    {
        return $this->hasMany(HostelPost::class, 'user_id','id');
    }
    public function hostelCards()
    {
        return $this->hasMany(HostelCard::class, 'user_id');
    }
    public function hostelCategories()
    {
        return $this->hasMany(HostelCategory::class, 'user_id');
    }
    public function hostelTags()
    {
        return $this->hasMany(HostelTag::class, 'user_id');
    }
    //cafes

    public function cafeCards()
    {
        return $this->hasMany(CafeCard::class, 'user_id');
    }

    public function cafeTimes()
    {
        return $this->hasMany(CafeTime::class, 'user_id');
    }
    public function cafeTodoLists()
    {
        return $this->hasMany(CafeTodoList::class, 'user_id');
    }
}
