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
            'title'          => __('Theme Options', 'mountain-conqueror'),
            'description'    => __('Use the theme options', 'mountain-conqueror'),
        ]);
        
        // Generate the footer copyright panel
        $this->header($wp_customize);
        
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
    public function header(\WP_Customize_Manager $wp_customize)
    {
        // Create footer copyright section
        $wp_customize->add_section('header', [
            'title' => __('Header', 'mountain-conqueror'),
            'description' => __('Customize the header texts', 'mountain-conqueror'),
            'panel' => 'mconqueror_options',
        ]);
                
        // Create the footer copyright text field
        $wp_customize->add_setting('header_slogan', [
            'type' => 'theme_mod',
            'transport' => 'refresh',
        ]);
        $wp_customize->add_control('header_slogan_control', [
            'label' => __('Slogan', 'mountain-conqueror'),
            'description' => __('Change the header slogan text', 'mountain-conqueror'),
            'section' => 'header',
            'settings' => 'header_slogan',
            'type' => 'text',
        ]);
                
        // Create the footer copyright text field
        $wp_customize->add_setting('header_author', [
            'type' => 'theme_mod',
            'transport' => 'refresh',
        ]);
        $wp_customize->add_control('header_author_control', [
            'label' => __('Author name', 'mountain-conqueror'),
            'description' => __('Change the author name', 'mountain-conqueror'),
            'section' => 'header',
            'settings' => 'header_author',
            'type' => 'text',
        ]);
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
            'title' => __('Footer Copyright', 'mountain-conqueror'),
            'description' => __('Customize the footer copyright text', 'mountain-conqueror'),
            'panel' => 'mconqueror_options',
        ]);
                
        // Create the footer copyright text field
        $wp_customize->add_setting('footer_copyright_settings', [
            'type' => 'theme_mod',
            'transport' => 'refresh',
        ]);
        $wp_customize->add_control('footer_copyright_settings_control', [
            'label' => __('Footer Copyright', 'mountain-conqueror'),
            'description' => __('Change the footer copyright text', 'mountain-conqueror'),
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
            'title' => __('Footer Social', 'mountain-conqueror'),
            'description' => __('Customize the footer social profiles', 'mountain-conqueror'),
            'panel' => 'mconqueror_options',
        ]);
                
        // Create the footer social controls
        $wp_customize->add_setting('footer_social_title', [
            'type' => 'theme_mod',
            'transport' => 'refresh',
        ]);
        $wp_customize->add_control('footer_social_title_control', [
            'label' => __('Title', 'mountain-conqueror'),
            'description' => __('Add a title before the social', 'mountain-conqueror'),
            'section' => 'footer_social',
            'settings' => 'footer_social_title',
            'type' => 'text',
        ]);
        
        $wp_customize->add_setting('footer_instagram_url', [
            'type' => 'theme_mod',
            'transport' => 'refresh',
        ]);
        $wp_customize->add_control('footer_instagram_url_control', [
            'label' => __('Instagram URL', 'mountain-conqueror'),
            'description' => __('Link to the instagram URL', 'mountain-conqueror'),
            'section' => 'footer_social',
            'settings' => 'footer_instagram_url',
            'type' => 'url',
        ]);

        $wp_customize->add_setting('footer_twitter_url', [
            'type' => 'theme_mod',
            'transport' => 'refresh',
        ]);
        $wp_customize->add_control('footer_twitter_url_control', [
            'label'  => __('Twitter URL', 'mountain-conqueror'),
            'description' => __('Link to the twitter URL', 'mountain-conqueror'),
            'section' => 'footer_social',
            'settings' => 'footer_twitter_url',
            'type' => 'url',
        ]);

        $wp_customize->add_setting('footer_vimeo_url', [
            'type' => 'theme_mod',
            'transport' => 'refresh',
        ]);
        $wp_customize->add_control('footer_vimeo_url_control', [
            'label' => __('Vimeo URL', 'mountain-conqueror'),
            'description' => __('Link to the vimeo URL', 'mountain-conqueror'),
            'section' => 'footer_social',
            'settings' => 'footer_vimeo_url',
            'type' => 'url',
        ]);

        $wp_customize->add_setting('footer_youtube_url', [
            'type' => 'theme_mod',
            'transport' => 'refresh',
        ]);
        $wp_customize->add_control('footer_youtube_url_control', [
            'label' => __('Youtube URL', 'mountain-conqueror'),
            'description' => __('Link to the youtube URL', 'mountain-conqueror'),
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
            'title' => __('Footer Imprint', 'mountain-conqueror'),
            'description' => __('Customize the footer copyright text', 'mountain-conqueror'),
            'panel' => 'mconqueror_options',
        ]);
                
        // Create the footer imprint label
        $wp_customize->add_setting('footer_imprint_label', [
            'type' => 'theme_mod',
            'transport' => 'refresh',
        ]);
        $wp_customize->add_control('footer_imprint_label_control', [
            'label' => __('Imprint label', 'mountain-conqueror'),
            'description' => __('Change the Imprint link label', 'mountain-conqueror'),
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
            'label' => __('Imprint URL', 'mountain-conqueror'),
            'description' => __('Change the Imprint link', 'mountain-conqueror'),
            'section' => 'footer_imprint',
            'settings' => 'footer_imprint_url',
            'type' => 'url',
        ]);
    }
}
