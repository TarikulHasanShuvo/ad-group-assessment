<?php

namespace App\Observers;

use App\Models\AuditLog;
use App\Models\IpAddress;
use App\Services\AuditLogsService;

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
        AuditLogsService::createAuditLog($ipAddress, 'created');
    }

    /**
     * Handle the IpAddress "updated" event.
     *
     * @param \App\Models\IpAddress $ipAddress
     * @return void
     */
    public function updating(IpAddress $ipAddress)
    {
        AuditLogsService::createAuditLog($ipAddress, 'update');
    }

}
