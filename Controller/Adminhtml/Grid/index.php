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

class Index extends \Magento\Backend\App\Action
{
    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $_resultPageFactory;

    /**
     * @param \Magento\Backend\App\Action\Context        $context
     * @param \Magento\Framework\View\Result\PageFactory $resultPageFactory
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory
    ) 
    {
        parent::__construct($context);
        $this->_resultPageFactory = $resultPageFactory;
    }

    /**
     * Store Locator page.
     *
     * @return \Magento\Backend\Model\View\Result\Page
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->_resultPageFactory->create();
        $resultPage->setActiveMenu('HH_StoreLocator::grid_list');
        $resultPage->getConfig()->getTitle()->prepend(__('Store Locator'));

        return $resultPage;
    }

    /**
     * Check Store Locator Permission.
     *
     * @return bool
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('HH_StoreLocator::grid_list');
    }
}