<?php
/**
 * HH_StoreLocator Module 
 *
 * @category    StoreLocator Functionality
 * @package     HH_StoreLocator
 * @author      Patrick Flores
 *
 */
namespace HH\StoreLocator\Block\Adminhtml\Grid\Edit;


/**
 * Adminhtml Add New Row Form.
 */
class Form extends \Magento\Backend\Block\Widget\Form\Generic
{
    /**
     * @var \Magento\Store\Model\System\Store
     */
    protected $_systemStore;

    /**
     * @param \Magento\Backend\Block\Template\Context $context
     * @param \Magento\Framework\Registry             $registry
     * @param \Magento\Framework\Data\FormFactory     $formFactory
     * @param array                                   $data
     */
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\Data\FormFactory $formFactory,
        \Magento\Cms\Model\Wysiwyg\Config $wysiwygConfig,
        \HH\StoreLocator\Model\Status $options,
        array $data = []
    ) 
    {
        $this->_options = $options;
        $this->_wysiwygConfig = $wysiwygConfig;
        parent::__construct($context, $registry, $formFactory, $data);
    }

    /**
     * Prepare form.
     *
     * @return $this
     */
    protected function _prepareForm()
    {
        $dateFormat = $this->_localeDate->getDateFormat(\IntlDateFormatter::SHORT);
        $stores_address = $this->_coreRegistry->registry('row_data');
        $form = $this->_formFactory->create(
            ['data' => [
                'id' => 'edit_form', 
                'enctype' => 'multipart/form-data', 
                'action' => $this->getData('action'), 
                'method' => 'post'
                ]
            ]
        );

        $form->setHtmlIdPrefix('pfgrid_');
        if ($stores_address->getEntityId()) {
            $fieldset = $form->addFieldset(
                'base_fieldset',
                ['legend' => __('Edit Store'), 'class' => 'fieldset-wide']
            );
            $fieldset->addField('entity_id', 'hidden', ['name' => 'entity_id']);
        } else {
            $fieldset = $form->addFieldset(
                'base_fieldset',
                ['legend' => __('Add Store'), 'class' => 'fieldset-wide']
            );
        }

        $fieldset->addField(
            'stores_name',
            'text',
            [
                'name' => 'stores_name',
                'label' => __('Store Name'),
                'id' => 'stores_name',
                'title' => __('Store Name'),
                'class' => 'required-entry',
                'required' => true,
            ]
        );

        $fieldset->addField(
            'stores_address',
            'textarea',
            [
                'name' => 'stores_address',
                'label' => __('Store Address'),
                'id' => 'stores_address',
                'title' => __('Store Address'),
                'class' => 'required-entry',
                'required' => true,
            ]
        );

        $fieldset->addField(
            'stores_description',
            'textarea',
            [
                'name' => 'stores_description',
                'label' => __('Store Description'),
                'id' => 'stores_description',
                'title' => __('Store Description'),
                'class' => 'required-entry',
                'required' => true,
            ]
        );

        $fieldset->addField(
            'stores_phone',
            'text',
            [
                'name' => 'stores_phone',
                'label' => __('Store Phone'),
                'id' => 'stores_phone',
                'title' => __('Store Phone'),
                'class' => 'required-entry',
                'required' => true,
            ]
        );

        $fieldset->addField(
            'stores_lat',
            'text',
            [
                'name' => 'stores_lat',
                'label' => __('Store Latitude'),
                'id' => 'stores_lat',
                'title' => __('Store Latitude'),
                'class' => 'required-entry',
                'required' => true,
            ]
        );

        $fieldset->addField(
            'stores_long',
            'text',
            [
                'name' => 'stores_long',
                'label' => __('Store Longtitude'),
                'id' => 'stores_long',
                'title' => __('Store Longtitude'),
                'class' => 'required-entry',
                'required' => true,
            ]
        );
		
        $fieldset->addField(
            'stores_hours',
            'textarea',
            [
                'name' => 'stores_hours',
                'label' => __('Store Hours'),
                'id' => 'stores_hours',
                'title' => __('Store Hours'),
                'class' => 'required-entry',
                'required' => true,
            ]
        );

        $fieldset->addField(
            'is_active',
            'select',
            [
                'label' => __('Status'),
                'title' => __('Status'),
                'name' => 'is_active',
                'required' => true,
                'options' => ['1' => __('Enabled'), '0' => __('Disabled')]
            ]
        );
        if (!$stores_address->getId()) {
            $stores_address->setData('is_active', '1');
        }
        $form->setValues($stores_address->getData());
        $form->setUseContainer(true);
        $this->setForm($form);

        return parent::_prepareForm();
    }
}
