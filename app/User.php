<?php

namespace App;
use App\Notifications\PasswordReset;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Storage;
use App\ClassMembers;
use Cache;

class User extends Authenticatable  
{
    protected $primaryKey = "id";
    
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'permissions',
        'password',
        'email'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function user_profile(){
        return $this->hasOne('App\UserProfile', 'id', 'id');
    }
    public function klase(){
        return $this->hasMany('App\Klase', 'instructor_id', 'id');
    }

    public function class_members(){
        return $this->hasMany('App\ClassMembers', 'student_id', 'id');
    }

        public function grades(){
        return $this->hasMany('App\Grade', 'usr_id', 'id');
    }

    public function posts(){
        return $this->hasMany(Post::Class);
    }

    public function thread(){
        return $this->hasMany(Thread::Class);
    }

    public function profile_photo()
    {
        if (Storage::cloud()->has('avatar/'.$this->user_profile->profile_pic)) {
            return Storage::cloud()->url('avatar/'.$this->user_profile->profile_pic);
        }     
    }

    public function submission(){
        return $this->hasMany(AssignSubmission::Class);
    }

    public function username(){
        return $this->user_profile->given_name . ' ' . $this->user_profile->family_name;
    }

    public function klases(){
        return $this->klase;
    }

    public function stud_klases(){
        return $this->class_members;
    }

        public static function getAuthor($id)
    {
        $user = self::find($id);
        return [
            'id'     => $user->id,
            'name'   => $this->user_profile->family_name,
            'url'    => '',  // Optional
            'avatar' => 'gravatar',  // Default avatar
            'admin'  => $user->role === 'admin', // bool
        ];
    }

public function isOnline()
{
    return Cache::has('user-is-online-' . $this->id);
}

    public function verifyUser()
    {
        return $this->hasOne('App\VerifyUser');
    }

}
