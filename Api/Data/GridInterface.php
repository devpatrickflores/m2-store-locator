<?php
/**
 * HH_StoreLocator Module 
 *
 * @category    StoreLocator Functionality
 * @package     HH_StoreLocator
 * @author      Patrick Flores
 *
 */
namespace HH\StoreLocator\Api\Data;

interface GridInterface
{
    /**
     * Constants for keys of data array. Identical to the name of the getter in snake case.
     */
    const ENTITY_ID = 'entity_id';
    const MANUFACTURER = 'stores_name';
    const STORESADRESS = 'stores_address';
    const STORESHOURS = 'stores_hours';
    const IS_ACTIVE = 'is_active';
    const UPDATE_TIME = 'update_time';
    const CREATED_AT = 'created_at';

    /**
     * Get EntityId.
     *
     * @return int
     */
    public function getEntityId();

    /**
     * Set EntityId.
     */
    public function setEntityId($entityId);

    /**
     * Get Stores.
     *
     * @return varchar
     */
    public function getStores();

    /**
     * Set Stores.
     */
    public function setStores($stores_name);

    /**
     * Get Model.
     *
     * @return varchar
     */
    public function getStoresName();

    /**
     * Set Model.
     */
    public function setStoresName($stores_address);

    /**
     * Get StoresHours.
     *
     * @return varchar
     */
    public function getStoresHours();

    /**
     * Set StoresHours.
     */
    public function setStoresHours($stores_hours);

    /**
     * Get IsActive.
     *
     * @return varchar
     */
    public function getIsActive();

    /**
     * Set StartingPrice.
     */
    public function setIsActive($isActive);

    /**
     * Get UpdateTime.
     *
     * @return varchar
     */
    public function getUpdateTime();

    /**
     * Set UpdateTime.
     */
    public function setUpdateTime($updateTime);

    /**
     * Get CreatedAt.
     *
     * @return varchar
     */
    public function getCreatedAt();

    /**
     * Set CreatedAt.
     */
    public function setCreatedAt($createdAt);
}