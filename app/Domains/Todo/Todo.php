<?php

namespace App\Domains\Todo;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Todo extends Model
{
    use HasFactory;

    /**
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'user_email',
    ];

    public function User()
    {
        return $this->belongsTo(User::class, 'foreign_key');
    }
}
