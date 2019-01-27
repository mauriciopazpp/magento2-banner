<?php

namespace Mauricio\Banner\Api\Data;

/**
 * Interface BannerInterface
 * @package Mauricio\Banner\Api\Data
 */
interface BannerInterface
{
    const ID = 'id';
    const CONTENT = 'content';
    const LINK = 'link';
    const ENABLE = 'enable';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    const IS_ENABLE = true;
    const IS_DISABLED = false;

    /**
     * @return mixed
     *
     */
    public function getId();

    /**
     * @param $id
     * @return mixed
     */
    public function setId($id);

    /**
     * @return mixed
     */
    public function getContent();

    /**
     * @param $content
     * @return mixed
     */
    public function setContent($content);

    /**
     * @return mixed
     */
    public function getLink();

    /**
     * @param $link
     * @return mixed
     */
    public function setLink($link);

    /**
     * @return mixed
     */
    public function getEnable();

    /**
     * @param $enable
     * @return mixed
     */
    public function setEnable($enable);

    /**
     * @return mixed
     */
    public function getCreatedAt();

    /**
     * @param $createdAt
     * @return mixed
     */
    public function setCreatedAt($createdAt);

    /**
     * @return mixed
     */
    public function getUpdatedAt();

    /**
     * @param $updatedAt
     * @return mixed
     */
    public function setUpdatedAt($updatedAt);
}
