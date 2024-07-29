<?php
namespace HH\StoreLocator\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use HH\StoreLocator\Model\ResourceModel\Stores\CollectionFactory;

class Index extends Action
{
    protected $resultPageFactory;
    protected $storeCollectionFactory;

    public function __construct(
        Context $context,
        PageFactory $resultPageFactory,
        CollectionFactory $storeCollectionFactory
    ) {
        $this->resultPageFactory = $resultPageFactory;
        $this->storeCollectionFactory = $storeCollectionFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $resultPage = $this->resultPageFactory->create();
        $stores = $this->storeCollectionFactory->create();
        $block = $resultPage->getLayout()->getBlock('store.locator');
        if ($block) {
            $block->setData('stores', $stores);
        } else {
            throw new \Exception('Block not found');
        }

        return $resultPage;
    }
}
