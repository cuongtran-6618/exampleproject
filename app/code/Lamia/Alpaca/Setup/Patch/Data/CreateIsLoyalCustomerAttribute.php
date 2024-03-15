<?php

declare(strict_types=1);

/**
 * NOTICE OF LICENSE
 *
 * This source file is released under commercial license by Lamia Oy.
 *
 * @copyright Copyright (c) Lamia Oy (https://lamia.fi)
 */


namespace Lamia\Alpaca\Setup\Patch\Data;

use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Customer\Setup\CustomerSetupFactory;
use Magento\Customer\Model\Customer;
use Magento\Eav\Model\Entity\Attribute\SetFactory as AttributeSetFactory;
use Magento\Framework\Validator\ValidateException;
use Magento\Eav\Model\Entity\Attribute\Source\Boolean;

class CreateIsLoyalCustomerAttribute implements DataPatchInterface
{

    public function __construct(
        private ModuleDataSetupInterface $moduleDataSetup,
        private CustomerSetupFactory     $customerSetupFactory,
        private AttributeSetFactory      $attributeSetFactory
    )
    {
    }

    /**
     * @throws LocalizedException
     * @throws ValidateException
     */
    public function apply(): void
    {

        $this->moduleDataSetup->getConnection()->startSetup();
        $this->createCustomerAttribute();
        $this->moduleDataSetup->getConnection()->endSetup();
    }

    /**
     * @throws LocalizedException
     * @throws ValidateException
     * @throws \Exception
     */
    private function createCustomerAttribute()
    {
        $customerSetup = $this->customerSetupFactory->create(
            [
                'setup' => $this->moduleDataSetup
            ]
        );

        $customerEntity = $customerSetup->getEavConfig()->getEntityType('customer');
        $attributeSetId = $customerEntity->getDefaultAttributeSetId();

        /** @var $attributeSet AttributeSet */
        $attributeSet = $this->attributeSetFactory->create();
        $attributeGroupId = $attributeSet->getDefaultGroupId($attributeSetId);
        $customerSetup->addAttribute(
            Customer::ENTITY,
            'is_loyal_customer', [
                'type' => 'int',
                'label' => 'Is a loyal customer',
                'input' => 'boolean',
                'source' => Boolean::class,
                'required' => false,
                'visible' => true,
                'user_defined' => true,
                'position' => 999,
                'system' => 0,
                'default' => 0
            ]
        );

        $attribute = $customerSetup->getEavConfig()->getAttribute(
            Customer::ENTITY,
            'is_loyal_customer')
            ->addData([
                'attribute_set_id' => $attributeSetId,
                'attribute_group_id' => $attributeGroupId,
                'used_in_forms' => ['adminhtml_customer'],//you can use other forms also ['adminhtml_customer_address', 'customer_account_edit', 'customer_address_edit', 'customer_register_address', 'customer_account_create']
            ]);

        $attribute->save();
    }

    public static function getDependencies(): array
    {
        return [];
    }

    public function getAliases(): array
    {
        return [];
    }
}
