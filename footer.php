<?php 
/**
 * The footer file of Mountain Conqueror theme
 * 
 * @package mountain-conqueror
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

?>
        <footer class="site-footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-9 offset-md-3">
                        <div class="footer-content d-flex">

                            <?php

                                // Display the footer copyright text
                                echo mconqueror_footer_copyright();
                                
                                // Display the footer social links
                                echo mconqueror_footer_socials();
                                
                                // Display the footer imprint link
                                echo mconqueror_footer_imprint();
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

    </div>
    <!-- End <div class="site-wrapper"> -->


    <?php wp_footer(); ?>

</body>

</html>
