<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Note extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'title',
        'body',
        'send_date',
        'is_published',
        'heart_count',
        'recipient'
    ];

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function publishedNotes(User $user) : array
    {
        return $this->where('user_id', $user->id)->where('is_published', true)->get();
    }
}
