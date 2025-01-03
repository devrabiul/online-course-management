<?php

namespace App\Traits;

use Flasher\Prime\Notification\Envelope;

trait MultiToaster
{
    public static function successMessage(string $message = null, string|int $duration = 2000): Envelope|bool
    {
        if ($message) {
            return notyf()->duration($duration)->ripple(false)->addSuccess(($message));
        }
        return true;
    }

    public static function errorMessage(string $message = null, string|int $duration = 2000): Envelope|bool
    {
        if ($message) {
            return notyf()->duration($duration)->ripple(false)->addError(($message));
        }
        return true;
    }

    public static function info(string $message = null, string|int $duration = 2000): Envelope|bool
    {
        if ($message) {
            return notyf()->duration($duration)->ripple(false)->addInfo(($message));
        }
        return true;
    }

    public static function warning(string $message = null, string|int $duration = 2000): Envelope|bool
    {
        if ($message) {
            return notyf()->duration($duration)->ripple(false)->addWarning(($message));
        }
        return true;
    }

}
