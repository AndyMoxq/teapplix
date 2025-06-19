<?php

namespace ThankSong\Teapplix\Request;
use Illuminate\Support\Facades\Http;

abstract class Client {
    protected $api_token;
    protected $base_url;
    protected $api_uri;
    protected $body=[];

    public function __construct(){
        $this->api_token = config('teapplix.api_token','YOUR_API_TOKEN');
        $this->base_url = config('teapplix.base_url','https://api.teapplix.com/v2');
    }

    public function setBaseUrl($base_url): static {
        $base_url = rtrim($base_url,'/');
        $this->base_url = $base_url;
        return $this;
    }

    public function getBaseUrl(): string {
        return $this->base_url;
    }

    public function getApiToken(): string {
        return $this->api_token;
    }

    public function setApiToken($api_token): static {
        $this->api_token = $api_token;
        return $this;
    }

    public function setApiUri(string $uri){
        $this->api_uri = $uri;
        return $this;
    }

    private function getFullUrl(): string{
        //去除api_uri 最前面的/
        $this->api_uri = ltrim($this->api_uri,'/');
        //拼接完整url
        return "{$this->base_url}/{$this->api_uri}";
    }

    public function setBody(array $body): static {
        $this->body = $body;
        return $this;
    }

    public function getBody(): array {
        return $this->body;
    }

    public function get(): array{
        $this -> validate();
        $url = $this->getFullUrl();
        $headers = $this->buildHeaders();
        $res = Http::withHeaders($headers)->get($url,$this->getBody());
        if(!$res -> ok()){
            throw new \Exception("请求失败，状态码：{$res -> status()}，响应内容：{$res -> body()}");
        }
        return $res -> json();
    }

    public function post(): array{
        $this -> validate();
        $url = $this->getFullUrl();
        $headers = $this->buildHeaders();
        $res = Http::withHeaders($headers)->post($url,$this->getBody());
        if(!$res -> ok()){
            throw new \Exception("请求失败，状态码：{$res -> status()}，响应内容：{$res -> body()}");
        }
        return $res -> json();
    }

    public function put(): array{
        $this -> validate();
        $url = $this->getFullUrl();
        $headers = $this->buildHeaders();
        $res = Http::withHeaders($headers)->put($url,$this->getBody());
        if(!$res -> ok()){
            throw new \Exception("请求失败，状态码：{$res -> status()}，响应内容：{$res -> body()}");
        }
        return $res -> json();
    }

    public function delete(): array{
        $url = $this->getFullUrl();
        $headers = $this->buildHeaders();
        $this -> validate();
        $res = Http::withHeaders($headers)->delete($url,$this->getBody());
        if(!$res -> ok()){
            throw new \Exception("请求失败，状态码：{$res -> status()}，响应内容：{$res -> body()}");
        }
        return $res -> json();
    }

    private function buildHeaders(): array {
        return [
            'APIToken'=>$this -> getApiToken(),
            'Content-Type' => 'application/json'
        ];
    }

    public function setCondition($key, $value): static{
        $this->body[$key] = $value;
        return $this;
    }

    abstract public function validate();


}