<?php

namespace Celysium\Authenticate\Repository;

use Illuminate\Http\Client\Response;

interface UserServiceInterface
{
    public function create(array $parameters, string $roleSlug = 'none', bool $mustVerify = false): Response;

    public function update(array $parameters): Response;

    public function sendOtp(string $mobile, string $roleSlug = 'none', bool $mustVerify = true): Response;

    public function verifyOtp(string $mobile, string $verificationCode): Response;
}
