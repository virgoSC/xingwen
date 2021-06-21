<?php

namespace XingWen\Http;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class Request
{
    public function request($url, $param, $method = 'GET'): Response
    {
        try {
            $client = new Client();

            $method = strtolower($method);

            switch ($method) {
                case 'post':
                    $response = $client->post($url, [
                        'json' => $param,
                        'headers' => ['Accept' => 'application/json; charset=UTF-8']
                    ]);
                    break;
                default://get
                    $url .= http_build_query($param);
                    $response = $client->get($url);
                    break;
            }

            return (new Response())
                ->setCode($response->getStatusCode())
                ->setBody($response->getBody()->getContents())
                ->setHeader($response->getHeaders())->resolve();

        } catch (GuzzleException $e) {
            return (new Response())
                ->setCode('500')
                ->setError($e->getMessage());
        }
    }
}
