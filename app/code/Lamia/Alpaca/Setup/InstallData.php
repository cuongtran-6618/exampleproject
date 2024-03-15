<?php

declare(strict_types=1);

/**
 * NOTICE OF LICENSE
 *
 * This source file is released under commercial license by Lamia Oy.
 *
 * @copyright Copyright (c) Lamia Oy (https://lamia.fi)
 */


namespace Lamia\Alpaca\Setup;

use Magento\Catalog\Model\Product;
use Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Eav\Setup\EavSetupFactory;
use Lamia\Alpaca\Model\Attribute\Source\Material as Source;
use Lamia\Alpaca\Model\Attribute\Backend\Material as Backend;
use Lamia\Alpaca\Model\Attribute\Frontend\Material as Frontend;

class InstallData implements InstallDataInterface
{

    public function __construct(
        protected EavSetupFactory $eavSetupFactory
    ) {}

    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context): void
    {
        // create class from factory
        $eavSetup = $this->eavSetupFactory->create();

        $eavSetup->addAttribute(
            entityTypeId: Product::ENTITY,
            code: 'clothing_material',
            attr: [
                'group'         => 'General',
                'type'          => 'varchar',
                'label'         => 'Clothing Material',
                'input'         => 'select',
                'source'        => Source::class,
                'frontend'      => Frontend::class,
                'backend'       => Backend::class,
                'required'      => false,
                'sort_order'    => 50,
                'global'        => ScopedAttributeInterface::SCOPE_GLOBAL,
                'is_used_in_grid'               => false,
                'is_visible_in_grid'            => false,
                'is_filterable_in_grid'         => true,
                'visible'                       => true,
                'is_html_allowed_on_frontend'   => true,
                'visible_on_front'              => true,
            ]
        );
    }
}
