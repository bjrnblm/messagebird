<?php

namespace Bjrnblm\Messagebird;

class Messagebird
{

    public $client;
    public $errorMessages = []; 

    /**
     *
     */
    public function __construct(\MessageBird\Client $client)
    {
        $this->client = $client;
        $this->errorMessages = $this->getErrorMessages();
    }

    /**
     *
     */
    public function getErrorMessages()
    {
        $errorMessages = [];
        $errorMessages['authentication'] = 'Authentication failed, check your access key';
        $errorMessages['balance'] = 'Not enough balance on your account';

        return $errorMessages;
    }

    /**
     *
     */
    public function getBalance()
    {
        try {
            return $this->client->balance->read();
        } catch (\MessageBird\Exceptions\AuthenticateException $e) {
            return $this->errorMessages['authentication'];
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     *
     */
    public function createHlr($msisdn, $reference)
    {
        $hlr            = new \MessageBird\Objects\Hlr;
        $hlr->msisdn    = $msisdn;
        $hlr->reference = $reference;

        try {
            return $this->client->hlr->create($hlr);
        } catch (\MessageBird\Exceptions\AuthenticateException $e) {
            return $this->errorMessages['authentication'];
        } catch (\MessageBird\Exceptions\BalanceException $e) {
            return $this->errorMessages['balance'];
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     *
     */
    public function listHlrs($offset = 100, $limit = 30)
    {
        try {
            return $this->client->hlr->getList(['offset' => $offset, 'limit' => $limit]);
        } catch (\MessageBird\Exceptions\AuthenticateException $e) {
            return $this->errorMessages['authentication'];          
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     *
     */
    public function viewHlr($id)
    {
        try {
            return $this->client->hlr->read($id);
        } catch (\MessageBird\Exceptions\AuthenticateException $e) {
            return $this->errorMessages['authentication'];
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     *
     */
    public function createMessage($originator, $recipients = [], $body)
    {
        $message             = new \MessageBird\Objects\Message;
        $message->originator = $originator;
        $message->recipients = $recipients;
        $message->body       = $body;

        try {
            return $this->client->messages->create($message);
        } catch (\MessageBird\Exceptions\AuthenticateException $e) {
            return $this->errorMessages['authentication'];
        } catch (\MessageBird\Exceptions\BalanceException $e) {
            return $this->errorMessages['balance'];
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     *
     */
    public function deleteMessage($id)
    {
        try {
            return $this->client->messages->delete($id);
        } catch (\MessageBird\Exceptions\AuthenticateException $e) {
            return $this->errorMessages['authentication'];
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     *
     */
    public function listMessages($offset = 100, $limit = 30)
    {
        try {
            return $this->client->messages->getList(['offset' => $offset, 'limit' => $limit]);
        } catch (\MessageBird\Exceptions\AuthenticateException $e) {
            return $this->errorMessages['authentication'];
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     *
     */
    public function viewMessage($id)
    {
        try {
            return $this->client->messages->read($id);
        } catch (\MessageBird\Exceptions\AuthenticateException $e) {
            return $this->errorMessages['authentication'];
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     *
     */
    public function createVoiceMessage($recipients = [], $body, $language = 'en-gb', $voice = 'female', $ifMachine = 'continue')
    {
        $voiceMessage             = new \MessageBird\Objects\VoiceMessage;
        $voiceMessage->recipients = $recipients;
        $voiceMessage->body       = $body;
        $voiceMessage->language   = $language;
        $voiceMessage->voice      = $voice;
        $voiceMessage->ifMachine  = $ifMachine;

        try {
            return $this->client->voicemessages->create($voiceMessage);
        } catch (\MessageBird\Exceptions\AuthenticateException $e) {
            return $this->errorMessages['authentication'];
        } catch (\MessageBird\Exceptions\BalanceException $e) {
            return $this->errorMessages['balance'];
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     *
     */
    public function listVoiceMessages($offset = 100, $limit = 30)
    {
        try {
            return $this->client->voicemessages->getList(['offset' => $offset, 'limit' => $limit]);
        } catch (\MessageBird\Exceptions\AuthenticateException $e) {
            return $this->errorMessages['authentication'];
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     *
     */
    public function viewVoiceMessage($id)
    {
        try {
            return $this->client->voicemessages->read($id);
        } catch (\MessageBird\Exceptions\AuthenticateException $e) {
            return $this->errorMessages['authentication'];
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    /**
     *
     */
    public function lookup($phonenumber) 
    { 
        try { 
            return $this->client->lookup->read($phonenumber); 
        } catch (\MessageBird\Exceptions\AuthenticateException $e) { 
            return $this->errorMessages['authentication']; 
        } catch (\Exception $e) { 
            return $e->getMessage(); 
        } 
    }

}
