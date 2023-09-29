<?php declare(strict_types=1);

namespace App\Domain\Entity;

use App\Domain\Entity\Types\ChangeMethod;

class ChangeRequest
{
    public int $id;
    public bool $confirmed = false;

    public function __construct(
        public $user_id,
        public $property_name,
        public $property_new_value,
        public ChangeMethod $change_method,
        public $confirmation_secret,
    ) {}
}
