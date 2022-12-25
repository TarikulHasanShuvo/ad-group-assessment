<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AuditLog extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'ip_address_id',
        'action',
        'old_label',
        'new_label',
    ];

    /**
     * @return BelongsTo
     */
    public function ipAddress() : BelongsTo
    {
        return $this->belongsTo(IpAddress::class);
    }

    /**
     * @return BelongsTo
     */
    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
