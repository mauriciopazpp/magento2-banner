<?php
/**
 * Banner Banner ResourceModel
 * @category  Mauricio
 * @package   Mauricio_Banner
 * @author    Mauricio Paz Pacheco
 */

namespace Mauricio\Banner\Model\ResourceModel;

use \Magento\Framework\Model\ResourceModel\Db\AbstractDb;
use \Magento\Framework\Model\ResourceModel\Db\Context;

class Banner extends AbstractDb
{
	
	public function __construct(Context $context)
	{
		parent::__construct($context);
	}
	
	protected function _construct()
	{
		$this->_init('mauricio_banner_banner', 'id');
	}
}