<?php get_header(); ?>
<div id="page">
	<?php 
	global $wpdb;
	$rows = $wpdb->get_results( "SELECT * FROM $wpdb->posts WHERE post_status='publish' ORDER BY ID DESC" );
	?>
    <div id="content">
    <ul>
		<li>
        	<h2>Hírek</h2>
         <?php
		 $num=0;
		 foreach($rows as $row){
			 $cat=get_the_category($row->ID);
			 if($cat[0]->term_id==2){
			 echo	'<a href="'.get_permalink($row->ID).'"><div id="post">'; 
			 echo '<h1>'.$row->post_title.'</h1>';
			 $images=$wpdb->get_row( "SELECT * FROM $wpdb->posts WHERE post_status='inherit' AND post_parent='$row->ID' AND post_type='attachment' AND post_mime_type='image/jpeg'" );
			 if($images!=""){echo '<img src="'.$images->guid.'">';}
			 $content=strip_tags($row->post_content);
			 $content=explode(".",$content);
			 echo '<p>'.$content[0].$content[1].'.</p>';
			 echo '</div></a>';
			 $num++;
			 if($num==5){break;}}
			 }
		  ?>
		</li>
        
        <li>
        	<h2>Szakcikkek</h2>
             <?php
		 $num=0;
		 foreach($rows as $row){
			 $cat=get_the_category($row->ID);
			 if($cat[0]->term_id==4){
			 echo	'<a href="'.get_permalink($row->ID).'"><div id="post">'; 
			 echo '<h1>'.$row->post_title.'</h1>';
			 $images=$wpdb->get_row( "SELECT * FROM $wpdb->posts WHERE post_status='inherit' AND post_parent='$row->ID' AND post_type='attachment'" );
			 if($images!=""){echo '<img src="'.$images->guid.'">';}
			 $content=strip_tags($row->post_content);
			 $content=explode(".",$content);
 			 echo '<p>'.$content[0].$content[1].'.</p>';
			 echo '</div></a>';
			 $num++;
			 if($num==4){break;}}
			 }
		  ?>
        </li>
        
        <li>
        	<h2>Publikációk</h2>
             <?php
		 $num=0;
		 foreach($rows as $row){
			 $cat=get_the_category($row->ID);
			 if($cat[0]->term_id==3){
			 echo	'<a href="'.get_permalink($row->ID).'"><div id="post">'; 
			 echo '<h1>'.$row->post_title.'</h1>';
			 $images=$wpdb->get_row( "SELECT * FROM $wpdb->posts WHERE post_status='inherit' AND post_parent='$row->ID' AND post_type='attachment' AND post_mime_type='image/jpeg'" );
			 if($images!=""){echo '<img src="'.$images->guid.'">';}
			 $content=strip_tags($row->post_content);
			 $content=explode(".",$content);
			 echo '<p>'.$content[0].$content[1].'.</p>';
			 echo '</div></a>';
			 $num++;
			 if($num==4){break;}}
			 }
		  ?>
        </li>
        </ul>
	</div>
	
    <div id="sidebar">
    <?php get_sidebar( ); ?>
	</div>
</div>
<?php get_footer(); ?>
