<?php declare(strict_types=1);

namespace App\Framework;

interface MessageMakerInterface
{
    public function makeMessage($secret): String;
}
