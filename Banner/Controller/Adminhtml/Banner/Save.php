<?php

namespace Mauricio\Banner\Controller\Adminhtml\Banner;
 
use \Magento\Backend\App\Action;
use \Magento\Backend\App\Action\Context;
use Mauricio\Banner\Controller\Adminhtml\Banner;

/**
 * Class Save
 * @package Mauricio\Banner\Controller\Adminhtml\Banner
 */
class Save extends Banner
{
    /**
     * @return mixed
     */
    public function execute()
    {
        $data = $this->getRequest()->getPostValue();
        $resultRedirect = $this->resultRedirectFactory->create();

        if ($data) {
            $model = $this->initModel();

            $model->addData($data);
 
            $this->_eventManager->dispatch(
                'mauricio_banner_prepare_save',
                ['banner' => $model, 'request' => $this->getRequest()]
            );
 
            try {
                $model->save();
                $this->messageManager->addSuccessMessage(__('Banner was successfully saved!'));
                $this->_getSession()->setFormData(false);

                if ($this->getRequest()->getParam('back')) {
                    return $resultRedirect->setPath('*/*/edit', ['id' => $model->getId(), '_current' => true]);
                }

                return $this->context->getResultRedirectFactory()->create()->setPath('*/*/');
            } catch (\Magento\Framework\Exception\LocalizedException $e) {
                $this->messageManager->addError($e->getMessage());
            } catch (\RuntimeException $e) {
                $this->messageManager->addError($e->getMessage());
            } catch (\Exception $e) {
                $this->messageManager->addException($e, __('Something went wrong while saving the banner'));
            }
 
            $this->_getSession()->setFormData($data);
            return $resultRedirect->setPath('*/*/edit', ['id' => $this->getRequest()->getParam('id')]);
        }
        return $resultRedirect->setPath('*/*/');
    }
}
