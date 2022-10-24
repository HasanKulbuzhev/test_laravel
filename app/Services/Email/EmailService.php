<?php

namespace App\Services\Email;

class EmailService
{
    public function __construct(string $email, string $answer)
    {
    }

    public function send(): bool
    {
        return true;
    }
}
