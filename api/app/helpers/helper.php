<?php

use Illuminate\Support\Facades\Http;

// Get Data From Api (GET)
function getDataFromApi($url)
{
    $response = Http::get($url);

    $data = json_decode($response->body(), true);

    return $data;
}


// Get Data From Api (POST)
function postDataToApi($url, $data)
{
    $response = Http::withHeaders([
        'Content-Type' => 'application/json',
    ])->post($url, $data);

    return $response->json();
}
