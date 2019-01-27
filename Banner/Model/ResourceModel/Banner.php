<?php

namespace Mauricio\Banner\Model\ResourceModel;

use \Magento\Framework\Model\ResourceModel\Db\AbstractDb;
use \Magento\Framework\Model\ResourceModel\Db\Context;

/**
 * Class Banner
 * @package Mauricio\Banner\Model\ResourceModel
 */
class Banner extends AbstractDb
{
    /**
     * Banner constructor.
     * @param Context $context
     */
    public function __construct(Context $context)
    {
        parent::__construct($context);
    }
    
    protected function _construct()
    {
        $this->_init('banners', 'id');
    }
}
