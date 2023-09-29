<?php declare(strict_types=1);

namespace App\Framework;

interface SessionStorage
{
    public function getCurrentUserId(): int;
}
