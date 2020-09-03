<?php

namespace MartijnDwars\Omnipay\Buckaroo\Message;

use MartijnDwars\Omnipay\Buckaroo\Message\Request\PurchaseRequest;

/**
 * Buckaroo iDeal Purchase Request
 */
class SepaDirectDebitPurchaseRequest extends PurchaseRequest
{
    public function getData()
    {
    	$method = 'sepadirectdebit';

        $data = parent::getData();
        $data['Brq_payment_method'] = $method;

		$data['Brq_service_' . $method . '_action'] = 'PayRecurrent';

        if ($this->getOriginalTransactionKey()) {
        	$data['Services']['ServiceList'] = [
                [
                    'Name' => 'SepaDirectDebit',
                    'Action' => 'PayRecurrent',
                    'Parameters' => [
                        [
                            'Name' => 'CollectDate',
                            'Value' => date('d-m-Y')
                        ]
                    ]
                ]
            ];
        }

        return $data;        
    }
}
