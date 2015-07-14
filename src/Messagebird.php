<?php

namespace Bjrnblm\Messagebird;

class Messagebird
{

    public $client;

    /**
     *
     */
    public function __construct(\MessageBird\Client $client)
    {
        $this->client = $client;
    }

    /**
     *
     */
    public function getBalance()
    {
        try {
            return $this->client->balance->read();
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
            return $this->client->messages->voicemessages($voiceMessage);
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
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

}
