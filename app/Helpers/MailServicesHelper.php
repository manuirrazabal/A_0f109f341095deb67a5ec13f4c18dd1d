<?php

namespace App\Helpers;

use App;
use Carbon\Carbon;
use Guzzle\Service\Resource;
use Illuminate\Support\Facades\Mail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;

class MailServicesHelper extends Mailable implements ShouldQueue
{
    /**
     * Method Implements.
     *
     */
    use Queueable;

    /**
     * Protected attributes.
     *
     * @var array
     */
    protected $parameters;

    /**
     * Contructor
     */
    public function __construct()
    {
        //
    }

    /*
    |------------------------------------------------
    | Methods To send Mails
    |------------------------------------------------
    */

    /**
     * PROCESS Mail variables and send by queue or directly.
     *
     * @param array parameters_input
     * @param Boolean queue
     *
     */
    public function sendMail($parameters_input = [], $queue = false)
    {
        $queueType = env('MAIL_QUEUE');

        // Set default parametars
        $parameters_default = array (
            'from'           => env("MAIL_FROM_ADDRESS", "no-reply@inbox.mailtrap.io"),
            'to'             => [],
            'cc'             => [],
            'bcc'            => [],
            'type'           => '',
            'content'        => [],
            'template'       => 'emails.notifications',
            'attach'         => [],
            'subject'        => 'Anuncios Notificaciones',
            'queue_active'   => $queue,
            'queue'          => isset($queueType)?$queueType:'redis',
        );

        // Merge default and input parametars
        $this->parameters = array_merge($parameters_default, $parameters_input);
        $this->buildMail();
        return true;
    }

    /**
     * BUILD MAIL this function basically create the new function
     * call the method MAIL.
     *
     * @param parameters (Consume Protected parameters)
     *
     */
    public function buildMail()
    {
        //If Queue Active is true, Send Mail as a queue.
        if ($this->parameters['queue_active']) {
            return Mail::queue($this->build());
        } else {
            return Mail::send($this->build());
        }
    }

    /**
     * BUILD MAILABLE this function build the mail Object
     *
     * @param parameters (Consume Protected parameters)
     *
     */
    public function build()
    {
        //Build Mailable Object

        //From
        $object = $this->from($this->parameters['from']);

        //To
        $object->to($this->parameters['to']);

        //Cc
        $object->cc($this->parameters['cc']);

        //BCC
        $object->bcc($this->parameters['bcc']);

        //Subject
        $object->subject($this->parameters['subject']);

        // Checking HTML or TEXT
        if (isset($this->parameters['type']) && $this->parameters['type'] == 'plain') {
            $object->text($this->parameters['template'].'_plain');
        } else {
            $object->view($this->parameters['template']);
        }

        //Content of the view
        $object->with($this->parameters['content']);

        //Put the Mail on queue if queue_active is set up.
        if ($this->parameters['queue_active']) {
            $object->onQueue($this->parameters['queue']);
        }

        if (count($this->parameters['attach'])) {
            $object->attach($this->parameters['attach']);
        }

        return $object;
    }
}
