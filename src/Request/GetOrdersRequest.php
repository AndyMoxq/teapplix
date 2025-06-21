<?php
namespace ThankSong\Teapplix\Request;

class GetOrdersRequest extends Client
{
    public const URI = '/OrderNotification';
    public function __construct(){
        parent::__construct();
        $this->setApiUri(self::URI);
    }
    public function validate(){
        //
    }

    
}