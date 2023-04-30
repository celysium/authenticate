<?php

namespace Celysium\Authenticate\Repository;

use Illuminate\Http\Client\Response;
use Celysium\HttpBuilder\Facades\HttpBuilder;

class UserServiceRepository implements UserServiceInterface
{
    public function create(array $parameters, string $roleSlug = 'none', bool $mustVerify = false): Response
    {
        return HttpBuilder::request()
            ->withHeaders(['microservice' => env('MICROSERVICE_SLUG', 'none')])
            ->post('sso/users', array_merge($parameters, [
                'role_slug' => $roleSlug,
                'must_verify' => $mustVerify,
            ]));
    }

    public function update(array $parameters): Response
    {
        return HttpBuilder::request()
            ->patch('sso/users/', $parameters);
    }


    public function sendOtp(string $mobile, string $roleSlug = 'none', bool $mustVerify = true): Response
    {
        return HttpBuilder::request()
            ->post('sso/auth', [
                'mobile' => $mobile,
                'role_slug' => $roleSlug,
                'must_verify' => $mustVerify
            ]);
    }

    public function verifyOtp(string $mobile, string $verificationCode): Response
    {
        return HttpBuilder::request()
            ->post('sso/users/verify', [
                'mobile' => $mobile,
                'verification_code' => $verificationCode
            ]);
    }
}
