<?php
/**
 * Mauricio_Banner Banner Index Controller
 * @category  Mauricio
 * @package   Mauricio_Banner
 * @author    Mauricio Paz Pacheco
 */

namespace Mauricio\Banner\Controller\Adminhtml\Banner;

use Magento\Framework\Controller\ResultFactory;
use \Mauricio\Banner\Controller\Banner;
use \Magento\Backend\App\Action\Context;
use \Magento\Framework\View\Result\PageFactory;

class Index extends Banner
{
    public function execute()
    {
        $resultPage = $this->context->getResultFactory()->create(ResultFactory::TYPE_PAGE);
        $resultPage->getConfig()->getTitle()->prepend((('Banners')));

        return $resultPage;
    }
}
