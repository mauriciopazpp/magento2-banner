<?php
/**
 * Mauricio_Banner Banner Delete Controller
 * @category  Mauricio
 * @package   Mauricio_Banner
 * @author    Mauricio Paz Pacheco
 */

namespace Mauricio\Banner\Controller\Adminhtml\Banner;

use \Mauricio\Banner\Controller\Adminhtml\Banner;

class Delete extends Banner
{
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
