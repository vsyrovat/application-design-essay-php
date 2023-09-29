<?php declare(strict_types=1);

namespace App\Domain\Application\Command;

use App\Domain\Interfaces\Persistence\RepositoryInterface;
use App\Domain\Interfaces\Queue\EventBusInterface;

class ConfirmRequestCommand
{
    public function __construct(
        private RepositoryInterface $repository,
        private EventBusInterface $eventBus,
    ) {}

    public function run($user_id, $request_id, $confirmation_secret)
    {
        // Here skipped validation of
        // the request belongs to the user,
        // and request not already confirmed

        $request = $this->repository->loadChangeRequest($request_id);
        $request->confirmed = true;
        $this->repository->saveChangeRequest($request); // or may be dropped

        $this->eventBus->sendEvent([
            'event_type' => 'property_change_confirmed', //
            'user_id' => $user_id,
            'property_name' => $request->property_name,
            'property_value' => $request->property_new_value,
        ]);
    }
}
