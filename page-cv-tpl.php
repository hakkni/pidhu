<?php
/*
Template Name: Publik CV
*/
get_header(); 
$cv_user=get_user_by( 'slug',$_GET['user']  ); 
$cv_user_info = get_userdata( $cv_user->ID);
$akt_user_info = get_userdata( get_current_user_id());	
?>
<div id="page">
<div id="reg">
	<h1>CURRICULUM VITAE</h1>
<?php if($cv_user_info->user_publikcv=="1" ||$akt_user_info->ID==$cv_user_info->ID){ ?>    
<div id="vcard">
<ul>
<li>
<div id="vcard_imgholder"><img src="../uploads/<?php echo $cv_user_info->user_picture; ?>"></div>
</li>
<li>
<h2 style="font-size:30px"><?php echo $cv_user_info->user_lastname.' '.$cv_user_info->user_firstname; ?></h2>
<p><?php echo $cv_user_info->user_city.' | '.$cv_user_info->user_email;?></p><br>
<p>
           <?php if($cv_user_info->user_facebook!=""){ ?><a href="<?php echo $cv_user_info->user_facebook; ?>"> <img src="<?php echo get_template_directory_uri(); ?>/images/facebook.png" width="32" height="32" /></a><?php }?>
           
           <?php if($cv_user_info->user_linkedin!=""){ ?><a href="<?php echo $cv_user_info->user_linkedin; ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/linkedin.png" width="32" height="32" /></a><?php }?>
</p><br>
<?php if($cv_user_info->user_pdf!==""){ ?><p>Bemutatkozó anyagom: <a href="../uploads/<?php echo $cv_user_info->user_pdf; ?>">.pdf formátumban</a></p><?php } ?><br>
<?php if($cv_user_info->user_jobs!==""){?><p>Nyitott vagyok az állásmegkeresésekre.</p><?php } ?>
</li>
</ul>
</div>
<?php if($cv_user_info->user_edu!==""){?><h1>Képzéseim</h1>
    <div id="cv_edu" style="height:auto;">
    <ul>
    <li style="height:auto; min-height:0px !important;"><ul ><?php 
	$edu=json_decode($cv_user_info->user_edu);
	for($i=0;$i<sizeof($edu);$i++){
	echo '<li>';
	echo '<h2>'.urlencodeunicode($edu[$i]->hol).'</h2>';
	echo urlencodeunicode($edu[$i]->kezdes).'-';
	echo urlencodeunicode($edu[$i]->befejez);
	echo '<p>'.urlencodeunicode($edu[$i]->mit).' - ';
	echo urlencodeunicode($edu[$i]->tipus).'</p>';
	echo '</li>';
	}
	?></ul>
	 </li>
     </div><?php } ?>
     
      <?php if($cv_user_info->user_work!==""){?><h1>Tapasztalatom</h1>
     <div id="cv_work">
    <ul>
    <li style="height:auto; min-height:0px !important;"><ul><?php 
	$edu=json_decode($cv_user_info->user_work);
	for($i=0;$i<sizeof($edu);$i++){
	echo '<li>';
	echo '<h2>'.urlencodeunicode($edu[$i]->hol).'</h2>';
	echo urlencodeunicode($edu[$i]->kezdes).'-';
	echo urlencodeunicode($edu[$i]->befejez);
	echo '<p>'.urlencodeunicode($edu[$i]->mit).' - ';
	echo urlencodeunicode($edu[$i]->tipus).'</p>';
	echo '</li>';
	}
	?></ul>
	 </li>
     </div><?php } ?>
     
     <?php if($cv_user_info->user_lang!==""){?><h1>Szakmai nyelvismeret</h1>
    <div id="cv_lang">
 <ul>
    <li  style="height:auto; min-height:0px !important;"><ul><?php 
	$lang=json_decode($cv_user_info->user_lang);
	for($i=0;$i<sizeof($lang);$i++){
	echo '<li>';
	echo '<h2>'.urlencodeunicode($lang[$i]->nyelv).'</h2>';
	echo '<p>'.urlencodeunicode($lang[$i]->szint).' - ';
	if($lang[$i]->szakmai==1){echo 'szakmában már használtam.'; }
	echo '</p>';
	echo '</li>';
	}
	?></ul>
	 </li>
     </ul>
     </div><?php } ?>

<?php }else{ ?>
<p>Sajnos a felhasználó nem tette nyilvánossá a profilját.</p>
<br><br>
<?php }?>
</div>
<div id="reg-shadow"></div>


  

</div>
</div>
<?php get_footer(); ?>
