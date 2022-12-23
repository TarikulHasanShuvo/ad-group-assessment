<?php

namespace App\Observers;

use App\Models\AuditLog;
use App\Models\IpAddress;

class IpAddressObserver
{
    /**
     * Handle the IpAddress "created" event.
     *
     * @param \App\Models\IpAddress $ipAddress
     * @return void
     */
    public function created(IpAddress $ipAddress)
    {
        self::createAuditLog($ipAddress, 'created');
    }

    /**
     * Handle the IpAddress "updated" event.
     *
     * @param \App\Models\IpAddress $ipAddress
     * @return void
     */
    public function updating(IpAddress $ipAddress)
    {
        self::createAuditLog($ipAddress, 'update');
    }

    /**
     * Handle the IpAddress "deleted" event.
     *
     * @param \App\Models\IpAddress $ipAddress
     * @return void
     */

    private function createAuditLog($ipAddress, $action): void
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
