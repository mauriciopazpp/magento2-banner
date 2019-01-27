<?php

namespace Mauricio\Banner\Controller\Adminhtml\Banner;

use Mauricio\Banner\Controller\Adminhtml\Banner;

class NewAction extends Banner
{
    /**
     * {@inheritdoc}
     */
    public function execute()
    {
        return $this->resultRedirectFactory->create()->setPath('*/*/edit');
    }
}
