<?php
/**
 * Mauricio_Banner Banner Block
 * @category  Mauricio
 * @package   Mauricio_Banner
 * @author    Mauricio Paz Pacheco
 */

namespace Mauricio\Banner\Block;

use \Magento\Framework\View\Element\Template;
use \Magento\Framework\View\Element\Template\Context;
use \Mauricio\Banner\Model\Banner as BannerModel;
use \Magento\Framework\App\ResourceConnection;
use \Magento\Cms\Model\Template\FilterProvider;

class Banner extends Template
{
	public function __construct(
		Context $context,
		BannerModel $banner,
		ResourceConnection $resource,
		FilterProvider $filterProvider,
        array $data = []
	) {
		$this->_banner = $banner;
        $this->_resource = $resource;
        $this->_filterProvider = $filterProvider;

        parent::__construct(
            $context,
            $data
        );
	}

	public function getEnableBanners()
	{
		$collection = $this->_banner->getCollection()
			->addFieldToFilter(
				'enabled', ['=' => BannerModel::IS_ENABLE]
			);

        return $collection;
	}

	public function getImage($banner)
	{
		return $this->_filterProvider->getPageFilter()->filter($banner->getContent());
	}
}