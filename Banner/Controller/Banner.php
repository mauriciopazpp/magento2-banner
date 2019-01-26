<?php

namespace Mauricio\Banner\Controller;

use Magento\Store\Model\StoreManagerInterface;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Mauricio\Banner\Api\Data\BannerInterface;
use Mauricio\Banner\Model\BannerFactory;
use Magento\Framework\Registry;

abstract class Banner extends Action
{
    /**
     * @var BannerFactory
     */
    protected $bannerFactory;

    /**
     * @var Registry
     */
    protected $registry;

    public function __construct(
        BannerFactory $bannerFactory,
        Registry $registry,
        Context $context
    ) {
        $this->bannerFactory = $bannerFactory;
        $this->registry = $registry;
        $this->context = $context;
        $this->resultFactory = $context->getResultFactory();

        parent::__construct($context);
    }

    /**
     * @return \Mauricio\Banner\Model\Banner|boolean
     */
    protected function initModel()
    {
        $id = $this->getRequest()->getParam(BannerInterface::ID);
        if (!$id) {
            return false;
        }

        $banner = $this->bannerFactory->create()->load($id);

        if (!$banner->getId()) {
            return false;
        }

        $this->registry->register('current_banner_banner', $banner);

        return $banner;
    }
}
