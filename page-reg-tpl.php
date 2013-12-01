<?php
/*
Template Name: Reg
*/
get_header(); ?>
<div id="page">




 <?php if ( is_user_logged_in() ) { ?> 
Már be vagy jelentkezve egy felhasználóval, kérlek jelentkezz ki.

<?php }else{ ?>
<div id="reg" style="height:460px;">
<h1>Regisztráció</h1>
<ul>
<li>

<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque pharetra justo et tellus tincidunt. </p>
<ol>
<li><h2>Lorem ipsum dolor</h2><p>Pellentesque pharetra justo et tellus tincidunt, et tincidunt tellus sollicitudin.</p></li>
<li><h2>Lorem ipsum dolor</h2><p>Pellentesque pharetra justo et tellus tincidunt, et tincidunt tellus sollicitudin.</p></li>
<li><h2>Lorem ipsum dolor</h2><p>Pellentesque pharetra justo et tellus tincidunt, et tincidunt tellus sollicitudin.</p></li>
</ol>

</li>
<li>
<h3>Felhasználó létrehozása</h3>           
<?php echo do_shortcode('[register password="yes" thanks="74" fields=""]'); ?>
<p style="padding:5px 0px 5px 0px; font-size:11px;">Regisztrációval elfogadod az oldalunk Szabályzatát, illetve Kedves leszel.</p>
</li>
</ul>
</div>
<div id="reg-shadow"></div>




<?php } ?>

 
</div>
</div>
<?php get_footer(); ?>
