<?php
/**
 * Mauricio_Banner Banner Index Controller
 * @category  Mauricio
 * @package   Mauricio_Banner
 * @author    Mauricio Paz Pacheco
 */

namespace Mauricio\Banner\Controller\Adminhtml\Banner;

use \Magento\Backend\App\Action;
use \Magento\Backend\App\Action\Context;
use \Magento\Framework\View\Result\PageFactory;

class Index extends Action
{
	protected $resultPageFactory = false;

	public function __construct(
		Context $context,
		PageFactory $resultPageFactory
	)
	{
		parent::__construct($context);
		$this->resultPageFactory = $resultPageFactory;
	}

	public function execute()
	{
		$resultPage = $this->resultPageFactory->create();
		$resultPage->getConfig()->getTitle()->prepend((__('Banners')));

		return $resultPage;
	}


}