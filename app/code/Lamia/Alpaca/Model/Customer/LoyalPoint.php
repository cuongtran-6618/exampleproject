<?php

declare(strict_types=1);

/**
 * NOTICE OF LICENSE
 *
 * This source file is released under commercial license by Lamia Oy.
 *
 * @copyright Copyright (c) Lamia Oy (https://lamia.fi)
 */


namespace Lamia\Alpaca\Model\Customer;

use Magento\Framework\DataObject\IdentityInterface;
use Magento\Framework\Model\AbstractModel;
use \Lamia\Alpaca\Model\Customer\ResourceModel\LoyalPoint as LoyalPointResourceModel;

class LoyalPoint extends AbstractModel implements IdentityInterface
{
    const ENTITY_ID = 'entity_id';

    protected function _construct(): void
    {
        parent::_construct();
        $this->_init(resourceModel: LoyalPointResourceModel::class);
        $this->setIdFieldName(name: 'entity_id');
    }


    /**
     * @return string[]
     */
    public function getIdentities(): array
    {
        return [ 'customer_loyal_point' . $this->getId() ];
    }

    public function getId(): string
    {
        return parent::getData(self::ENTITY_ID);
    }
}
