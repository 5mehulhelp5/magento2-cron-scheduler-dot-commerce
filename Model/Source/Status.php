<?php
/**
 * @author    Mudassar Iqbal <miqbal@dotcommerce.co>
 * @copyright Copyright (c) Dot Commerce
 * @license   MIT
 */

declare(strict_types=1);

namespace DotCommerce\CronScheduler\Model\Source;

use Magento\Framework\Phrase;

/**
 * Canonical enabled/disabled state for a managed cron job.
 */
enum Status: int
{
    case DISABLED = 0;
    case ENABLED  = 1;

    public function label(): Phrase
    {
        return match ($this) {
            self::DISABLED => __('Disabled'),
            self::ENABLED => __('Enabled'),
        };
    }
}
