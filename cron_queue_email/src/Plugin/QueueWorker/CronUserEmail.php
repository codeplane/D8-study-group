<?php
namespace Drupal\cron_queue_email\Plugin\QueueWorker;
use Drupal\cron_queue_email\Plugin\QueueWorker\RegisteredUserEmailBase;

/**
 * A Email Sender that publishes sends email to registered users on CRON run.
 *
 * @QueueWorker(
 *   id = "cron_user_email",
 *   title = @Translation("Cron Registered User Email"),
 *   cron = {"time" = 10}
 * )
 */
class CronUserEmail extends RegisteredUserEmailBase {
  //print_r('in user email register class');

}