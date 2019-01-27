<?php

namespace Mauricio\Banner\Repository;

use Mauricio\Banner\Api\Data\BannerInterface;
use Mauricio\Banner\Api\Repository\BannerRepositoryInterface;
use Mauricio\Banner\Model\Banner;
use Mauricio\Banner\Model\ResourceModel\Banner\CollectionFactory;
use Mauricio\Banner\Api\Data\BannerInterfaceFactory;

class BannerRepository implements BannerRepositoryInterface
{
    /**
     * @var BannerInterfaceFactory
     */
    private $factory;

    /**
     * @var CollectionFactory
     */
    private $collectionFactory;

    /**
     * BannerRepository constructor.
     * @param BannerInterfaceFactory $factory
     * @param CollectionFactory $collectionFactory
     */
    public function __construct(
        BannerInterfaceFactory $factory,
        CollectionFactory $collectionFactory
    ) {
        $this->factory = $factory;
        $this->collectionFactory = $collectionFactory;
    }

    /**
     * @return mixed
     */
    public function getCollection()
    {
        return $this->collectionFactory->create();
    }

    /**
     * @return mixed
     */
    public function create()
    {
        return $this->factory->create();
    }

    /**
     * @param int $id
     * @return bool|Banner
     */
    public function get($id)
    {
        /** @var Banner $model */
        $model = $this->create();

        $model->getResource()->load($model, $id);

        return $model->getId() ? $model : false;
    }

    /**
     * @param BannerInterface $model
     * @return mixed
     */
    public function delete(BannerInterface $model)
    {
        /** @var Banner $model */
        return $model->getResource()->delete($model);
    }

    /**
     * @param BannerInterface $model
     * @return mixed
     */
    public function save(BannerInterface $model)
    {
        /** @var Banner $model */
        return $model->getResource()->save($model);
    }

    /**
     * @return mixed
     */
    public function getEnabledBanners()
    {
        return $this->factory->addFieldToFilter(
            'enabled',
            ['=' => true]
        );
    }
}