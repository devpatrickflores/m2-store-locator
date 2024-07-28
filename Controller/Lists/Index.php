<?php

namespace HH\StoreLocator\Controller\Lists;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use HH\StoreLocator\Model\ResourceModel\Stores\CollectionFactory;
use Magento\Framework\Controller\Result\JsonFactory;

class Index extends Action
{
    protected $collectionFactory;
    protected $resultJsonFactory;

    public function __construct(
        Context $context,
        CollectionFactory $collectionFactory,
        JsonFactory $resultJsonFactory
    ) {
        $this->collectionFactory = $collectionFactory;
        $this->resultJsonFactory = $resultJsonFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $collection = $this->collectionFactory->create();
        $storeData = [];

        foreach ($collection as $store) {
            $storeData[] = [
                'store_name' => $store->getStoreName(),
                'latitude' => $store->getLatitude(),
                'longitude' => $store->getLongitude(),
                'address' => $store->getAddress(),
                'opening_hours' => $store->getOpeningHours(),
                'contact_number' => $store->getContactNumber(),
                'store_description' => $store->getStoreDescription(),
                'store_image' => $store->getStoreImage()
            ];
        }

        /** @var \Magento\Framework\Controller\Result\Json $resultJson */
        $resultJson = $this->resultJsonFactory->create();
        return $resultJson->setData($storeData);
    }
}
