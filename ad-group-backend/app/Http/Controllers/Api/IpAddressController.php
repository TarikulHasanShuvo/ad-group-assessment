<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreIpAddressRequest;
use App\Models\IpAddress;
use Illuminate\Http\JsonResponse;

class IpAddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $ipAddresses = IpAddress::query()->latest()->get();
        return response()->json($ipAddresses, 200);
    }

    /**
     * @param StoreIpAddressRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreIpAddressRequest $request): JsonResponse
    {
        IpAddress::create($request->only(['ip_address', 'label']));
        return response()->json(['message' => 'Ip address created successfully'], 201);
    }

    /**
     * @param StoreIpAddressRequest $request
     * @param $id
     * @return JsonResponse
     */
    public function update(StoreIpAddressRequest $request, $id): JsonResponse
    {
        IpAddress::find($id)->update(['label' => $request->label]);
        return response()->json(['message' => 'Ip address updated successfully'], 200);
    }
}
