<?php
/**
 * Mauricio_Banner Banner Save Controller
 * @category  Mauricio
 * @package   Mauricio_Banner
 * @author    Mauricio Paz Pacheco
 */

namespace Mauricio\Banner\Controller\Adminhtml\Banner;
 
use \Magento\Backend\App\Action;
use \Magento\Backend\App\Action\Context;
use \Mauricio\Banner\Model\Banner;

class Save extends Action
{
    /**
     * @var \Maxime\Jobs\Model\Department
     */
    protected $_model;
 
    /**
     * @param Action\Context $context
     * @param \Maxime\Jobs\Model\Department $model
     */
    public function __construct(
        Context $context,
        Banner $model
    ) {
        parent::__construct($context);
        $this->_model = $model;
    }
 
    /**
     * {@inheritdoc}
     */
    protected function _isAllowed()
    {
        return true;
    }
 
    /**
     * Save action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        $data = $this->getRequest()->getPostValue();

        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        if ($data) {
            /** @var \Maxime\Jobs\Model\Department $model */
            $model = $this->_model; 
            
           
            if (isset($data['id'])) {
                $id = $data['id'];
                $model->load($id);
            }
 
            $model->setData($data);
 
            $this->_eventManager->dispatch(
                'mauricio_banner_prepare_save',
                ['banner' => $model, 'request' => $this->getRequest()]
            );
 
            try {
                $model->save();
                $this->messageManager->addSuccess(__('Banner saved'));
                $this->_getSession()->setFormData(false);
                if ($this->getRequest()->getParam('back')) {
                    return $resultRedirect->setPath('*/*/edit', ['id' => $model->getId(), '_current' => true]);
                }
                return $resultRedirect->setPath('*/*/');
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