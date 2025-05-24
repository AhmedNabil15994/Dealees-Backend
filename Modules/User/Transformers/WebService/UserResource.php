<?php

namespace Modules\User\Transformers\WebService;

use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Area\Traits\AreaTrait;

class UserResource extends JsonResource
{
    use AreaTrait;

    public function toArray($request)
    {
        $roles = array_column($this->roles->toArray() ?? [], 'name');
        $result = [
            'id' => $this->id,
            'name' => $this->name == $this->getPhone() ? null : $this->name,
            'email' => $this->email,
            'calling_code' => $this->calling_code,
            'mobile' => $this->mobile,
            'completed_profile' => $this->email ? true : false,
            'image' => url($this->image),
            'roles' => $roles,
        ];

        return $result;
    }


    private function getUserTypeByRoles($roles)
    {
        if (in_array('drivers', $roles)) {
            return 'driver';
        } elseif (in_array('admins', $roles)) {
            return 'admin';
        } else {
            return '';
        }
    }
}
