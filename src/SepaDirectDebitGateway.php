<?php

namespace MartijnDwars\Omnipay\Buckaroo;

/**
 * Buckaroo iDeal Gateway
 */
class SepaDirectDebitGateway extends Gateway
{
    public function getName()
    {
        return 'Buckaroo SepaDirectDebit';
    }

    public function purchase(array $parameters = array())
    {
        return $this->createRequest('\MartijnDwars\Omnipay\Buckaroo\Message\SepaDirectDebitPurchaseRequest', $parameters);
    }
}
