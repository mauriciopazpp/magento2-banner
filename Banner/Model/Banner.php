<?php

namespace Mauricio\Banner\Model;

class Banner extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface
{
	const CACHE_TAG = 'mauricio_banner_banner';
	protected $_cacheTag = 'mauricio_banner_banner';
	protected $_eventPrefix = 'mauricio_banner_banner';

	protected function _construct()
	{
		$this->_init('Mauricio\Banner\Model\ResourceModel\Banner');
	}

	public function getIdentities()
	{
		return [self::CACHE_TAG . '_' . $this->getId()];
	}

	public function getDefaultValues()
	{
		$values = [];

		return $values;
	}
}