<?php

namespace HH\StoreLocator\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Controller\Result\RedirectFactory;
use Magento\Framework\Message\ManagerInterface;
use Magento\Framework\DB\Adapter\AdapterInterface;
use Magento\Framework\DB\Select;

class View extends Action
{
    protected $resultPageFactory;
    protected $connection;
    protected $messageManager;

    public function __construct(
        Context $context,
        PageFactory $resultPageFactory,
        \Magento\Framework\App\ResourceConnection $resource,
        RedirectFactory $resultRedirectFactory,
        ManagerInterface $messageManager
    ) {
        $this->resultPageFactory = $resultPageFactory;
        $this->connection = $resource->getConnection();
        $this->messageManager = $messageManager;
        parent::__construct($context);
    }

    public function execute()
    {
        $entityId = (int)$this->getRequest()->getParam('id');
        if (!$entityId) {
            $this->messageManager->addErrorMessage(__('Store not found'));
            return $this->resultRedirectFactory->create()->setPath('stores');
        }

        try {
            $store = $this->getStoreById($entityId);
            if (!$store) {
                throw new NoSuchEntityException(__('Store not found'));
            }

            $resultPage = $this->resultPageFactory->create();
            $resultPage->getConfig()->getTitle()->set($store['stores_name']);
            $resultPage->getLayout()->getBlock('store.locator.info')->setData('stores', $store);

            return $resultPage;
        } catch (NoSuchEntityException $e) {
            $this->messageManager->addErrorMessage(__('Store not found'));
            return $this->resultRedirectFactory->create()->setPath('stores');
        }
    }

    protected function getStoreById($entityId)
    {
        $select = $this->connection->select()
            ->from($this->connection->getTableName('hh_store_locator'))
            ->where('entity_id = ?', $entityId);

        return $this->connection->fetchRow($select);
    }
}
