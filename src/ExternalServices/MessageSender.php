<?php declare(strict_types=1);

namespace App\ExternalServices;

use App\Domain\Entity\Types\ChangeMethod;
use App\Domain\Entity\User;

class MessageSender implements MessageSenderInterface
{
    public function __construct(
        private Sms $smsMessenger,
        private Email $emailMessenger,
        private Telegram $telegramMessenger
    )
    {
    }

    public function sendMessage(ChangeMethod $message_method, User $user, $message_with_confirmation_secret)
    {
        match ($message_method) {
            ChangeMethod::SMS => $this->smsMessenger->sendMessage($user->sms_number, $message_with_confirmation_secret),
            ChangeMethod::EMAIL => $this->emailMessenger->sendMessage($user->email_address, $message_with_confirmation_secret),
            ChangeMethod::TELEGRAM => $this->telegramMessenger->sendMessage($user->telegram_account, $message_with_confirmation_secret),
        };

    }
}
