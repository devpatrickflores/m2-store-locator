<?php

/**
 * HH_StoreLocator Module 
 *
 * @category    StoreLocator Functionality
 * @package     HH_StoreLocator
 * @author      Patrick Flores
 *
 */
namespace HH\StoreLocator\Controller\Adminhtml\Grid;

class Save extends \Magento\Backend\App\Action
{
    /**
     * @var \HH\StoreLocator\Model\GridFactory
     */
    var $gridFactory;

    /**
     * @param \Magento\Backend\App\Action\Context $context
     * @param \HH\StoreLocator\Model\GridFactory $gridFactory
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \HH\StoreLocator\Model\GridFactory $gridFactory
    ) {
        parent::__construct($context);
        $this->gridFactory = $gridFactory;
    }

    /**
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     * @SuppressWarnings(PHPMD.NPathComplexity)
     */
    public function execute()
    {
        $data = $this->getRequest()->getPostValue();
        if (!$data) {
            $this->_redirect('grid/grid/addrow');
            return;
        }
        try {
            $rowData = $this->gridFactory->create();
            $rowData->setData($data);
            if (isset($data['id'])) {
                $rowData->setEntityId($data['id']);
            }
            $rowData->save();
            $this->messageManager->addSuccess(__('Store has been successfully added.'));
        } catch (\Exception $e) {
            $this->messageManager->addError(__($e->getMessage()));
        }
        $this->_redirect('grid/grid/index');
    }

    /**
     * @return bool
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('HH_StoreLocator::save');
    }
}