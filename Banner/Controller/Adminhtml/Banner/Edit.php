<?php

namespace Mauricio\Banner\Controller\Adminhtml\Banner;

use Magento\Framework\Controller\ResultFactory;
use Mauricio\Banner\Api\Data\BannerInterface;
use Mauricio\Banner\Controller\Adminhtml\Banner;

/**
 * Class Edit
 * @package Mauricio\Banner\Controller\Adminhtml\Banner
 */
class Edit extends Banner
{
    /**
     * @return \Mauricio\Backend\Model\View\Result\Page
     */
    public function execute()
    {

        /** @var \Mauricio\Backend\Model\View\Result\Page\Interceptor $resultPage */
        $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);

        $id = $this->getRequest()->getParam(BannerInterface::ID);

        $model = $this->initModel();

        if ($id && !is_array($id) && !$model->getId()) {
            $this->messageManager->addErrorMessage(__('This banner no longer exists.'));

            return $this->resultRedirectFactory->create()->setPath('*/*/');
        }

        $this->initPage($resultPage)->getConfig()->getTitle()->prepend(
            $model->getName() ? $model->getName() : __('New Banner')
        );

        return $resultPage;
    }
}
