<?php
/**
 * Mauricio_Banner Banner Interface
 * @category  Mauricio
 * @package   Mauricio_Banner
 * @author    Mauricio Paz Pacheco
 */

namespace Mauricio\Banner\Model\Api\Data;

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

    public function getId();
    public function setId($id);
    
    public function getContent();
    public function setContent($content);

    public function getLink();
    public function setLink($link);

    public function getEnable();
    public function setEnable($enable);
    
    public function getCreatedAt();
    public function setCreatedAt($createdAt);

    public function getUpdatedAt();
    public function setUpdatedAt($updatedAt);
}
