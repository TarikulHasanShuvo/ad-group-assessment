<?php

namespace App\Observers;

use App\Models\AuditLog;
use App\Models\IpAddress;

class IpAddressObserver
{
    /**
     * Handle the IpAddress "created" event.
     *
     * @param  \App\Models\IpAddress  $ipAddress
     * @return void
     */
    public function created(IpAddress $ipAddress)
    {
        AuditLog::create([
            'user_id' => auth()->id(),
            'ip_address_id' => $ipAddress->id,
            'action' => 'create',
            'old_label' => null,
            'new_label' => $ipAddress->label,
        ]);
    }

    /**
     * Handle the IpAddress "updated" event.
     *
     * @param  \App\Models\IpAddress  $ipAddress
     * @return void
     */
    public function updating(IpAddress $ipAddress)
    {
        AuditLog::create([
            'user_id' => auth()->id(),
            'ip_address_id' => $ipAddress->id,
            'action' => 'update',
            'old_label' => $ipAddress->getOriginal('label'),
            'new_label' => $ipAddress->label,
        ]);
    }

    /**
     * Handle the IpAddress "deleted" event.
     *
     * @param  \App\Models\IpAddress  $ipAddress
     * @return void
     */
    public function deleted(IpAddress $ipAddress)
    {
        //
    }

    /**
     * Handle the IpAddress "restored" event.
     *
     * @param  \App\Models\IpAddress  $ipAddress
     * @return void
     */
    public function restored(IpAddress $ipAddress)
    {
        //
    }

    /**
     * Handle the IpAddress "force deleted" event.
     *
     * @param  \App\Models\IpAddress  $ipAddress
     * @return void
     */
    public function forceDeleted(IpAddress $ipAddress)
    {
        //
    }
}
