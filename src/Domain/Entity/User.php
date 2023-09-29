<?php declare(strict_types=1);

namespace App\Domain\Entity;

class User
{
    public function __construct(
        public $id,
        public $email_address,
        public $sms_number,
        public $telegram_account,
    )
    {
    }
}
