<?php

namespace Celysium\Authenticate;

class Authenticate
{
    public function id(): ?string
    {
        return request()->header(config('authenticate.user_id')) ?? null;
    }

    public function name(): ?string
    {
        return request()->header(config('authenticate.user_name')) ?? null;
    }

    public function headers(): array
    {
        return [
            config('authenticate.user_id') => $this->id(),
        ];
    }
}
