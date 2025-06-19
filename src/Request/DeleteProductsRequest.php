<?php
namespace ThankSong\Teapplix\Request;

class DeleteProductsRequest extends Client{
    public const URI = '/Product';
    public function __construct(){
        parent::__construct();
        $this->setApiUri(self::URI);
    }

    public function validate(){
        //
    }

    public function setSkuList(array $teapplix_sku_list): static{
        $this->setBody(['Products'=>$teapplix_sku_list]);
        return $this;
    }

    public function setSku(string $teapplix_sku): static{
        $this->setBody(['Products'=>[$teapplix_sku]]);
        return $this;
    }
}