<?php

declare(strict_types=1);

namespace App\Enums;

enum Settings: int
{
    case TOKEN_LENGTH = 8;
    case DEFAULT_CLICKS = 0;
}
