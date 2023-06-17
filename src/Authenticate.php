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

    public function firstName(): ?string
    {
        return request()->header(config('authenticate.user_first_name')) ?? null;
    }

    public function lastName(): ?string
    {
        return request()->header(config('authenticate.user_last_name')) ?? null;
    }

    public function headers(): array
    {
        return [
            config('authenticate.user_id') => $this->id(),
        ];
    }
}
