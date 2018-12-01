<?php 

class AlertBanner{

    private $allowedAlertTypes = array('success', 'warning', 'error');
    
    private $alertType, $alertMessage, $alertHtml;


    public function __construct($alertType, $alertMessage = null){
        if (!empty($alertType) && (in_array($alertType, $this->allowedAlertTypes))){
            $this->alertType = $alertType;
        }

        if ( !is_null($alertMessage) && (is_string($alertMessage)) ){
            $this->alertMessage = $alertMessage;
        }
    }

    public function getAlertBannerHtml(){
        $this->alertHtml = '';
        if ( isset($this->alertType) && (isset($this->alertMessage)) ){
            switch ($this->alertType){
                case 'success':
                    $this->alertHtml = '<div class="alert alert-success alert-dismissible" role="alert">';
                    $this->alertHtml .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
                    $this->alertHtml .= $this->alertMessage . '</div>';
                    break;
                
                case 'warning':
                    $this->alertHtml = '<div class="alert alert-warning alert-dismissible" role="alert">';
                    $this->alertHtml .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
                    $this->alertHtml .= $this->alertMessage . '</div>';
                    break;
                
                case 'error':
                    $this->alertHtml = '<div class="alert alert-danger alert-dismissible" role="alert">';
                    $this->alertHtml .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
                    $this->alertHtml .= $this->alertMessage . '</div>';
                    break;
            }
        }

        return $this->alertHtml;
    }

    public function setAlertMessage($alertMessage){
        if (isset($alertMessage) && (is_string($alertMessage)) ){
            $this->alertMessage = $alertMessage;
        }
    }
}




?>