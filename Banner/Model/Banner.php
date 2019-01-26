<?php
/**
 * Banner Banner Model
 * @category  Mauricio
 * @package   Mauricio_Banner
 * @author    Mauricio Paz Pacheco
 */

namespace Mauricio\Banner\Model;

use Magento\Framework\Model\AbstractExtensibleModel;
use \Magento\Framework\Model\AbstractModel;
use Mauricio\Banner\Api\Data\BannerInterface;
use Magento\Framework\DataObject\IdentityInterface;
use Mauricio\Banner\Api\Repository\BannerRepositoryInterface;
use Magento\Framework\Model\Context;
use Magento\Framework\Registry;
use Magento\Framework\Api\ExtensionAttributesFactory;
use Magento\Framework\Api\AttributeValueFactory;

class Banner extends AbstractExtensibleModel implements IdentityInterface, BannerInterface
{
    const ENTITY = 'mauricio_banner_banner';
    const CACHE_TAG = 'mauricio_banner_banner';
    protected $_cacheTag = 'mauricio_banner_banner';
    protected $_eventPrefix = 'mauricio_banner_banner';

    public function __construct(
        BannerRepositoryInterface $bannerRepositoryInterface,
        Context $context,
        Registry $registry,
        ExtensionAttributesFactory $extensionFactory,
        AttributeValueFactory $customAttributeFactory
    ) {
        $this->bannerRepositoryInterface = $bannerRepositoryInterface;

        parent::__construct($context, $registry, $extensionFactory, $customAttributeFactory);
    }

    protected function _construct()
    {
        $this->_init('Mauricio\Banner\Model\ResourceModel\Banner');
    }

    /**
     * {@inheritdoc}
     */
    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
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

    public function getDefaultValues()
    {
        $values = [];

        return $values;
    }
}
