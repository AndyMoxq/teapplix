<?php
namespace ThankSong\Teapplix\Response;

class GetOrdersResponse extends Response {
    public function validate() {
        
    }

    public function getOrders(): array {
        return $this->body['Orders'] ?? [];
    }

    public function getTotalPages(): int {
        return $this->body['Pagination']['TotalPages'] ?? 0;
    }

    public function getCurrentPage(): int {
        return $this->body['Pagination']['PageNumber'] ?? 0;
    }

    public function getPageSize(): int {
        return $this->body['Pagination']['PageSize'] ?? 0;
    }

    public function hasMore(): bool{
        return $this->getCurrentPage() < $this->getTotalPages();
    }
}