<?php

namespace Mauricio\Banner\Controller\Adminhtml\Banner;

use Mauricio\Banner\Controller\Adminhtml\Banner;

/**
 * Class Delete
 * @package Mauricio\Banner\Controller\Adminhtml\Banner
 */
class Delete extends Banner
{
    /**
     * @return mixed
     */
    public function execute()
    {
        $model = $this->initModel();
        $resultRedirect = $this->resultRedirectFactory->create();

        if ($model->getId()) {
            try {
                $model->delete();

                $this->messageManager->addSuccess(__('The banner has been deleted!'));
                return $resultRedirect->setPath('*/*/');
            } catch (\Exception $e) {
                $this->messageManager->addError($e->getMessage());
                return $resultRedirect->setPath('*/*/edit', ['id' => $id]);
            }
        }
        $this->messageManager->addError(__('This banner no longer exists!'));
        return $resultRedirect->setPath('*/*/');
    }
}
