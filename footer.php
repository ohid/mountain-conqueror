<?php use MConqueror\Classes\Template;

/**
 * The footer file of Mountain Conqueror theme
 *
 * @package mountain-conqueror
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;
?>
                </div>
            </div>
            <?php do_action('mc_end_main'); ?>
        </section>
        <!-- Ending of <section class="main"> -->

        <?php do_action('mc_before_footer'); ?>
        <footer class="site-footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-9 offset-md-3">
                        <div class="footer-content d-flex">

                            <?php
                                // Display the footer copyright text
                                echo Template::footerCopyright();
                                
                                // Display the footer social links
                                echo Template::footerSocials();
                                
                                // Display the footer imprint link
                                echo Template::footerImprint();
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <?php do_action('mc_after_footer'); ?>

    </div>
    <!-- End <div class="site-wrapper"> -->
    <?php do_action('mc_after_site_wrapper'); ?>

    <?php wp_footer(); ?>
</body>

</html>
