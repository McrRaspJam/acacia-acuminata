<nav id="navbar">
        <div class="navspacer"></div>
        <?php
                $menuParameters = array(
                        'theme_location' => 'primary',
                        'container'       => false,
                        'echo'            => false,
                        'items_wrap'      => '%3$s',
                        'depth'           => 0,
                );

                echo strip_tags(wp_nav_menu( $menuParameters ), '<a>' );
                get_search_form();
        ?>
        <div class="navspacer"></div>
</nav>
