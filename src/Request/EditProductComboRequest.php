<?php

namespace ThankSong\Teapplix\Request;

class EditProductComboRequest extends Client {
    public const URI = '/ProductCombo';
    public function __construct() {
        parent::__construct();
        $this->setApiUri(self::URI);
    }

    public function validate(){

    }

    public function setComboProudct(array $combo_product){
        $this->setBody($combo_product);
    }
}