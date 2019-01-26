<?php

namespace Mauricio\Banner\Controller\Adminhtml;

use Magento\Backend\App\Action;
use Mauricio\Banner\Api\Data\BannerInterface;
use Mauricio\Banner\Api\Repository\BannerRepositoryInterface;
use Mauricio\Banner\Model\BannerFactory;
use Magento\Framework\Registry;
use Magento\Backend\App\Action\Context;
use Magento\Store\Model\StoreManagerInterface;
use Magento\Framework\Controller\Result\JsonFactory;
use Magento\Backend\Helper\Js as JsHelper;
use Magento\Framework\Stdlib\DateTime\TimezoneInterface;

/**
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
abstract class Banner extends Action
{
    /**
     * @var BannerFactory
     */
    protected $bannerRepository;

    /**
     * @var Context
     */
    protected $context;

    /**
     * @var Registry
     */
    protected $registry;

    public function __construct(
        BannerRepositoryInterface $bannerRepository,
        Registry $registry,
        Context $context
    ) {
        $this->bannerRepository = $bannerRepository;
        $this->registry = $registry;
        $this->context = $context;
        $this->resultFactory = $context->getResultFactory();

        parent::__construct($context);
    }

    /**
     * {@inheritdoc}
     * @param \Magento\Backend\Model\View\Result\Page\Interceptor $resultPage
     * @return \Magento\Backend\Model\View\Result\Page\Interceptor
     */
    protected function initPage($resultPage)
    {
        $resultPage->setActiveMenu('Mauricio_Banner::banner');
        $resultPage->getConfig()->getTitle()->prepend(__('Banners'));

        return $resultPage;
    }

    /**
     * @return BannerInterface
     */
    public function initModel()
    {
        $model = $this->bannerRepository->create();
        $id = $this->getRequest()->getParam(BannerInterface::ID);

        if ($id && !is_array($id)) {
            $model = $this->bannerRepository->get($id);
        }

        $this->registry->register('current_model', $model);

        return $model;
    }

    /**
     * @return bool
     */
    protected function _isAllowed()
    {
        return $this->context->getAuthorization()->isAllowed('Mauricio_Banner::banner');
    }
}
