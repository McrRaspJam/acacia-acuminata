<div id="navbar">
        <div class="container">
                <a href="<?php echo get_home_url(); ?>">
                        <img src="<?php echo get_site_icon_url($size = 40); ?>" />
                </a>
                <nav>
                        <?php
                                $menuParameters = array(
                                        'theme_location' => 'primary',
                                        'container'       => false,
                                        'echo'            => false,
                                        'items_wrap'      => '%3$s',
                                        'depth'           => 0,
                                );

                                echo strip_tags(wp_nav_menu( $menuParameters ), '<a>' );
                        ?>
                </nav>
        </div>
</div>
