<?php

namespace App\Models;

use TaqnyatSms;

use App\Models\Offer;
use App\Models\Order;
use App\Models\Estate;
use App\Models\Payment;
use App\Models\Favorite;
use App\Models\FirebaseToken;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;


    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $guarded = [];

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

       'password' => 'hashed',

    ];





    // relationships firebase_tokens
    public function firebase_tokens()
    {
        return $this->hasMany(FirebaseToken::class, 'user_id', 'id');
    }

    public function updateUserDevice()
    {
        if (request()->device_id) {
            $this->firebase_tokens()->updateOrCreate([
                'device_id' => request()->device_id,
                'token_firebase' => request()->token_firebase,
            ]);
        }
    }

    public function sendVerificationCode()
    {
        $this->update([
            'code' => $this->activationCode(),
        ]);

        $data = [
            'name' => $this->name,
            'msg' => __('Account confirmation code has been sent'),
            'code' => $this->code,
        ];
        $msg = 'كود التفعيل الخاص بكم هو: ' . $this->code;
        //sendSms($this->phone ,$msg);


        return true;
    }

    public function sendMailVerificationCode()
    {
        $this->update([
            'code' => $this->activationCode(),
        ]);

     //   sendMail($this->code, $this->email, $this->name);

        return true;
    }

    private function activationCode()
    {
        return 1234;
        return mt_rand(1111, 9999);
    }


    public function favorites()
    {
        return $this->hasMany(Favorite::class, 'user_id', 'id');
    }


    //oders relation

    public function clientOrders()
    {
        return $this->hasMany(Order::class, 'user_id', 'id');
    }

    public function ownerOrders()
    {
        return $this->hasMany(Order::class, 'owner_id', 'id');
    }


    public function offers()
    {
        return $this->hasMany(Offer::class, 'user_id', 'id');
    }


    public function payments()
    {
        return $this->hasMany(Payment::class, 'user_id', 'id');
    }



    public function reviews()
    {
        return $this->hasMany(Review::class, 'user_id', 'id');
    }

    public function estates()
    {
        return $this->hasMany(Estate::class, 'user_id', 'id');
    }







}
