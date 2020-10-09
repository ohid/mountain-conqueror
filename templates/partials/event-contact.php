<?php
/**
 * The event contact partial template for the single event template
 * Included in templates/article-single-event.php
 * 
 * @package mountain-conqueror
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

global $post;

use Inpsyde\Events\Model\Event;

$event = Event::fromPost($post);
$contactPerson = $event->contactPerson();

?>

<div class="contact-person">

    <?php

    printf('<p>%s</p>', esc_html__('Contact person', 'mountain-conqueror'));
    
    printf(
        _x(
            '<span>%1$s %2$s</span>
            <span class="position">%3$s</span>
            <span class="phone">%4$s</span>
            <span class="email">%5$s</span>',
            'Event contact person details',
            'mountain-conqueror'
        ),
        
        $contactPerson->firstName(),
        $contactPerson->lastName(),
        $contactPerson->position(),
        $contactPerson->telephone(),
        $contactPerson->email()
    );

    ?>

</div>
