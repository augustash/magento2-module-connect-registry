<?php

/**
 * Connect Integration Suite - Registry
 *
 * A replacement for deprecated core registry functionality for category, customer, product, sales objects.
 *
 * @author Peter McWilliams <pmcwilliams@augustash.com>
 * @license MIT
 */

declare(strict_types=1);

namespace Augustash\ConnectRegistry\Api;

use Magento\Catalog\Api\Data\CategoryInterface;

/**
 * Service interface responsible for category registry.
 *
 * @api
 */
interface CategoryRegistryInterface
{
    /**
     * Get the current category object.
     *
     * @return \Magento\Catalog\Api\Data\CategoryInterface|null
     */
    public function getCurrentCategory(): ?CategoryInterface;

    /**
     * Set the current category object.
     *
     * @param \Magento\Catalog\Api\Data\CategoryInterface $currentCategory
     * @return self
     */
    public function setCurrentCategory(CategoryInterface $currentCategory): self;
}
