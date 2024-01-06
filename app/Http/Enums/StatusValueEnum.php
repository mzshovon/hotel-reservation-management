<?php

declare(strict_types=1);

namespace App\Http\Enums;

enum StatusValueEnum: int {
    case PendingValue = 0;
    case ActiveValue = 1;
    case DeactiveValue = 2;
    case RejectedValue = 3;
    case PausedValue = 4;
}
