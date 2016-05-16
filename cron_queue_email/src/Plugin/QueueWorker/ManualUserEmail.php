<?php
namespace Drupal\cron_queue_email\Plugin\QueueWorker;
use Drupal\cron_queue_email\Plugin\QueueWorker\RegisteredUserEmailBase;

/**
 * A Email Sender that publishes sends email to registered users on CRON run.
 *
 * @QueueWorker(
 *   id = "manual_user_email",
 *   title = @Translation("Manual Registered User Email"),
 *   cron = {"time" = 10}
 * )
 */
class ManualUserEmail extends RegisteredUserEmailBase {
  //print_r('in user email register class');

}