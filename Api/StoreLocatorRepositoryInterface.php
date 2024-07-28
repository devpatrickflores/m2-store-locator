<?php
namespace HH\StoreLocator\Api;

use HH\StoreLocator\Api\Data\StoreLocatorInterface;
use Magento\Framework\Api\SearchCriteriaInterface;

interface StoreLocatorRepositoryInterface
{
    /**
     * Save store locator data.
     *
     * @param StoreLocatorInterface $storeLocator
     * @return StoreLocatorInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(StoreLocatorInterface $storeLocator);

    /**
     * Retrieve store locator data by ID.
     *
     * @param int $storeId
     * @return StoreLocatorInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getById($storeId);

    /**
     * Retrieve store locator data matching the specified criteria.
     *
     * @param SearchCriteriaInterface $searchCriteria
     * @return \HH\StoreLocator\Api\Data\StoreLocatorSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(SearchCriteriaInterface $searchCriteria);

    /**
     * Delete store locator.
     *
     * @param StoreLocatorInterface $storeLocator
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(StoreLocatorInterface $storeLocator);

    /**
     * Delete store locator by ID.
     *
     * @param int $storeId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($storeId);
}
