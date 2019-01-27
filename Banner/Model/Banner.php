<?php

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

/**
 * Class Banner
 * @package Mauricio\Banner\Model
 */
class Banner extends AbstractExtensibleModel implements IdentityInterface, BannerInterface
{
    const ENTITY = 'banners';
    const CACHE_TAG = 'banners';
    protected $_cacheTag = 'banners';
    protected $_eventPrefix = 'banners';

    /**
     * Banner constructor.
     * @param BannerRepositoryInterface $bannerRepositoryInterface
     * @param Context $context
     * @param Registry $registry
     * @param ExtensionAttributesFactory $extensionFactory
     * @param AttributeValueFactory $customAttributeFactory
     */
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
     * @return array
     */
    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    /**
     * @return mixed
     */
    public function getBannerId()
    {
        return $this->getData(self::ID);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function setBannerId($id)
    {
        return $this->setData(self::ID, $id);
    }

    public function getContent()
    {
        return $this->getData(self::CONTENT);
    }

    /**
     * @param $content
     * @return mixed
     */
    public function setContent($content)
    {
        return $this->setData(self::CONTENT, $content);
    }

    /**
     * @return mixed
     */
    public function getLink()
    {
        return $this->getData(self::LINK);
    }

    public function setLink($link)
    {
        return $this->setData(self::LINK, $link);
    }

    /**
     * @return mixed
     */
    public function getEnable()
    {
        return $this->getData(self::ENABLE);
    }

    /**
     * @param $enable
     * @return mixed
     */
    public function setEnable($enable)
    {
        return $this->setData(self::ENABLE, $enable);
    }

    /**
     * @return mixed
     */
    public function getCreatedAt()
    {
        return $this->getData(self::CREATED_AT);
    }

    /**
     * @param $createdAt
     * @return mixed
     */
    public function setCreatedAt($createdAt)
    {
        return $this->setData(self::CREATED_AT, $createdAt);
    }

    /**
     * @return mixed
     */
    public function getUpdatedAt()
    {
        return $this->getData(self::CREATED_AT);
    }

    /**
     * @param $updatedAt
     * @return mixed
     */
    public function setUpdatedAt($updatedAt)
    {
        return $this->setData(self::UPDATED_AT, $updatedAt);
    }

    /**
     * @return array
     */
    public function getDefaultValues()
    {
        $values = [];
        return $values;
    }
}
