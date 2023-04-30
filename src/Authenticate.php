<?php

namespace Celysium\Authenticate;

use Illuminate\Support\Str;

class Authenticate
{
    public function targetUser(): ?int
    {
        $targetUser = request()->header('target-user') ?? null;
        if (trim($targetUser) == '')
            return null;
        return $targetUser;
    }

    public function actorUser(): ?int
    {
        $actor = request()->header('actor') ?? null;
        if (trim($actor) == '')
            return null;
        return $actor;
    }

    public function headers(): array
    {
        return [
            'actor' => $this->actorUser(),
            'target-user' => $this->targetUser()
        ];
    }
}
