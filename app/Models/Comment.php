<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    const IS_ALLOWED = 1;
    const IS_DISALLOWED = 0;

    public function post()
    {
        return $this->hasOne(Post::class);
    }

    public function user()
    {
        return $this->hasOne(User::class);
    }

    private function allow()
    {
        $this->status = Comment::IS_ALLOWED;
        $this->save();
    }

    private function disallow()
    {
        $this->status = Comment::IS_DISALLOWED;
        $this->save();
    }

    public function toggleStatus()
    {
        if ($this->status == Comment::IS_DISALLOWED) {
            $this->allow();
        } else {
            $this->disallow();
        }
    }

    public function remove()
    {
        $this->delete();
    }
}
