<?php

namespace Mauricio\Banner\Block;

use \Magento\Framework\View\Element\Template;
use \Magento\Framework\View\Element\Template\Context;
use \Mauricio\Banner\Model\Banner as BannerModel;
use \Magento\Framework\App\ResourceConnection;
use \Magento\Cms\Model\Template\FilterProvider;

/**
 * Class Banner
 * @package Mauricio\Banner\Block
 */
class Banner extends Template
{
    protected $contentProcessor;

    /**
     * Banner constructor.
     * @param Context $context
     * @param BannerModel $banner
     * @param ResourceConnection $resource
     * @param FilterProvider $filterProvider
     * @param FilterProvider $contentProcessor
     * @param array $data
     */
    public function __construct(
        Context $context,
        BannerModel $banner,
        ResourceConnection $resource,
        FilterProvider $filterProvider,
        \Magento\Cms\Model\Template\FilterProvider $contentProcessor,
        array $data = []
    ) {
        $this->contentProcessor = $contentProcessor;
        $this->_banner = $banner;
        $this->_resource = $resource;
        $this->_filterProvider = $filterProvider;

        parent::__construct(
            $context,
            $data
        );
    }

    /**
     * @param $string
     * @return mixed
     */
    public function filterOutputHtml($string)
    {
        return $this->contentProcessor->getPageFilter()->filter($string);
    }

    /**
     * @return mixed
     */
    public function getEnabledBanners()
    {
        $collection = $this->_banner->getCollection()
            ->addFieldToFilter(
                'enabled',
                ['=' => BannerModel::IS_ENABLE]
            );

        return $collection;
    }
}
