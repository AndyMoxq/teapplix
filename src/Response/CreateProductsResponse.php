<?php
namespace ThankSong\Teapplix\Response;

class CreateProductsResponse extends Response {
    public function validate() {

    }

    public function getSuccessSkuList(): array {
        $skuList = [];
        $products = $this->getBody()['Products'] ?? [];
        foreach ($products as $product) {
            if($product['Status'] == 'Success'){
                $skuList[] = $product['ItemName'];
            }
        }
        return $skuList;
    }

    public function getFailedSkuList(): array {
        $skuList = [];
        $products = $this->getBody()['Products'] ?? [];
        foreach ($products as $product) {
            if($product['Status'] == 'Failure'){
                $skuList[] = $product['ItemName'];
            }
        }
        return $skuList;
    }

    public function getResultMessage(): string {
        $messages = [];
        $products = $this->getBody()['Products'] ?? [];
        foreach ($products as $product) {
            $message = 'ItemName:'.$product['ItemName'] . ', Status:' . $product['Status'];
            if(isset($product['Message'])){
                $message.= ', Message:' . $product['Message'];
            }
            $messages[] = $message;
        }
        return implode("\n", $messages);
    }
}