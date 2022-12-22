<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

    public function ipAddress()
    {
        return $this->belongsTo(IpAddress::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
