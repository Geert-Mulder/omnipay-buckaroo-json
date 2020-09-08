<?php

namespace MartijnDwars\Omnipay\Buckaroo;

/**
 * Buckaroo iDeal Gateway
 */
class IdealGateway extends Gateway
{
    public function getName()
    {
        return 'Buckaroo iDeal';
    }

    public function purchase(array $parameters = array())
    {
        return $this->createRequest('\MartijnDwars\Omnipay\Buckaroo\Message\IdealPurchaseRequest', $parameters);
    }
}

