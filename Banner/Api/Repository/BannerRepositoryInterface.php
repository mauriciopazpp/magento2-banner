<?php

namespace Mauricio\Banner\Api\Repository;

use Mauricio\Banner\Api\Data\BannerInterface;

interface BannerRepositoryInterface
{
    /**
     * @return \Mauricio\Banner\Model\ResourceModel\Banner\Collection | BannerInterface[]
     */
    public function getCollection();

    /**
     * @return BannerInterface
     */
    public function create();

    /**
     * @param BannerInterface $model
     * @return BannerInterface
     */
    public function save(BannerInterface $model);

    /**
     * @param int $id
     * @return BannerInterface|false
     */
    public function get($id);

    /**
     * @param BannerInterface $model
     * @return bool
     */
    public function delete(BannerInterface $model);
}