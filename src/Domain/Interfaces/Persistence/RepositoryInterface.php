<?php declare(strict_types=1);

namespace App\Domain\Interfaces\Persistence;

use App\Domain\Entity\ChangeRequest;
use App\Domain\Entity\User;

interface RepositoryInterface
{
    /**
     * @param ChangeRequest $request
     * @return int - database id of persisted request
     * @throws Exception - on error
     */
    public function saveChangeRequest(ChangeRequest $request): int;

    public function loadChangeRequest($request_id): ChangeRequest;

    public function loadUser($user_id): User;
}
