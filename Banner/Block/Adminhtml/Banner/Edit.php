<?php

namespace Mauricio\Banner\Block\Adminhtml\Banner;
 
use Magento\Backend\Block\Widget\Form\Container;
use \Magento\Backend\Block\Widget\Context;
use \Magento\Framework\Registry;

/**
 * Class Edit
 * @package Mauricio\Banner\Block\Adminhtml\Banner
 */
class Edit extends Container
{
    /**
     * @var \Magento\Framework\Registry|null
     */
    protected $_coreRegistry = null;

    /**
     * Edit constructor.
     * @param Context $context
     * @param Registry $registry
     * @param array $data
     */
    public function __construct(
        Context $context,
        Registry $registry,
        array $data = []
    ) {
        $this->_coreRegistry = $registry;
        parent::__construct($context, $data);
    }

    protected function _construct()
    {
        $this->_objectId = 'id';
        $this->_blockGroup = 'Mauricio_Banner';
        $this->_controller = 'adminhtml_banner';
 
        parent::_construct();
        
        $this->buttonList->update('save', 'label', __('Save Banner'));
        $this->buttonList->add(
            'saveandcontinue',
            [
                'label' => __('Save and Continue Edit'),
                'class' => 'save',
                'data_attribute' => [
                    'mage-init' => [
                        'button' => ['event' => 'saveAndContinueEdit', 'target' => '#edit_form'],
                    ],
                ]
            ],
            -100
        );
    }

    /**
     * @return mixed
     */
    public function getHeaderText()
    {
        if ($this->_coreRegistry->registry('mauricio_banner')->getId()) {
            return __("Edit Banner '%1'", $this->escapeHtml($this->_coreRegistry->registry('mauricio_banner')->getName()));
        } else {
            return __('New Banner');
        }
    }

    /**
     * @param $resourceId
     * @return bool
     */
    protected function _isAllowedAction($resourceId)
    {
        return true;
    }

    /**
     * @return mixed
     */
    protected function _getSaveAndContinueUrl()
    {
        return $this->getUrl('banner/*/save', ['_current' => true, 'back' => 'edit', 'active_tab' => '']);
    }
}
