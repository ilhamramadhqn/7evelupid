<?php

namespace App;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Permission\Traits\HasRoles;


use Illuminate\Support\Collection;
class User extends Authenticatable
{
    use Notifiable, logsActivity, HasRoles;

    protected static $logAttributes = ['name','email'];
    // protected $guard_name='web';

    public function getRoleId(): Collection
    {
        return $this->roles->pluck('id');
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username','name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function scopeFetch($query, $request)
    {  
        $query->where('id','!=',1);
        if ($request->username)
          $query->where('username', 'like', '%'.$request->username.'%');
      if ($request->nama)
          $query->where('name','like', '%'.$request->nama.'%');
      if ($request->email)

          $query->where('email','like', '%'.$request->status.'%');
      if ($request->group)
          $query->where('id_group','like', '%'.$request->group.'%');
      return $query->paginate(10);
  }

}
