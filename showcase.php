<div class="sixteen columns">
    
    <?php
        
        $showcase_type = get_theme_mod( 'wishbone_showcase_type_setting' );
        $showcase_heading = get_theme_mod( 'wishbone_showcase_heading_setting' );
        $showcase_slogan = get_theme_mod( 'wishbone_showcase_slogan_setting' );
		$showcase_bg = get_theme_mod( 'wishbone_showcase_bg_color_setting' );
        $showcase_img = get_theme_mod( 'wishbone_showcase_img_setting' );
        
        if( $showcase_type !='' ) {
            switch ( $showcase_type ) {
                
                case 'static' :
					
                    echo '<div id="welcomeslogan">';    
                    echo '<h1>' . $showcase_heading . '</h1>';
                    echo '<p>' . $showcase_slogan . '</p>';
                    echo '</div>';
                    
                    echo '<style>';
					echo '#showcase { background-color: url(' . $showcase_bg . '); }';
                    echo '#showcase { background-image: url(' . $showcase_img . '); }';
                    echo '</style>';
					
                break;
            
                case 'slider' :
					
                    get_template_part( 'section-slider' );
					
                break;
            }
        }

    ?>
    
</div><!-- end of sixteen columns -->