<?php
/**
 * Title: Hero
 * Slug: myemmel/hero
 * Categories: myemmel
 * Inserter: true
 */
$img = 'assets/images/portrait-';
?>
<!-- wp:group {"className":"hero"} -->
<div class="wp-block-group hero"><!-- wp:group {"className":"wrap hero-grid"} -->
<div class="wp-block-group wrap hero-grid"><!-- wp:group -->
<div class="wp-block-group"><!-- wp:heading {"level":1} -->
<h1 class="wp-block-heading"><span class="line">What can we</span><span class="line"><span class="mark">stop doing?</span></span></h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"role"} -->
<p class="role">Transformation, strategy and operations.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"intro"} -->
<p class="intro">I help organisations focus on what matters and finish what they start. I've done this as a consultant, as a COO, and as the person responsible for Lean, strategy and transformation in industrial and technology companies.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"className":"intro"} -->
<p class="intro">Before that I played field hockey for Germany. Three Olympic Games, three world titles, number 11 on my back.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:html -->
<figure class="portrait"><img class="photo" src="<?php echo esc_url( get_theme_file_uri( $img . '760.jpg' ) ); ?>" srcset="<?php echo esc_url( get_theme_file_uri( $img . '380.jpg' ) ); ?> 380w, <?php echo esc_url( get_theme_file_uri( $img . '760.jpg' ) ); ?> 760w, <?php echo esc_url( get_theme_file_uri( $img . '1086.jpg' ) ); ?> 1086w" sizes="(max-width: 820px) 320px, 380px" alt="Björn Emmerling" width="760" height="1013" fetchpriority="high"></figure>
<!-- /wp:html --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
