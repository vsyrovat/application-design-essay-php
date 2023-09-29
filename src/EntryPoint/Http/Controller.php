<?php declare(strict_types=1);

namespace App\EntryPoint\Http;

use App\Domain\Application\Command\ChangeConfirmationMethodCommand;
use App\Domain\Application\Command\ConfirmRequestCommand;
use App\Domain\Application\Command\RequestForChangeCommand;
use App\Framework\SessionStorage;

class Controller
{
    public function __construct(
        private SessionStorage          $sessionStorage,
        private RequestForChangeCommand $requestForChangeCommand,
        private ConfirmRequestCommand   $confirmRequestCommand,
        private ChangeConfirmationMethodCommand $changeConfirmationMethodCommand,
    ) {}

    /**
     * @POST(/something/request-for-change/)
     */
    public function requestForPropertyChangeAction($property_name, $new_value, $change_method) {
        $user_id = $this->sessionStorage->getCurrentUserId();
        $this->requestForChangeCommand->run($user_id, $property_name, $new_value, $change_method);
        return ["ok"];
    }

    /**
     * @POST(/something/confirm-change/)
     */
    public function confirmPropertyChangeAction($request_id, $confirmation_secret) {
        $user_id = $this->sessionStorage->getCurrentUserId();
        $this->confirmRequestCommand->run($user_id, $request_id, $confirmation_secret);
        return ["ok"];
    }

    /**
     * POST(/something/change-confirmation-method/)
     */
    public function changeConfirmationMethod($request_id, $new_confirmation_method) {
        $user_id = $this->sessionStorage->getCurrentUserId();
        $this->changeConfirmationMethodCommand->run($user_id, $request_id, $new_confirmation_method);
        return ["ok"];
    }
}
