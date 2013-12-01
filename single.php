<?php get_header(); ?>
<div id="page">

   <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
       <div id="content">
		<?php
		$cat=get_the_category(get_the_ID());
		 if(2!=$cat[0]->term_id){?><div id="single"><?php }else{ ?><div id="news"><?php }?>
         	<h2><?php echo $cat[0]->name; ?></h2>
			<h1><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h1>

			<?php the_content('Olvass tovabb;'); ?>
            
			</div>
			<?php endwhile; else: ?>

				<div class="warning">
				<p>Elnézést, tévedes történt.</p>
                </div>
				<?php endif; ?>
		<?php if(2==$cat[0]->term_id){?>
        <?php 
	global $wpdb;
	$rows = $wpdb->get_results( "SELECT * FROM $wpdb->posts WHERE post_status='publish' ORDER BY ID DESC" );
	?>
	 <ul>
		<li>
        	<h2>További híreink</h2>
         <?php
		 $num=0;
		 foreach($rows as $row){
			 $cat=get_the_category($row->ID);
			 if($cat[0]->term_id==2&&$row->ID!=get_the_ID()){
			 echo	'<a href="'.get_permalink($row->ID).'"><div id="post">'; 
			 echo '<h1>'.$row->post_title.'</h1>';
			 $images=$wpdb->get_row( "SELECT * FROM $wpdb->posts WHERE post_status='inherit' AND post_parent='$row->ID' AND post_type='attachment' AND post_mime_type='image/jpeg'" );
			 if($images!=""){echo '<img src="'.$images->guid.'">';}
			 $content=explode(".",$row->post_content);
			 echo '<p>'.$content[0].'.</p>';
			 echo '</div></a>';
			 $num++;
			 if($num==4){break;}}
			 }
		  ?>
		</li>
        </ul>
        <?php }?>
        
	</div>

	
    <div id="sidebar">
    <?php get_sidebar( ); ?>
	</div>
</div>
<?php get_footer(); ?>
