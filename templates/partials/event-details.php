<?php
/**
 * The event details partial template for the single event template
 * Included in templates/article-single-event.php
 *
 * @package mountain-conqueror
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

global $post;

use Inpsyde\Events\Model\Event;

$event = Event::fromPost($post);

?>
<table>
    <tbody>
        <tr>
            <th><?php esc_html_e('Date of Event:', 'mountain-conqueror'); ?></th>
            <td>
                <?php
                printf(
                    '<span>%s - %s</span>',
                    esc_html($event->startDate()->format('d')),
                    esc_html($event->endDate()->format('d.m.Y'))
                );
                ?>
            </td>
        </tr>

        <tr>
            <th><?php esc_html_e('Time:', 'mountain-conqueror'); ?></th>
            <td><?php esc_html_e('8:00 - 16:00', 'mountain-conqueror'); ?></td>
        </tr>
        
        <tr>
            <th><?php esc_html_e('Location:', 'mountain-conqueror'); ?></th>
            <td>
                <?php
                $location = $event->location();

                printf(
                    _x(
                        '<span class="name-and-street">%1$s, %2$s,</span>
                        <span class="city">%3$s, %4$s,</span>
                        <span class="country">%5$s</span>',
                        'Event full address',
                        'mountain-conqueror'
                    ),
                    esc_html($location->name()),
                    esc_html($location->street()),
                    esc_html($location->postalCode()),
                    esc_html($location->city()),
                    esc_html($location->country())
                );
                ?>
            </td>
        </tr>

        <tr>
            <th><?php esc_html_e('Subscriber:', 'mountain-conqueror'); ?></th>
            <td>
                <?php
                printf(
                    esc_html_x('%1$s - %2$s', 'Min and max subscriber', 'mountain-conqueror'),
                    esc_html($event->subscribedMin()),
                    esc_html($event->subscribedMax())
                );
                ?>
            </td>
        </tr>

        <tr>
            <th><?php esc_html_e('Price:', 'mountain-conqueror'); ?></th>
            <td><?php esc_html_e('110 €:', 'mountain-conqueror'); ?></td>
        </tr>

        <tr>
            <th><?php esc_html_e('Included in price:', 'mountain-conqueror'); ?></th>
            <td>
                <?php
                echo implode(
                    _x(', ', 'Event price included things separator', 'mountain-conqueror'),
                    $event->includedInPrice()
                );
                ?>
            </td>

        </tr>

        <tr>
            <th><?php esc_html_e('Registration End:', 'mountain-conqueror'); ?></th>
            <td><?php echo esc_html($event->registrationEnd()->format('d.m.Y')); ?></td>
        </tr>
    </tbody>
</table>