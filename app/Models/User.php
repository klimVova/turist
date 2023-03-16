<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Filters\QueryFilter;
use Illuminate\Database\Eloquent\Builder;
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
    const ROLE_MEDICAL = 4;
    const ROLE_SPA = 5;
    const ROLE_SANATORIUM = 6;
    const ROLE_TUROPERATOR = 7;


    public static function getRoles()
    {
        return [
            self::ROLE_ADMIN => 'Админ',
            self::ROLE_READER => 'Пользователь',
            self::ROLE_HOSTEl => 'Отель',
            self::ROLE_CAFE => 'Кофе',
            self::ROLE_MEDICAL => 'Медецина',
            self::ROLE_SPA => 'CПА',
            self::ROLE_SANATORIUM => 'Санатории',
            self::ROLE_TUROPERATOR => 'ТурОператор'
        ];
    }

    protected $guarded = false;
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
        'type_id',
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
    public function scopeFilter(Builder $builder, QueryFilter $filter){
        return $filter->apply($builder);
    }
    public function posts()
    {
        return $this->hasMany(Post::class, 'user_id', 'id');
    }
    public function type()
    {
        return $this->belongsTo(Type::class, 'type_id', 'id');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id', 'id');
    }

    public function republic()
    {
        return $this->belongsTo(Republic::class, 'republic_id', 'id');
    }

    public function district()
    {
        return $this->belongsTo(District::class, 'district_id', 'id');
    }

    //hostels
    public function hostelPosts()
    {
        return $this->hasMany(HostelPost::class, 'user_id', 'id');
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
    public function hostelCardTag()
    {
        return $this->hasMany(HostelCardTag::class, 'user_id');
    }
    public function hostelActions()
    {
        return $this->hasMany(HostelAction::class, 'user_id');
    }
    public function hostelServics()
    {
        return $this->hasMany(HostelServic::class, 'user_id');
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
    public function cafeTags()
    {
        return $this->hasMany(CafeTag::class, 'user_id');
    }
    public function cafeActions()
    {
        return $this->hasMany(CafeAction::class, 'user_id');
    }

    //medical
    public function medicalCards()
    {
        return $this->hasMany(MedicalCard::class, 'user_id');
    }

    public function medicalTimes()
    {
        return $this->hasMany(MedicalTime::class, 'user_id');
    }

    public function medicalTodoLists()
    {
        return $this->hasMany(MedicalTodoList::class, 'user_id');
    }
    public function medicalTags()
    {
        return $this->hasMany(MedicalTag::class, 'user_id');
    }
    public function medicalActions()
    {
        return $this->hasMany(MedicalAction::class, 'user_id');
    }
    //spa
    public function spaCards()
    {
        return $this->hasMany(SpaCard::class, 'user_id');
    }

    public function spaTimes()
    {
        return $this->hasMany(SpaTime::class, 'user_id');
    }

    public function spaTodoLists()
    {
        return $this->hasMany(SpaTodoList::class, 'user_id');
    }
    public function spaTags()
    {
        return $this->hasMany(SpaTag::class, 'user_id');
    }
    public function spaActions()
    {
        return $this->hasMany(SpaAction::class, 'user_id');
    }
    //sanatorium
    public function sanatoriumPosts()
    {
        return $this->hasMany(SanatoriumPost::class, 'user_id', 'id');
    }

    public function sanatoriumCards()
    {
        return $this->hasMany(SanatoriumCard::class, 'user_id');
    }

    public function sanatoriumCategories()
    {
        return $this->hasMany(SanatoriumCategory::class, 'user_id');
    }

    public function sanatoriumTags()
    {
        return $this->hasMany(SanatoriumTag::class, 'user_id');
    }
    public function sanatoriumCardTag()
    {
        return $this->hasMany(SanatoriumCardTag::class, 'user_id');
    }
    public function sanatoriumActions()
    {
        return $this->hasMany(SanatoriumAction::class, 'user_id');
    }
    public function sanatoriumServics()
    {
        return $this->hasMany(SanatoriumServic::class, 'user_id');
    }
    public function sanatoriumTodoLists()
    {
        return $this->hasMany(SanatoriumTodoList::class, 'user_id');
    }

    //turoperator
    public function turoperatorPosts()
    {
        return $this->hasMany(TuroperatorPost::class, 'user_id', 'id');
    }

    public function turoperatorCards()
    {
        return $this->hasMany(TuroperatorCard::class, 'user_id');
    }

    public function turoperatorCategories()
    {
        return $this->hasMany(TuroperatorCategory::class, 'user_id');
    }

    public function turoperatorTags()
    {
        return $this->hasMany(TuroperatorTag::class, 'user_id');
    }
    public function turoperatorCardTag()
    {
        return $this->hasMany(TuroperatorCardTag::class, 'user_id');
    }
    public function turoperatorActions()
    {
        return $this->hasMany(TuroperatorAction::class, 'user_id');
    }
    public function turoperatorServics()
    {
        return $this->hasMany(TuroperatorServic::class, 'user_id');
    }
    public function turoperatorTodoLists()
    {
        return $this->hasMany(TuroperatorTodoList::class, 'user_id');
    }
}
