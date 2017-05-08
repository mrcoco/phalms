<?php
namespace Phalms\Mail;

use Phalcon\Mvc\User\Component;
use Swift_Message as Message;
use Swift_SmtpTransport as Smtp;
use Phalcon\Mvc\View;

/**
 * Phalms\Mail\Mail
 * Sends e-mails based on pre-defined templates
 */
class Mail extends Component
{
    protected $transport;

    protected $amazonSes;

    /**
     * Send a raw e-mail via AmazonSES
     *
     * @param string $raw
     * @return bool
     */
    private function amazonSESSend($raw)
    {
        if ($this->amazonSes == null) {
            $this->amazonSes = new \AmazonSES(
                [
                    'key'    => $this->config->amazon->AWSAccessKeyId,
                    'secret' => $this->config->amazon->AWSSecretKey
                ]
            );
            @$this->amazonSes->disable_ssl_verification();
        }

        $response = $this->amazonSes->send_raw_email(
            [
                'Data' => base64_encode($raw)
            ],
            [
                'curlopts' => [
                    CURLOPT_SSL_VERIFYHOST => 0,
                    CURLOPT_SSL_VERIFYPEER => 0
                ]
            ]
        );

        if (!$response->isOK()) {
            $this->logger->error('Error sending email from AWS SES: ' . $response->body->asXML());
        }

        return true;
    }

    /**
     * Applies a template to be used in the e-mail
     *
     * @param string $name
     * @param array $params
     * @return string
     */
    public function getTemplate($name, $params)
    {
        $parameters = array_merge([
            'publicUrl' => $this->config->application->publicUrl
        ], $params);

        return $this->view->getRender('emailTemplates', $name, $parameters, function ($view) {
            $view->setRenderLevel(View::LEVEL_LAYOUT);
        });

        return $view->getContent();
    }

    public function donationTemplate($name, $params)
    {
        $parameters = array_merge(array(
            'publicUrl' => $this->config->application->publicUrl,
        ), $params);

        $view = $this->getDI()->get('\Phalcon\Mvc\View\Simple');
        $view->setViewsDir(APP_PATH.'/views/layouts/');
        $view->registerEngines(array(
            ".volt" => 'Phalcon\Mvc\View\Engine\Volt'
        ));

        $content = $view->render('email', $parameters);

        return  $content;
    }

    /**
     * Sends e-mails via AmazonSES based on predefined templates
     *
     * @param array $to
     * @param string $subject
     * @param string $name
     * @param array $params
     * @return bool|int
     * @throws Exception
     */
    public function send($to, $subject, $name, $params)
    {


        $template = $this->getTemplate($name, $params);
        //$template = $this->donationTemplate($name, $params);
        // Create the message
        return $this->initialize($to, $subject,$template);
    }

    public function sendDonation($to, $subject, $name, $params)
    {
        $template = $this->donationTemplate($name, $params);

        return $this->initialize($to, $subject,$template);
    }

    public function initialize($to, $subject,$template)
    {
        // Settings
        $mailSettings = $this->config->mail;

        $message = Message::newInstance()
            ->setSubject($subject)
            ->setTo($to)
            ->setFrom([
                $mailSettings->fromEmail => $mailSettings->fromName
            ])
            ->setBody($template, 'text/html');

        if (isset($mailSettings) && isset($mailSettings->smtp)) {

            if (!$this->transport) {
                $this->transport = Smtp::newInstance(
                    $mailSettings->smtp->server,
                    $mailSettings->smtp->port,
                    $mailSettings->smtp->security
                )
                    ->setUsername($mailSettings->smtp->username)
                    ->setPassword($mailSettings->smtp->password)
                    ->setSourceIp('0.0.0.0');
            }
            // Create the Mailer using your created Transport
            $mailer = \Swift_Mailer::newInstance($this->transport);

            return $mailer->send($message);
        } else {
            return $this->amazonSESSend($message->toString());
        }
    }


}
