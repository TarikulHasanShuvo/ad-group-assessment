<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\IpAddressResource;
use App\Models\AuditLog;
use Illuminate\Http\JsonResponse;

class AuditLogController extends Controller
{
    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $auditLogs = AuditLog::query()->latest()->get();
        return response()->json(IpAddressResource::collection($auditLogs), 200);
    }
}
