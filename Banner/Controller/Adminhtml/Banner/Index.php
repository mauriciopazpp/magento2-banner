<?php

namespace Mauricio\Banner\Controller\Adminhtml\Banner;

use Magento\Framework\Controller\ResultFactory;
use \Mauricio\Banner\Controller\Banner;
use \Magento\Backend\App\Action\Context;
use \Magento\Framework\View\Result\PageFactory;

/**
 * Class Index
 * @package Mauricio\Banner\Controller\Adminhtml\Banner
 */
class Index extends Banner
{
    /**
     * @return mixed
     */
    public function execute()
    {
        $resultPage = $this->context->getResultFactory()->create(ResultFactory::TYPE_PAGE);
        $resultPage->getConfig()->getTitle()->prepend((('Banners')));

        return $resultPage;
    }
}
