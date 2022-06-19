<?php

namespace Srmklive\PayPal\Tests;

use Psr\Http\Message\ResponseInterface;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

trait MockClientClasses
{
    private function mock_http_request($expectedResponse, $expectedEndpoint, $expectedParams, $expectedMethod = 'post')
    {
        $set_method_name = 'setMethods';
        if (function_exists('onlyMethods')) {
            $set_method_name = 'onlyMethods';
        }

        $mockResponse = $this->getMockBuilder(ResponseInterface::class)
            ->getMock();
        $mockResponse->expects($this->exactly(1))
            ->method('getBody')
            ->willReturn($expectedResponse);

        $mockHttpClient = $this->getMockBuilder(HttpClient::class)
            ->{$set_method_name}([$expectedMethod])
            ->getMock();
        $mockHttpClient->expects($this->once())
            ->method($expectedMethod)
            ->with($expectedEndpoint, $expectedParams)
            ->willReturn($mockResponse);

        return $mockHttpClient;
    }

    private function mock_client($expectedResponse, $expectedMethod, $expectedParams, $token = false)
    {
        $set_method_name = 'setMethods';
        if (function_exists('onlyMethods')) {
            $set_method_name = 'onlyMethods';
        }

        $methods = [$expectedMethod];
        if ($token) {
            $methods[] = 'getAccessToken';
        }

        $mockClient = $this->getMockBuilder(PayPalClient::class)
            ->setConstructorArgs($expectedParams)
            ->{$set_method_name}($methods)
            ->getMock();

        if ($token) {
            $mockClient->expects($this->exactly(1))
                ->method('getAccessToken');
        }

        $mockClient->expects($this->exactly(1))
            ->method($expectedMethod)
            ->willReturn($expectedResponse);

        return $mockClient;
    }

    private function getCredentials()
    {
        return [
            'mode'    => 'sandbox',
            'sandbox' => [
                'client_id'     => 'some-client-id',
                'client_secret' => 'some-access-token',
                'app_id'        => '',
            ],
            'payment_action' => 'Sale',
            'currency'       => 'USD',
            'notify_url'     => '',
            'locale'         => 'en_US',
            'validate_ssl'   => true,
        ];
    }
}
