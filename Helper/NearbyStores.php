<?php
namespace HH\StoreLocator\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Framework\App\Helper\Context;
use Magento\Framework\HTTP\Client\Curl;

class NearbyStores extends AbstractHelper
{
    const GOOGLE_PLACES_API_URL = 'https://maps.googleapis.com/maps/api/place/nearbysearch/json';
    const GOOGLE_API_KEY = 'AIzaSyDfPdThC9bAVP590qpYhG4cehinkPiT_Uw';

    protected $curlClient;

    public function __construct(
        Context $context,
        Curl $curlClient
    ) {
        $this->curlClient = $curlClient;
        parent::__construct($context);
    }

    public function getDistance($latitude, $longitude, $radius)
    {
        $apiKey = self::GOOGLE_API_KEY;
        $url = sprintf(
            '%s?location=%s,%s&radius=%d&type=store&key=%s',
            self::GOOGLE_PLACES_API_URL,
            $latitude,
            $longitude,
            $radius,
            $apiKey
        );

        $this->curlClient->get($url);
        $response = $this->curlClient->getBody();
        $data = json_decode($response, true);

        if (isset($data['results'])) {
            return $data['results'];
        }

        return [];
    }
}
