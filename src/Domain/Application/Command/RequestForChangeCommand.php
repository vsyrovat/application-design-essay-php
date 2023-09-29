<?php declare(strict_types=1);

namespace App\Domain\Application\Command;

use App\Domain\Entity\ChangeRequest;
use App\Domain\Interfaces\Persistence\RepositoryInterface;
use App\ExternalServices\MessageSenderInterface;
use App\Framework\MessageMakerInterface;
use App\Framework\SecretGenerator;

class RequestForChangeCommand
{
    public function __construct(
        private SecretGenerator $secretGenerator,
        private RepositoryInterface $repository,
        private MessageSenderInterface $messageSender,
        private MessageMakerInterface $messageMaker,
    ) {}

    public function run($user_id, $property_name, $new_value, $change_method)
    {
        $user = $this->repository->loadUser($user_id);
        $confirmation_secret = $this->secretGenerator->generateSecret();
        $change_request = new ChangeRequest($user->id, $property_name, $new_value, $change_method, $confirmation_secret);
        $this->repository->saveChangeRequest($change_request);
        $message = $this->messageMaker->makeMessage($confirmation_secret);
        $this->messageSender->sendMessage($change_request->change_method, $user, $message);
    }
}
