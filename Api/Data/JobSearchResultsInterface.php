<?php
/**
 * @author    Mudassar Iqbal <miqbal@dotcommerce.co>
 * @copyright Copyright (c) Dot Commerce
 * @license   MIT
 */

declare(strict_types=1);

namespace DotCommerce\CronScheduler\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

/**
 * @api
 */
interface JobSearchResultsInterface extends SearchResultsInterface
{
    /**
     * @return \DotCommerce\CronScheduler\Api\Data\JobInterface[]
     */
    public function getItems();

    /**
     * @param \DotCommerce\CronScheduler\Api\Data\JobInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}
