<?php

/**
 * HH_StoreLocator Module 
 *
 * @category    StoreLocator Functionality
 * @package     HH_StoreLocator
 * @author      Patrick Flores
 *
 */
namespace HH\StoreLocator\Model\ResourceModel\Grid;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    /**
     * @var string
     */
    protected $_idFieldName = 'entity_id';
    /**
     * Define resource stores_address.
     */
    protected function _construct()
    {
        $this->_init('HH\StoreLocator\Model\Grid', 'HH\StoreLocator\Model\ResourceModel\Grid');
    }
}
