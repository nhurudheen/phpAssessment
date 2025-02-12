<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeRecord extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'customerId'=> $this->id ?? null,
            'customerFullName' => $this->full_name ?? null,
            'customerPhoneNumber' =>  $this->phone_number ?? null,
            'customerEmailAddress' => $this->email_address ?? null,
            'customerCvUrl' => $this->cv ? asset($this->cv) : null,
        ];
    }
}
