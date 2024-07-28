<?php
namespace HH\StoreLocator\Api\Data;

interface StoreLocatorInterface
{
    const STORE_ID = 'store_id';
    const STORE_NAME = 'store_name';
    const LATITUDE = 'latitude';
    const LONGITUDE = 'longitude';
    const ADDRESS = 'address';

    public function getStoreId();

    public function getStoreName();

    public function getLatitude();

    public function getLongitude();

    public function getAddress();

    public function setStoreId($storeId);

    public function setStoreName($storeName);

    public function setLatitude($latitude);

    public function setLongitude($longitude);

    public function setAddress($address);
}
