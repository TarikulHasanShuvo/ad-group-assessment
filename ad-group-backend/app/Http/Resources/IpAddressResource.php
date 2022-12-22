<?php

namespace App\Http\Resources;


use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class IpAddressResource extends JsonResource
{
    /**
     * @param Request $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'user_name' => $this->user->name,
            'ip_address' => $this->ipAddress->ip_address,
            'action' => $this->action,
            'old_label' => $this->old_label,
            'new_label' => $this->new_label,
            'created_at' => Carbon::make($this->created_at)->format('d M, Y H:i:s'),
        ];
    }
}
