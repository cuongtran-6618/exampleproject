<?php

declare(strict_types=1);

/**
 * NOTICE OF LICENSE
 *
 * This source file is released under commercial license by Lamia Oy.
 *
 * @copyright Copyright (c) Lamia Oy (https://lamia.fi)
 */


namespace Lamia\Alpaca\Model\Attribute\Source;

use Magento\Eav\Model\Entity\Attribute\Source\AbstractSource;
use Lamia\Alpaca\Model\Enum\Material as Type;

class Material extends AbstractSource
{

    /**
     * @return array|array[]|null
     */
    public function getAllOptions(): ?array
    {
        if ($this->_options) {
            return $this->_options;
        }

        $this->_options = [
            [
                'label' => __('Cotton'),
                'value' => Type::COTTON
            ],
            [
                'label' => __('Leather'),
                'value' => Type::LEATHER
            ],
            [
                'label' => __('Silk'),
                'value' => Type::SILK
            ],
            [
                'label' => __('Fur'),
                'value' => Type::FUR
            ],
            [
                'label' => __('Wool'),
                'value' => Type::WOOL
            ],
        ];

        return $this->_options;
    }
}
