<?php

namespace Mauricio\Banner\Block\Adminhtml\Banner\Edit;
 
use \Magento\Backend\Block\Widget\Form\Generic;
use \Magento\Backend\Block\Template\Content;
use \Magento\Framework\Registry;
use \Magento\Framework\Data\FormFactory;
use \Magento\Store\Model\System\Store;
use \Magento\Cms\Model\Wysiwyg\Config;
use \Magento\Backend\Block\Widget\Context;

/**
 * Class Form
 * @package Mauricio\Banner\Block\Adminhtml\Banner\Edit
 */
class Form extends Generic
{
    /**
     * @var \Magento\Store\Model\System\Store
     */
    protected $_systemStore;
    protected $_wysiwygConfig;

    /**
     * Form constructor.
     * @param Context $context
     * @param Registry $registry
     * @param FormFactory $formFactory
     * @param Store $systemStore
     * @param Config $wysiwygConfig
     * @param array $data
     */
    public function __construct(
        Context $context,
        Registry $registry,
        FormFactory $formFactory,
        Store $systemStore,
        Config $wysiwygConfig,
        array $data = []
    ) {
        $this->registry = $registry;
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
        $model = $this->registry->registry('current_model');
 
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
