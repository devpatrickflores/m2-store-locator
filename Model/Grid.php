<?php

/**
 * HH_StoreLocator Module 
 *
 * @category    StoreLocator Functionality
 * @package     HH_StoreLocator
 * @author      Patrick Flores
 *
 */
namespace HH\StoreLocator\Model;

use HH\StoreLocator\Api\Data\GridInterface;

class Grid extends \Magento\Framework\Model\AbstractModel implements GridInterface
{
    /**
     * CMS page cache tag.
     */
    const CACHE_TAG = 'hh_store_locator';

    /**
     * @var string
     */
    protected $_cacheTag = 'hh_store_locator';

    /**
     * Prefix of stores_address events names.
     *
     * @var string
     */
    protected $_eventPrefix = 'hh_store_locator';

    /**
     * Initialize resource stores_address.
     */
    protected function _construct()
    {
        $this->_init('HH\StoreLocator\Model\ResourceModel\Grid');
    }
    /**
     * Get EntityId.
     *
     * @return int
     */
    public function getEntityId()
    {
        return $this->getData(self::ENTITY_ID);
    }

    /**
     * Set EntityId.
     */
    public function setEntityId($entityId)
    {
        return $this->setData(self::ENTITY_ID, $entityId);
    }

    /**
     * Get Stores.
     *
     * @return varchar
     */
    public function getStores()
    {
        return $this->getData(self::MANUFACTURER);
    }

    /**
     * Set Stores.
     */
    public function SetStores($stores_name)
    {
        return $this->setData(self::MANUFACTURER, $stores_name);
    }

    /**
     * Get Model.
     *
     * @return varchar
     */
    public function getStoresName()
    {
        return $this->getData(self::STORESADRESS);
    }

    /**
     * Set Model.
     */
    public function setStoresName($stores_address)
    {
        return $this->setData(self::STORESADRESS, $stores_address);
    }

    /**
     * Get StoresHours.
     *
     * @return varchar
     */
    public function getStoresHours()
    {
        return $this->getData(self::STORESHOURS);
    }

    /**
     * Set StoresHours.
     */
    public function setStoresHours($stores_hours)
    {
        return $this->setData(self::STORESHOURS, $stores_hours);
    }

    /**
     * Get IsActive.
     *
     * @return varchar
     */
    public function getIsActive()
    {
        return $this->getData(self::IS_ACTIVE);
    }

    /**
     * Set IsActive.
     */
    public function setIsActive($isActive)
    {
        return $this->setData(self::IS_ACTIVE, $isActive);
    }

    /**
     * Get UpdateTime.
     *
     * @return varchar
     */
    public function getUpdateTime()
    {
        return $this->getData(self::UPDATE_TIME);
    }

    /**
     * Set UpdateTime.
     */
    public function setUpdateTime($updateTime)
    {
        return $this->setData(self::UPDATE_TIME, $updateTime);
    }

    /**
     * Get CreatedAt.
     *
     * @return varchar
     */
    public function getCreatedAt()
    {
        return $this->getData(self::CREATED_AT);
    }

    /**
     * Set CreatedAt.
     */
    public function setCreatedAt($createdAt)
    {
        return $this->setData(self::CREATED_AT, $createdAt);
    }
}