<?php declare(strict_types=1);

namespace MConqueror\Classes;

use Inpsyde\Events\Model\Event;

class Template
{
    /**
     * Generate the logo for the site
     *
     * @return void
     */
    public static function siteLogo()
    {
        // Check if there has a custom logo set from the customizer
        if (has_custom_logo()) {
            $logo = wp_get_attachment_image_src(get_theme_mod('custom_logo'), 'full');

            printf(
                '<a href="%s"><img src="%s" alt="%s"></a>',
                esc_url(home_url('/')),
                esc_url($logo[0]),
                esc_attr(get_bloginfo('name'))
            );
        } else {
            // otherwise display fallback logo from the theme source
            printf(
                '<a href="%s"><img src="%s" alt="%s"></a>',
                esc_url(home_url('/')),
                esc_attr(get_template_directory_uri() . '/assets/img/logo.png'),
                esc_attr(get_bloginfo('title'))
            );
        }
    }

    /**
     * Markup for the header slogan
     *
     * @return void
     */
    public static function headerSlogan()
    {
        // Retrieve the values from the customizer api
        $slogan = get_theme_mod('header_slogan');
        $author = get_theme_mod('header_author');

        if ($slogan) {
            printf('<h1>%s</h1>', esc_html($slogan));
        }

        if ($author) {
            printf('<h4>%s</h4>', esc_html($author));
        }
    }

    /**
     * Generate the archive title
     *
     * @return void
     */
    public static function archiveTitle()
    {
        if (is_archive()) {
            printf(
                '<h1 class="archive-title">%1$s <em>%2$s</em></h1>', 
                __('Showing archive for', 'mountain-conqueror'), 
                get_the_archive_title()
            );
        } elseif (is_search()) {
            printf(
                '<h1 class="archive-title">%1$s <em>%2$s</em></h1>', 
                __('Search results for:', 'mountain-conqueror'), 
                get_search_query()
            );
        }
    }

    /**
     * Generates the footer copyright text with necessary HTML markup
     *
     * @return string
     */
    public static function footerCopyright() : string
    {
        // Retrieve the settings from the customizer api
        $footer_copyright = get_theme_mod('footer_copyright_settings');

        $output = sprintf('<div class="footer-copyright"><p>%s</p></div>', $footer_copyright);

        return $output;
    }

    /**
     * Generates the footer social profile links with necessary HTML markup
     *
     * @return string
     */
    public static function footerSocials() : string
    {
        // Retrieve the settings from the customizer api
        $footer_social_title = get_theme_mod('footer_social_title');

        // The defined social profiles
        $socialProfiles = [
            'instagram' => 'footer_instagram_url',
            'twitter' => 'footer_twitter_url',
            'vimeo' => 'footer_vimeo_url',
            'youtube' => 'footer_youtube_url',
        ];

        $output = '<div class="footer-socials">';
        
        if ($footer_social_title) {
            $output .= sprintf('<span>%s</span>', $footer_social_title);
        }

        $output .= '<span class="social-list">';
            
        // Loop through the social profiles and display them
        foreach ($socialProfiles as $name => $theme_mod) {
            $social_link = get_theme_mod($theme_mod);

            if ($social_link) {
                $output .= sprintf('<a href="%1$s" class="social-%2$s"><i class="fab fa-%2$s"></i></a>', $social_link, $name);
            }
        }
                        
        $output .= '</span>';

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
        // Retrieve the settings from the customizer api
        $footer_imprint_label = get_theme_mod('footer_imprint_label');
        $footer_imprint_url = get_theme_mod('footer_imprint_url');

        $output = '';
        
        if ($footer_imprint_label) {
            $output = sprintf(
                '<div class="footer-imprint"><a href="%s">%s</a></div>',
                $footer_imprint_url,
                $footer_imprint_label
            );
        }

        return $output;
    }

    /**
     * Display the event meta data
     *
     * @param \WP_Post $post
     * @return void
     */
    public static function eventMeta(\WP_Post $post)
    {
        $event = Event::fromPost($post);

        printf(
            '<p class="event-meta">%s - %s > %s</p>',
            esc_html($event->startDate()->format('d')),
            esc_html($event->endDate()->format('d.m.Y')),
            esc_html($event->location()->country())
        );
    }
}
