<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    const IS_ADMIN = 1;
    const IS_NORMAL = 0;
    const IS_BANNED = 1;
    const IS_ACTIVE = 0;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public static function add($fields)
    {
        $user = new static;
        $user->fill($fields);
        $user->password = bcrypt($fields['password']);
        $user->save();

        return $user;
    }

    public function edit($fields)
    {
        $this->fill($fields);
        $this->password = bcrypt($fields['password']);
        $this->save();
    }

    public function delete()
    {
        Storage::delete('uploads/' . $this->image);
        $this->delete();
    }

    public function uploadAvatar($image)
    {
        if ($image == null) {
            return;
        }

        Storage::delete('uploads/' . $this->image);
        $filename = Str::random(10) . '.' . $image->extension();
        $image->saveAs('uploads', $filename);
        $this->image = $filename;
        $this->save();
    }

    public function getAvatar()
    {
        if ($this->image == null) {
            return '/img/no-avatar.png';
        }
        return '/uploads/' . $this->image;
    }

    private function makeAdmin()
    {
        $this->is_admin = User::IS_ADMIN;
        $this->save();
    }

    private function makeNormal()
    {
        $this->is_admin = User::IS_NORMAL;
        $this->save();
    }

    public function toggleAdmin($value)
    {
        if ($value == null) {
            $this->makeNormal();
        } else {
            $this->makeAdmin();
        }
    }

    private function ban()
    {
        $this->status = User::IS_BANNED;
        $this->save();
    }

    private function unban()
    {
        $this->status = User::IS_ACTIVE;
        $this->save();
    }

    public function toggleBan($value)
    {
        if ($value == null) {
            $this->unban();
        } else {
            $this->ban();
        }
    }
}
