<?php

namespace Mauricio\Banner\Model\ResourceModel\Banner;

use \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

/**
 * Class Collection
 * @package Mauricio\Banner\Model\ResourceModel\Banner
 */
class Collection extends AbstractCollection
{
    protected $_idFieldName = 'id';
    protected $_eventPrefix = 'mauricio_banner_banner_collection';
    protected $_eventObject = 'banner_collection';

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Mauricio\Banner\Model\Banner', 'Mauricio\Banner\Model\ResourceModel\Banner');
    }
}
