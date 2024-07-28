<?php

namespace HH\StoreLocator\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Stores extends AbstractDb
{
    protected function _construct()
    {
        $this->_init('hh_store_locator', 'store_id');
    }
}
