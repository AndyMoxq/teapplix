<?php
namespace ThankSong\Teapplix\Response;

class GetProductsResponse extends Response {
    public function validate() {
        
    }

    public function getData(): array {
        return $this->body['Products'] ?? [];
    }

    public function getPage(): int {
        return $this->getBody()['Pagination']['PageNumber'] ?? 1;
    }

    public function getPageSize(): int {
        return $this->getBody()['Pagination']['PageSize'] ?? 100;
    }
}