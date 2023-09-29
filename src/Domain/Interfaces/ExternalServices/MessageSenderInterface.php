<?php declare(strict_types=1);

namespace App\ExternalServices;

use App\Domain\Entity\Types\ChangeMethod;
use App\Domain\Entity\User;

interface MessageSenderInterface
{
    public function sendMessage(ChangeMethod $message_method, User $user, $message_with_confirmation_secret);
}
