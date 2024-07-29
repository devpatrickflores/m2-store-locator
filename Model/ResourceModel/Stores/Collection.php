<?php
namespace HH\StoreLocator\Model\ResourceModel\Stores;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected function _construct()
    {
        $this->_init('HH\StoreLocator\Model\Stores', 'HH\StoreLocator\Model\ResourceModel\Stores');
    }
}