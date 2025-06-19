<?php
namespace ThankSong\Teapplix\Request;
use ThankSong\Teapplix\Response\CreateProductsResponse;

class CreateProductsRequest extends Client{
    public const URI = '/Product';
    public function __construct(){
        parent::__construct();
        $this -> setApiUri(self::URI);
    }

    public function validate(){
      //
    }

    public function addProduct(array $product){
        $products = $this->getBody()['Products'] ?? [];
        $products[] = $product;
        $this->setBody(['Products' => $products]);
        return $this;
    }
}