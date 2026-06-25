<?php
/**
 * @author    Mudassar Iqbal <miqbal@dotcommerce.co>
 * @copyright Copyright (c) Dot Commerce
 * @license   MIT
 */

declare(strict_types=1);

namespace DotCommerce\CronScheduler\Controller\Adminhtml\Jobs;

use DotCommerce\CronScheduler\Api\Data\JobInterface;
use DotCommerce\CronScheduler\Model\ResourceModel\Job\Collection;

class MassEnable extends AbstractMassAction
{
    protected function process(Collection $collection): void
    {
        $updated = 0;

        /** @var JobInterface $job */
        foreach ($collection as $job) {
            if (!$job->isEnabled()) {
                $job->setStatus(JobInterface::STATUS_ENABLED);
                $this->jobRepository->save($job);
                $updated++;
            }
        }

        if ($updated > 0) {
            $this->messageManager->addSuccessMessage(__('%1 job(s) have been enabled.', $updated));
        }
    }
}
