<?php
namespace HH\StoreLocator\Block;

use Magento\Framework\View\Element\Template;
use HH\StoreLocator\Model\ResourceModel\Stores\CollectionFactory as StoresCollectionFactory;

class Stores extends \Magento\Framework\View\Element\Template
{
    protected $storesCollectionFactory;

    public function __construct(
        Template\Context $context,
        StoresCollectionFactory $storesCollectionFactory,
        array $data = []
    ) {
        $this->StoresCollectionFactory = $storesCollectionFactory;
        parent::__construct($context, $data);
    }

    public function getStoreLocatorCollection()
    {
        return $this->StoresCollectionFactory->create()->getItems();
    }
}
