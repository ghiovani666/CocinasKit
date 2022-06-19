<?php

namespace Srmklive\PayPal\Tests\Adapter;

use PHPUnit\Framework\TestCase;
use Srmklive\PayPal\Tests\MockClientClasses;

class PaymentCapturesTest extends TestCase
{
    use MockClientClasses;

    /** @test */
    public function it_can_show_details_for_a_captured_payment()
    {
        $expectedResponse = \GuzzleHttp\json_decode('{
  "id": "2GG279541U471931P",
  "status": "COMPLETED",
  "status_details": {},
  "amount": {
    "total": "10.99",
    "currency": "USD"
  },
  "final_capture": true,
  "seller_protection": {
    "status": "ELIGIBLE",
    "dispute_categories": [
      "ITEM_NOT_RECEIVED",
      "UNAUTHORIZED_TRANSACTION"
    ]
  },
  "seller_receivable_breakdown": {
    "gross_amount": {
      "total": "10.99",
      "currency": "USD"
    },
    "paypal_fee": {
      "value": "0.33",
      "currency": "USD"
    },
    "net_amount": {
      "value": "10.66",
      "currency": "USD"
    }
  },
  "invoice_id": "INVOICE-123",
  "create_time": "2017-09-11T23:24:01Z",
  "update_time": "2017-09-11T23:24:01Z",
  "links": [
    {
      "href": "https://api.paypal.com/v2/payments/captures/2GG279541U471931P",
      "rel": "self",
      "method": "GET"
    },
    {
      "href": "https://api.paypal.com/v2/payments/captures/2GG279541U471931P/refund",
      "rel": "refund",
      "method": "POST"
    },
    {
      "href": "https://api.paypal.com/v2/payments/authorizations/0VF52814937998046",
      "rel": "up",
      "method": "GET"
    }
  ]
}', true);

        $expectedMethod = 'showCapturedPaymentDetails';

        $mockClient = $this->mock_client($expectedResponse, $expectedMethod, $this->getCredentials(), true);

        $mockClient->getAccessToken();

        $this->assertEquals($expectedResponse, $mockClient->{$expectedMethod}('2GG279541U471931P'));
    }

    /** @test */
    public function it_can_refund_a_captured_payment()
    {
        $expectedResponse = \GuzzleHttp\json_decode('{
  "id": "1JU08902781691411",
  "status": "COMPLETED",
  "links": [
    {
      "rel": "self",
      "method": "GET",
      "href": "https://api.paypal.com/v2/payments/refunds/1JU08902781691411"
    },
    {
      "rel": "up",
      "method": "GET",
      "href": "https://api.paypal.com/v2/payments/captures/2GG279541U471931P"
    }
  ]
}', true);

        $expectedMethod = 'refundCapturedPayment';

        $mockClient = $this->mock_client($expectedResponse, $expectedMethod, $this->getCredentials(), true);

        $mockClient->getAccessToken();

        $this->assertEquals($expectedResponse, $mockClient->{$expectedMethod}(
            '2GG279541U471931P',
            'INVOICE-123',
            10.99,
            'Defective product'
        ));
    }
}
