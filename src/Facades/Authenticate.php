<?php

namespace Celysium\Authenticate\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static id(): ?string
 * @method static headers(): array
 * @method static name(): ?string
 * @method static firstName(): ?string
 * @method static lastName(): ?string
 */
class Authenticate extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'authenticate';
    }
}
