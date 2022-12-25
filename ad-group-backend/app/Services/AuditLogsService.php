<?php

namespace App\Services;

use App\Models\AuditLog;

class AuditLogsService
{
    /**
     * Handle the IpAddress "deleted" event.
     *
     * @param \App\Models\IpAddress $ipAddress
     * @return void
     */

    public static function createAuditLog($ipAddress, $action): void
    {
        AuditLog::create([
            'user_id' => auth()->id(),
            'ip_address_id' => $ipAddress->id,
            'action' => $action,
            'old_label' => $ipAddress->getOriginal('label'),
            'new_label' => $ipAddress->label,
        ]);
    }

}
