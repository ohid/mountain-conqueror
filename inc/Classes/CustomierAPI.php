<?php

namespace MConqueror\Classes;

class CustomierAPI
{
    public function register()
    {
        add_action('customize_register', [$this, 'customerAPI']);
    }

    public function customerAPI($wp_customize)
    {
        // Create the theme options
        $wp_customize->add_panel('mconqueror_options', [
            'priority'       => 10,
            'title'          => __('Theme Options', 'mountain_conqueror'),
            'description'    => __('Use the theme options', 'mountain_conqueror'),
        ]);
        
        // Generate the footer copyright panel
        $this->footerCopyright($wp_customize);
        
        // Generate the footer socials panel
        $this->footerSocials($wp_customize);

        // Generate the footer imprint panel
        $this->footerImprint($wp_customize);
    }

    /**
     * Footer copyright section and settings field
     *
     * @param \WP_Customize_Manager $wp_customize
     * @return void
     */
    public function footerCopyright(\WP_Customize_Manager $wp_customize)
    {
        // Create footer copyright section
        $wp_customize->add_section('footer_copyright', [
            'title' => __('Footer Copyright', 'mountain_conqueror'),
            'description' => __('Customize the footer copyright text', 'mountain_conqueror'),
            'panel' => 'mconqueror_options',
        ]);
                
        // Create the footer copyright text field
        $wp_customize->add_setting('footer_copyright_settings', [
            'type' => 'theme_mod',
            'transport' => 'refresh',
        ]);
        $wp_customize->add_control('footer_copyright_settings_control', [
            'label' => __('Footer Copyright', 'mountain_conqueror'),
            'description' => __('Change the footer copyright text', 'mountain_conqueror'),
            'section' => 'footer_copyright',
            'settings' => 'footer_copyright_settings',
            'type' => 'text',
        ]);
    }

    /**
     * Footer socials panel and fields
     *
     * @param \WP_Customize_Manager $wp_customize
     * @return void
     */
    public function footerSocials(\WP_Customize_Manager $wp_customize)
    {
        // Create footer social section
        $wp_customize->add_section('footer_social', [
            'title' => __('Footer Social', 'mountain_conqueror'),
            'description' => __('Customize the footer social profiles', 'mountain_conqueror'),
            'panel' => 'mconqueror_options',
        ]);
                
        // Create the footer social controls
        $wp_customize->add_setting('footer_social_title', [
            'type' => 'theme_mod',
            'transport' => 'refresh',
        ]);
        $wp_customize->add_control('footer_social_title_control', [
            'label' => __('Title', 'mountain_conqueror'),
            'description' => __('Add a title before the social', 'mountain_conqueror'),
            'section' => 'footer_social',
            'settings' => 'footer_social_title',
            'type' => 'text',
        ]);
        
        $wp_customize->add_setting('footer_instagram_url', [
            'type' => 'theme_mod',
            'transport' => 'refresh',
        ]);
        $wp_customize->add_control('footer_instagram_url_control', [
            'label' => __('Instagram URL', 'mountain_conqueror'),
            'description' => __('Link to the instagram URL', 'mountain_conqueror'),
            'section' => 'footer_social',
            'settings' => 'footer_instagram_url',
            'type' => 'url',
        ]);

        $wp_customize->add_setting('footer_twitter_url', [
            'type' => 'theme_mod',
            'transport' => 'refresh',
        ]);
        $wp_customize->add_control('footer_twitter_url_control', [
            'label'  => __('Twitter URL', 'mountain_conqueror'),
            'description' => __('Link to the twitter URL', 'mountain_conqueror'),
            'section' => 'footer_social',
            'settings' => 'footer_twitter_url',
            'type' => 'url',
        ]);

        $wp_customize->add_setting('footer_vimeo_url', [
            'type' => 'theme_mod',
            'transport' => 'refresh',
        ]);
        $wp_customize->add_control('footer_vimeo_url_control', [
            'label' => __('Vimeo URL', 'mountain_conqueror'),
            'description' => __('Link to the vimeo URL', 'mountain_conqueror'),
            'section' => 'footer_social',
            'settings' => 'footer_vimeo_url',
            'type' => 'url',
        ]);

        $wp_customize->add_setting('footer_youtube_url', [
            'type' => 'theme_mod',
            'transport' => 'refresh',
        ]);
        $wp_customize->add_control('footer_youtube_url_control', [
            'label' => __('Youtube URL', 'mountain_conqueror'),
            'description' => __('Link to the youtube URL', 'mountain_conqueror'),
            'section' => 'footer_social',
            'settings' => 'footer_youtube_url',
            'type' => 'url',
        ]);
    }

    /**
     * Footer imprint section and fields
     *
     * @param \WP_Customize_Manager $wp_customize
     * @return void
     */
    public function footerImprint(\WP_Customize_Manager $wp_customize)
    {
        // Create footer copyright section
        $wp_customize->add_section('footer_imprint', [
            'title' => __('Footer Imprint', 'mountain_conqueror'),
            'description' => __('Customize the footer copyright text', 'mountain_conqueror'),
            'panel' => 'mconqueror_options',
        ]);
                
        // Create the footer imprint label
        $wp_customize->add_setting('footer_imprint_label', [
            'type' => 'theme_mod',
            'transport' => 'refresh',
        ]);
        $wp_customize->add_control('footer_imprint_label_control', [
            'label' => __('Imprint label', 'mountain_conqueror'),
            'description' => __('Change the Imprint link label', 'mountain_conqueror'),
            'section' => 'footer_imprint',
            'settings' => 'footer_imprint_label',
            'type' => 'text',
        ]);

        // Create the footer imprint URL
        $wp_customize->add_setting('footer_imprint_url', [
            'type' => 'theme_mod',
            'transport' => 'refresh',
        ]);
        $wp_customize->add_control('footer_imprint_url_control', [
            'label' => __('Imprint URL', 'mountain_conqueror'),
            'description' => __('Change the Imprint link', 'mountain_conqueror'),
            'section' => 'footer_imprint',
            'settings' => 'footer_imprint_url',
            'type' => 'url',
        ]);
    }
}
