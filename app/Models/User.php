<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'remember_token',
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

    /**
     * setDataCreate function
     *
     * @param array $data
     * @return array
     */
    public function setDataCreate(array $data): array
    {
        return [
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'remember_token' => isset($data['remember']) && $data['remember'] ? Str::random(10) : null
        ];
    }
    
    /**
     * authenticate function
     *
     * @param array $data
     * @return boolean
     */
    public function autenticate(array $data): bool
    {
        $isAuth = false;
        $credentials = $this->getCredentials($data);
        $remember = $this->rememberUser($data);
        
        if (Auth::attempt($credentials, $remember)) {
            $isAuth = true;
        }
        
        return $isAuth;
    }
    
    /**
     * getCredentials function
     *
     * @param array $dataRequest
     * @return array
     */
    public function getCredentials(array $data): array
    {
        return [
            'email' => $data['email'],
            'password' => $data['password'],
        ];
    }
    
    /**
     * Undocumented function
     *
     * @param array $data
     * @return boolean
     */
    public function rememberUser(array $data): bool
    {
        return isset($data['remember']) ? $data['remember'] : false;
    }
}
