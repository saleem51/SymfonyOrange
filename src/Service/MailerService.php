<?php

namespace App\Service;

use Symfony\Component\Mailer\Envelope;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\RawMessage;

class MailerService implements \Symfony\Component\Mailer\MailerInterface
{

    public function __construct(){}

    /**
     * @inheritDoc
     */
    public function send(RawMessage $message, Envelope $envelope = null): void
    {
        
    }

    public function sendMail($destinataire,$sujet,$corps)
    {


    }
}