<?php

namespace HH\StoreLocator\Model;

use Magento\Framework\Model\AbstractModel;

class Stores extends AbstractModel
{
    protected function _construct()
    {
        $this->_init('HH\StoreLocator\Model\ResourceModel\Stores');
    }
}
