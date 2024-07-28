<?php

namespace HH\StoreLocator\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use HH\StoreLocator\Model\ResourceModel\Stores\CollectionFactory;
use Magento\Framework\View\Result\PageFactory;

class Index extends Action
{
    protected $collectionFactory;
    protected $resultPageFactory;

    public function __construct(Context $context, CollectionFactory $collectionFactory, PageFactory $resultPageFactory)
    {
        $this->collectionFactory = $collectionFactory;
        $this->resultPageFactory = $resultPageFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $resultPage = $this->resultPageFactory->create();
        // $this->getResponse()->setBody(json_encode($storeData));
        return $resultPage;
    }
}