<?php
/**
 * DotCommerce Cron Scheduler for Magento 2.
 *
 * @author    Mudassar Iqbal <miqbal@dotcommerce.co>
 * @copyright Copyright (c) Dot Commerce
 * @license   MIT
 */

declare(strict_types=1);

use Magento\Framework\Component\ComponentRegistrar;

ComponentRegistrar::register(
    ComponentRegistrar::MODULE,
    'DotCommerce_CronScheduler',
    __DIR__
);
