<?php
/**
 * Title: Contact
 * Slug: myemmel/contact
 * Categories: myemmel
 * Inserter: true
 */
$mail = antispambot( 'bjoern@myemmel.com' );
?>
<!-- wp:group {"anchor":"contact","className":"contact"} -->
<div class="wp-block-group contact" id="contact"><!-- wp:group {"className":"wrap"} -->
<div class="wp-block-group wrap"><!-- wp:heading -->
<h2 class="wp-block-heading">If you'd like to talk, write to me.</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>I live near Frankfurt and read every message myself.</p>
<!-- /wp:paragraph -->

<!-- wp:html -->
<div class="btns">
  <a class="btn" href="https://www.linkedin.com/in/emmel" target="_blank" rel="noopener">LinkedIn →</a>
  <a class="mail" href="mailto:<?php echo $mail; ?>"><?php echo $mail; ?></a>
</div>
<!-- /wp:html --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
