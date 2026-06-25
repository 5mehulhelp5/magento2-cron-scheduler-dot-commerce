<?php
/**
 * @author    Mudassar Iqbal <miqbal@dotcommerce.co>
 * @copyright Copyright (c) Dot Commerce
 * @license   MIT
 */

declare(strict_types=1);

namespace DotCommerce\CronScheduler\Model;

use DotCommerce\CronScheduler\Api\Data\JobInterface;
use Magento\Cron\Model\ResourceModel\Schedule as ScheduleResource;
use Magento\Cron\Model\Schedule;
use Magento\Cron\Model\ScheduleFactory;
use Magento\Framework\Stdlib\DateTime\DateTime;

class JobScheduler
{
    public function __construct(
        private readonly ScheduleFactory $scheduleFactory,
        private readonly ScheduleResource $scheduleResource,
        private readonly DateTime $dateTime
    ) {
    }

    public function scheduleNow(JobInterface $job): void
    {
        $now = $this->dateTime->gmtDate();

        /** @var Schedule $schedule */
        $schedule = $this->scheduleFactory->create();
        $schedule->setJobCode((string) $job->getJobCode())
            ->setStatus(Schedule::STATUS_PENDING)
            ->setCreatedAt($now)
            ->setScheduledAt($now);

        $this->scheduleResource->save($schedule);
    }
}
