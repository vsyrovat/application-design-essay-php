<?php declare(strict_types=1);

namespace App\Pesistence;

use App\Domain\Entity\ChangeRequest;
use App\Domain\Entity\User;
use App\Domain\Interfaces\Persistence\RepositoryInterface;

class Repository implements RepositoryInterface
{
    public function saveChangeRequest(ChangeRequest $request): int
    {
        // TODO: Implement saveRequest() method.
    }

    public function loadChangeRequest($request_id): ChangeRequest
    {
        // TODO: Implement loadChangeRequest() method.
    }

    public function loadUser($user_id): User
    {
        // TODO: Implement loadUser() method.
    }
}
