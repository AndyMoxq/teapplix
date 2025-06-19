<?php
return [


    /*
    |--------------------------------------------------------------------------
    | Api Token
    |--------------------------------------------------------------------------
    |
    | This is the API token used to authenticate with the Teapplix API.
    |
    */
    'api_token'=>env('TEAPPLIX_API_TOKEN','YOUR-API-TOKEN-HERE'),


    /*
    |--------------------------------------------------------------------------
    | API Base URL
    |--------------------------------------------------------------------------
    |
    | This URL is the base endpoint used to communicate with the remote
    | ocean tracking API service. Ensure the URL is correct and accessible.
    |
    */
    'base_url'=>'https://api.teapplix.com/api2'
];