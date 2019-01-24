<?php
/**
 * Banner Banner Model
 * @category  Mauricio
 * @package   Mauricio_Banner
 * @author    Mauricio Paz Pacheco
 */

namespace Mauricio\Banner\Model;

use \Magento\Framework\Model\AbstractModel;
use Mauricio\Banner\Model\Api\Data\BannerInterface;
use Magento\Framework\DataObject\IdentityInterface;

class Banner extends AbstractModel implements IdentityInterface, BannerInterface
{
    const CACHE_TAG = 'mauricio_banner_banner';
    protected $_cacheTag = 'mauricio_banner_banner';
    protected $_eventPrefix = 'mauricio_banner_banner';

    protected function _construct()
    {
        $this->_init('Mauricio\Banner\Model\ResourceModel\Banner');
    }

    public function getBannerId()
    {
        return $this->getData(self::ID);
    }

    public function setBannerId($id)
    {
        return $this->setData(self::ID, $id);
    }

    public function getContent()
    {
        return $this->getData(self::CONTENT);
    }

    public function setContent($content)
    {
        return $this->setData(self::CONTENT, $content);
    }

    public function getLink()
    {
        return $this->getData(self::LINK);
    }

    public function setLink($link)
    {
        return $this->setData(self::LINK, $link);
    }

    public function getEnable()
    {
        return $this->getData(self::ENABLE);
    }

    public function setEnable($enable)
    {
        return $this->setData(self::ENABLE, $enable);
    }

    public function getCreatedAt()
    {
        return $this->getData(self::CREATED_AT);
    }

    public function setCreatedAt($createdAt)
    {
        return $this->setData(self::CREATED_AT, $createdAt);
    }
    
    public function getUpdatedAt()
    {
        return $this->getData(self::CREATED_AT);
    }

    public function setUpdatedAt($updatedAt)
    {
        return $this->setData(self::UPDATED_AT, $updatedAt);
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
