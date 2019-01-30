<?php 
require_once $_SERVER['DOCUMENT_ROOT'] . '/mailjet/vendor/autoload.php';
use \Mailjet\Resources;

class Email{
    private $emailRecipient = 'huyqle93@gmail.com', $emailSubject, $emailBody;
    private $senderEmail = 'support@oobarloungeny.com';

    // private $standardRecipient = 'huyqle93@gmail.com';
    // Kevin.le@theone-ny.com

    private $mailJetPrivateKey = 'c9fe62380688fb2acc0fca73999fe2b5';
    private $mailJetPublicKey = '5c1d8bc18a7b60e74b05d3761b174386';

    public function __construct(){
    }

    public function setEmailRecipient($emailRecipient){
        if (filter_var($emailRecipient, FILTER_VALIDATE_EMAIL)){
            $this->emailRecipient = $emailRecipient;
        } else {
            return false;
        }
    }

    public function setEmailSubject($emailSubject){
        if (is_string($emailSubject)){
            $this->emailSubject = $emailSubject;
        }
    }

    public function setEmailBody($emailBody){
        if (is_string($emailBody)){
            $this->emailBody = $emailBody;
        }
    }

    public function contactFormSubmissionAlert($contactFormName, $contactFormEmail, $contactFormMessage, $contactFormTimestamp){

        $mailJet = new \Mailjet\Client($this->mailJetPublicKey, $this->mailJetPrivateKey, true, ['version' => 'v3.1']);

        $body = [
            'Messages' => [
                'From' => [
                    'Email' => $this->senderEmail,
                    'NMame' => 'Oo Bar and Lounge Support'
                ],
                'To' => [
                    [
                        'Email' => $this->emailRecipient,
                        'Name' => 'Huy Le'
                    ]
                ],
                'Subject' => 'New contact form submission',
                'TextPart' => 'You have 1 new contact form submission from ...'
            ]
        ];
    }

}

?>