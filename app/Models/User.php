<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

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
        'role',
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
     * ユーザーデータを編集
     *
     * @param  $user_id
     * @return void
     */
    public function selectEditUserFindById($user_id)
    {
        $query = $this->select([
            'id',
            'name',
            'email',
        ])->where([
            'id' => $user_id
        ]);

        return $query->first();
    }


    /**
     * ユーザーデータ更新
     * @param Request $edit_user
     * @return Response
     * 
     */

     public function updateUserFindById($edit_user)
     {
         return $this->where([
             'id' => $edit_user['id']
         ])->update([
             'name' => $edit_user['name'],
             'email' => $edit_user['email'],
         ]);
     }
 
     /**
      * 削除処理
      */
     public function deleteUserById($id)
     {
         return $this->destroy($id);
     }
}
