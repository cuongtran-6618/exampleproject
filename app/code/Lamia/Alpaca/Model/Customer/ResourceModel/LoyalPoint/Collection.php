<?php

declare(strict_types=1);

/**
 * NOTICE OF LICENSE
 *
 * This source file is released under commercial license by Lamia Oy.
 *
 * @copyright Copyright (c) Lamia Oy (https://lamia.fi)
 */


namespace Lamia\Alpaca\Model\Customer\ResourceModel\LoyalPoint;

use Lamia\Alpaca\Model\Customer\LoyalPoint;
use Lamia\Alpaca\Model\Customer\ResourceModel\LoyalPoint as LoyalPointResourceModel;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    protected $_idFieldName = 'entity_id';

    public function _construct()
    {
        $this->_init(
            model: LoyalPoint::class,
            resourceModel: LoyalPointResourceModel::class
        );
        $this->_map['fields']['entity_id'] = 'main_table.entity_id';
    }
}
