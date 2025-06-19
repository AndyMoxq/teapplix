<?php
namespace ThankSong\Teapplix\Response;

class DeleteProductsResponse extends Response {
    public function validate() {

    }

    public function getResultMessage(): string {
        $messages = [];
        $products = $this->getBody()['Products'] ?? [];
        foreach ($products as $product) {
            $message = 'Teapplix sku:' . $product['ItemName'] . ',Status: ' . $product['Status'];
            if(isset($product['Message'])){
                $message.=',Message: '. $product['Message'];
            }
            $messages[] = $message;
        }
        return implode("\n", $messages);
    }
}