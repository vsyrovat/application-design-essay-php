<?php declare(strict_types=1);

namespace App\Framework;

interface SecretGenerator
{
    public function generateSecret(): string;
}
