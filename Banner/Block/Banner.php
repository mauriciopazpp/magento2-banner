<?php
namespace Mauricio\Banner\Block;

class Banner extends \Magento\Framework\View\Element\Template
{
	public function __construct(
		\Magento\Framework\View\Element\Template\Context $context,
		\Mauricio\Banner\Model\Banner $banner,
		\Magento\Framework\App\ResourceConnection $resource,
		\Magento\Cms\Model\Template\FilterProvider $filterProvider,
        array $data = []
	)
	{
		$this->_banner = $banner;
        $this->_resource = $resource;
        $this->_filterProvider = $filterProvider;

        parent::__construct(
            $context,
            $data
        );
	}

	public function getAllBanners()
	{
		$collection = $this->_banner->getCollection()
			->addFieldToFilter('enabled', ['eq' => 1]);

        return $collection;
	}

	public function getImage($banner = null)
	{
		return $this->_filterProvider->getPageFilter()->filter($banner->getContent());
	}
}