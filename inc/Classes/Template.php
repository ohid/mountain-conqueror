<?php declare(strict_types=1);

namespace MConqueror\Classes;
use Inpsyde\Events\Model\Event;


class Template
{

    /**
     * Generates the footer copyright text with necessary HTML markup
     *
     * @return string
     */
    public static function footerCopyright() : string
    {
        // Display a static copyright text for now, we will make it dynamic later
        $output = sprintf('<div class="footer-copyright"><p>@2020 by Ohidul Islam</p></div>');

        return $output;
    }

    /**
     * Generates the footer social profile links with necessary HTML markup
     *
     * @return string
     */
    public static function footerSocials() : string
    {
        // Display static social links for now, we will make it dynamic later
        $output = '<div class="footer-socials">';
        
        $output .= sprintf('<span>Follow my adventures</span>');

        $output .= '<span class="social-list">
                        <a href="#" class="social-instagram"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="social-twitter"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="social-vimeo"><i class="fab fa-vimeo"></i></a>
                        <a href="#" class="social-youtube"><i class="fab fa-youtube"></i></a>
                    </span>';

        $output .= '</div>';

        return $output;
    }

    /**
     * Generates the footer imprint link with necessary HTML markup
     *
     * @return string
     */
    public static function footerImprint() : string
    {
        // Display a static imprint button for now, we will make it dynamic later
        $output = sprintf('<div class="footer-imprint"><a href="#">Imprint</a></div>');

        return $output;
    }

    public static function eventMeta($post)
    {
        $event = Event::fromPost($post);

        printf(
            '<p class="event-meta">%s - %s > %s</p>',
            $event->startDate()->format('d'),
            $event->endDate()->format(get_option('date_format')),
            $event->location()->country()
        );
    }
}
