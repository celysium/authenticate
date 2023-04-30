<?php

namespace Celysium\Authenticate\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static targetUser(): ?int
 * @method static actorUser(): ?int
 * @method static headers(): array
 */
class Authenticate extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'authenticate';
    }
}
