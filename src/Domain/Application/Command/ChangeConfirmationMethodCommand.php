<?php declare(strict_types=1);

namespace App\Domain\Application\Command;

use App\Domain\Interfaces\Persistence\RepositoryInterface;
use App\ExternalServices\MessageSenderInterface;
use App\Framework\MessageMakerInterface;

class ChangeConfirmationMethodCommand
{
    public function __construct(
        private RepositoryInterface $repository,
        private MessageSenderInterface $messageSender,
        private MessageMakerInterface $messageMaker,
    )
    {
    }

    public function run($user_id, $request_id, $new_confirmation_method) {
        $user = $this->repository->loadUser($user_id);
        $request = $this->repository->loadChangeRequest($request_id);

        // Here skipped validation of
        // the request belongs to the user,
        // and new_confirmation_method differs from already set
        // and request not already confirmed

        $request->change_method = $new_confirmation_method;
        $this->repository->saveChangeRequest($request);
        $message = $this->messageMaker->makeMessage($request->confirmation_secret);
        $this->messageSender->sendMessage($request->change_method, $user, $message);
    }
}
