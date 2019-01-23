<?php
namespace Mauricio\Banner\Block\Adminhtml\Banner\Edit;
 
use \Magento\Backend\Block\Widget\Form\Generic;
 
class Form extends Generic
{
 
    /**
     * @var \Magento\Store\Model\System\Store
     */
    protected $_systemStore;
    protected $_wysiwygConfig;
 
    /**
     * @param \Magento\Backend\Block\Template\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param \Magento\Framework\Data\FormFactory $formFactory
     * @param \Magento\Store\Model\System\Store $systemStore
     * @param array $data
     */
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\Data\FormFactory $formFactory,
        \Magento\Store\Model\System\Store $systemStore,
        \Magento\Cms\Model\Wysiwyg\Config $wysiwygConfig,
        array $data = []
    ) {
        $this->_systemStore = $systemStore;
        $this->_wysiwygConfig = $wysiwygConfig;
        parent::__construct($context, $registry, $formFactory, $data);
    }
 
    /**
     * Init form
     *
     * @return void
     */
    protected function _construct()
    {
        parent::_construct();
        $this->setId('banner_form');
        $this->setTitle(__('Banner Information'));
    }
 
    /**
     * Prepare form
     *
     * @return $this
     */
    protected function _prepareForm()
    {
        /** @var \Maxime\Jobs\Model\Department $model */
        $model = $this->_coreRegistry->registry('mauricio_banner');
 
        /** @var \Magento\Framework\Data\Form $form */
        $form = $this->_formFactory->create(
            ['data' => ['id' => 'edit_form', 'action' => $this->getData('action'), 'method' => 'post']]
        );
 
        $form->setHtmlIdPrefix('banner_');
 
        $fieldset = $form->addFieldset(
            'base_fieldset',
            [
                'legend' => __('General Information'), 
                'class' => 'fieldset-wide'
            ]
        );
 
        if ($model->getId()) {
            $fieldset->addField('id', 'hidden', ['name' => 'id']);
        }

        $fieldset->addField(
            'enabled',
            'select',
            [
                'name' => 'enabled', 
                'label' => __('Is The Banner Enabled'), 
                'title' => __('Is The Banner Enabled'), 
                'required' => true,
                'options' => ['1' => __('Yes'), '0' => __('No')]            ]
        );
 
        $fieldset->addField(
            'link',
            'text',
            [
                'name' => 'link', 
                'label' => __('Banner Link'), 
                'title' => __('Banner Link'), 
                'required' => false
            ]
        );
 
        $fieldset->addField(
            'content',
            'editor',
            [
                'name' => 'content', 
                'label' => __('Banner Content'), 
                'title' => __('Banner Content'), 
                'required' => true,
                'wysiwyg' => true,
                'config' => $this->_wysiwygConfig->getConfig()                
            ]
        );
 
        $form->setValues($model->getData());
        $form->setUseContainer(true);
        $this->setForm($form);
 
        return parent::_prepareForm();
    }
}