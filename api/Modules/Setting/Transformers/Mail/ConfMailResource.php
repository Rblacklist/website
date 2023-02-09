<?php

namespace Modules\Setting\Transformers\Mail;

use Illuminate\Http\Resources\Json\JsonResource;

class ConfMailResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'mailer' => $this->mailer,
            'host' => $this->host,
            'port' => $this->port,
            'username' => $this->username,
            'encryption' => $this->encryption,
            'from_address' => $this->from_address,
            'is_selected' => $this->is_selected,
            'created_at' => $this->created_at,
        ];
    }
}
