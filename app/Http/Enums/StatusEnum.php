<?php

declare(strict_types=1);

namespace App\Http\Enums;

enum StatusEnum: string {
    case Active = 'active';
    case Deactive = 'deactive';
    case Rejected = 'rejected';
    case Declined = 'declined';
    case Pending = 'pending';
    case Freeze = 'freeze';
    case Paused = 'paused';
}
