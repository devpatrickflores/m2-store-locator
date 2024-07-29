<?php
namespace HH\StoreLocator\Block;

use Magento\Framework\View\Element\Template;

class Stores extends Template
{
    protected $_template = 'HH_StoreLocator::storelocator.phtml';

    public function getStores()
    {
        return $this->getData('stores');
    }
}