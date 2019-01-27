<?php

namespace Mauricio\Banner\Controller\Adminhtml\Banner;

use Mauricio\Banner\Controller\Adminhtml\Banner;

/**
 * Class NewAction
 * @package Mauricio\Banner\Controller\Adminhtml\Banner
 */
class NewAction extends Banner
{
    /**
     * @return mixed
     */
    public function execute()
    {
        return $this->resultRedirectFactory->create()->setPath('*/*/edit');
    }
}
