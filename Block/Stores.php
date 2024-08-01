<?php
namespace HH\StoreLocator\Block;

use Magento\Framework\View\Element\Template;
use HH\StoreLocator\Model\ResourceModel\Stores\CollectionFactory as StoresCollectionFactory;

class Stores extends Template
{
    protected $_template = 'HH_StoreLocator::storelocator.phtml';
    protected $storeCollectionFactory;

    public function __construct(
        Template\Context $context,
        StoresCollectionFactory $storeCollectionFactory,
        array $data = []
    ) {
        $this->storeCollectionFactory = $storeCollectionFactory;
        parent::__construct($context, $data);
    }

    public function getNearbyStores()
    {
        $storeCollection = $this->storeCollectionFactory->create();

        $storeCollection->addFieldToFilter('is_active', 1);

        return $storeCollection;
    }

    protected function getStoreById($entityId)
    {
        $select = $this->storeCollectionFactory->create()->getSelect();
        $select->where('entity_id = ?', $entityId);
        $result = $this->storeCollectionFactory->create()->getConnection()->fetchRow($select);

        return $result;
    }
}
