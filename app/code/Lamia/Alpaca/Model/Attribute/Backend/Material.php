<?php

declare(strict_types=1);

/**
 * NOTICE OF LICENSE
 *
 * This source file is released under commercial license by Lamia Oy.
 *
 * @copyright Copyright (c) Lamia Oy (https://lamia.fi)
 */


namespace Lamia\Alpaca\Model\Attribute\Backend;

use Magento\Catalog\Model\Product;
use Magento\Eav\Model\Entity\Attribute\Backend\AbstractBackend;
use Magento\Framework\Exception\LocalizedException;

class Material extends AbstractBackend
{
    /**
     * @param Product $object
     * @return void
     * @throws LocalizedException
     */
    public function validate($object)
    {
        $attributeCode = $this->getAttribute()->getAttributeCode();
        $attributeValue = $object->getData($attributeCode);

        $attributeSetId = $object->getAttributeSetId();

        // validate condition, placeholder to complete now, need to double-check about the real attribute set id
        if ($attributeSetId === 9 && $attributeValue === 'fur') {
            throw new LocalizedException(__('Bottoms can not be fur'));
        }
    }
}
