<?php

declare(strict_types=1);

/**
 * NOTICE OF LICENSE
 *
 * This source file is released under commercial license by Lamia Oy.
 *
 * @copyright Copyright (c) Lamia Oy (https://lamia.fi)
 */


namespace Lamia\Alpaca\Model\Customer\ResourceModel;

use Lamia\Alpaca\Api\Data\CustomerLoyalPointInterface;
use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class LoyalPoint extends AbstractDb
{

    protected function _construct(): void
    {
        $this->_init(
            mainTable: CustomerLoyalPointInterface::TABLE_NAME,
            idFieldName: CustomerLoyalPointInterface::ENTITY_ID
        );
    }
}
