<?php

declare(strict_types=1);

namespace App\Http\Enums;

enum ModuleEnum: int {
    case Login = 1;
    case SocialLogin = 2;
    case Register = 3;
    case OrderCreate = 4;
    case PaymentCreate = 5;
    case UserCreate = 6;
    case UserUpdate = 7;
    case UserDelete = 8;
    // case PreferenceCreate = 8;
    // case PreferenceUpdate = 9;
}
