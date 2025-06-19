<?php
namespace ThankSong\Teapplix\Request;
use ThankSong\Teapplix\Response\GetProductsResponse;

class GetProductsRequest extends Client{

    public const URI = '/Product';
    public const DEFAULT_PAGE_SIZE = 100;

    public const DEFAULT_PAGE = 1;
    
    public function __construct(){
        parent::__construct();
        $this->setApiUri(self::URI);
        $this->setPageSize(self::DEFAULT_PAGE_SIZE);
        $this->setPage(self::DEFAULT_PAGE);
    }


    public function validate(){
      //
    }

    public function setPage(int $page){
        $this -> setCondition('PageNumber', $page);
        return $this;
    }

    public function setPageSize(int $size){
        $this -> setCondition('PageSize', $size);
        return $this;
    }

    public function setTeapplixSku(string $teapplix_sku){
        $this -> setCondition('ItemName', $teapplix_sku);
        return $this;
    }
}