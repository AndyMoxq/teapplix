<?php
namespace ThankSong\Teapplix\Response;

abstract class Response {
    protected $body;
    public function __construct(array $body) {
        $this->body = $body;
        $this->validate();
    }

    public static function fromArray(array $body): Response {
        return new static($body);
    }

    public function getBody(): array {
        return $this->body;
    }

    abstract public function validate();
}