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

    public function __construct(
        BannerInterfaceFactory $factory,
        CollectionFactory $collectionFactory
    ) {
        $this->factory = $factory;
        $this->collectionFactory = $collectionFactory;
    }

    /**
     * {@inheritdoc}
     */
    public function getCollection()
    {
        return $this->collectionFactory->create();
    }

    /**
     * {@inheritdoc}
     */
    public function create()
    {
        return $this->factory->create();
    }

    /**
     * {@inheritdoc}
     */
    public function get($id)
    {
        /** @var Banner $model */
        $model = $this->create();

        $model->getResource()->load($model, $id);

        return $model->getId() ? $model : false;
    }

    /**
     * {@inheritdoc}
     */
    public function delete(BannerInterface $model)
    {
        /** @var Banner $model */
        return $model->getResource()->delete($model);
    }

    /**
     * {@inheritdoc}
     */
    public function save(BannerInterface $model)
    {
        /** @var Banner $model */
        return $model->getResource()->save($model);
    }
}