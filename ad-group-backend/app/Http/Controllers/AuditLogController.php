<?php

namespace App\Http\Controllers;

use App\Http\Resources\IpAddressResource;
use App\Models\AuditLog;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

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
