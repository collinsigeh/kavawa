<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Tmessage extends Model
{
    use HasFactory;

    protected $fillable = [
        'ticket_id',
        'content',
        'is_reply_to_customer',
        'manager_id',
        'is_seen_by_manager',
        'is_seen_by_customer'
    ];

    public function ticket(): BelongsTo
    {
        return $this->belongsTo(Ticket::class);
    }

    public function manager(): BelongsTo
    {
        return $this->belongsTo(Manager::class);
    }
}
