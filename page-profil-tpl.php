<?php
/*
Template Name: Profil
*/
get_header(); 
$user_info = get_userdata(get_current_user_id()); 
$lock=md5($user_info->user_login.$user_info->user_email.$user_info->user_pass);
$key=$lock;

$user_profile_error="";


if($_GET["form"]=="usr"){
	if($_POST['pids']==$lock){
		$user_id=get_current_user_id();
	 wp_update_user( array ( 'ID' => $user_id,'user_email'=>cleantohtml($_POST['user_mail']), 'user_nicename' => cleantohtml($_POST['user_nicename']) ) ) ;
	update_usermeta( $user_id, 'user_city', cleantohtml($_POST['user_city']) );
	update_usermeta( $user_id, 'user_phone', cleantohtml($_POST['user_phone']) );
	update_usermeta( $user_id, 'user_jobs', cleantohtml($_POST['user_jobs']) );
	update_usermeta( $user_id, 'user_events', cleantohtml($_POST['user_events']) );
	update_usermeta( $user_id, 'user_news', cleantohtml($_POST['user_news']) );}else{echo "hiba";}
	wp_redirect( get_permalink(74) ); exit; 
	}


if($_GET["form"]=="image"){
	if($_POST['pids']==$lock){
		$user_id=get_current_user_id();
		$maxsize=3*1024*1024;
	$ext=strtolower(GetExt($_FILES['userpicture']['name']));
	$whitelist="jpg, gif, jpeg, png";
	if(strpos($whitelist,$ext)!==false&&$maxsize>$_FILES['userpicture']['size']){
			$userpicture=md5($user_info->user_email).'.'.$ext;
	/*Mentes tar */  move_uploaded_file($_FILES["userpicture"]["tmp_name"], "../uploads/$userpicture");
	/*Mentes db */ update_usermeta( $user_id, 'user_picture', $userpicture );	wp_redirect( get_permalink(74) ); exit;
	}else{$user_profile_error="A Fájl feltöltése nem sikerült, kérem vegye figyelembe a szabályainkat.";}
	}
	}

if($_GET["form"]=="pdf"){
	if($_POST['pids']==$lock){
		$user_id=get_current_user_id();
	$ext=strtolower(GetExt($_FILES['user_pdf']['name']));
	$maxsize=3*1024*1024;
	if($ext=="pdf"&&$maxsize>$_FILES['user_pdf']['size']){
		$userpdf=md5($user_info->user_email).'.'.$ext;
	/*Mentes tar */  move_uploaded_file($_FILES["user_pdf"]["tmp_name"], "../uploads/$userpdf");
	/*Mentes db */	 update_usermeta( $user_id, 'user_pdf', $userpdf );	wp_redirect( get_permalink(74) ); exit; 
	}else{$user_profile_error="A Fájl feltöltése nem sikerült, kérem vegye figyelembe a szabályainkat.";}
	}
	}
	
if($_GET["form"]=="cv"){
	if($_POST['pids']==$lock){
		$user_id=get_current_user_id();
	update_usermeta( $user_id, 'last_name', cleantohtml($_POST['user_lastname']) );
	update_usermeta( $user_id, 'first_name', cleantohtml($_POST['user_firstname']) );
	update_usermeta( $user_id, 'user_linkedin', cleantohtml($_POST['user_linkedin']) );
	update_usermeta( $user_id, 'user_facebook', cleantohtml($_POST['user_facebook']) );
	update_usermeta( $user_id, 'user_skype', cleantohtml($_POST['user_skype'] ));
	update_usermeta( $user_id, 'user_publikcv',cleantohtml($_POST['user_publikcv'] ));
	update_usermeta( $user_id, 'user_birthdate', cleantohtml($_POST['user_birthdate']) );}else{echo "hiba";}
	wp_redirect( get_permalink(74) ); exit; 
	}
	
	
if($_GET["form"]=="newedu"){
	if($_POST['pids']==$lock){	
	$user_id=get_current_user_id();
	$edu=array( 
	array(   
	"hol" => cleantohtml($_POST['user_school']),
    "mit" => cleantohtml($_POST['user_degree']),
	"tipus"=>cleantohtml($_POST['user_szak']),
	"kezdes"=>cleantohtml($_POST['user_start']),
	"befejez"=>cleantohtml($_POST['user_end']),));
	
		if($user_info->user_edu==""){
			$edu=json_encode($edu);
			update_usermeta( $user_id, 'user_edu',$edu);
			
		}else{
				$edus=json_decode($user_info->user_edu);
				$edus=array_merge($edus,$edu);
				$edus=json_encode(array_values($edus));
				update_usermeta( $user_id, 'user_edu',$edus);
			
			}
			wp_redirect( get_permalink(74) ); exit; 
	}}

if($_GET["form"]=="killedu"){
	$user_id=get_current_user_id();
$edus=json_decode($user_info->user_edu);
unset($edus[$_GET['id']]);
$edus=json_encode(array_values($edus));
update_usermeta( $user_id, 'user_edu',$edus);
			wp_redirect( get_permalink(74) ); exit; 

}	

if($_GET["form"]=="newlang"){
	if($_POST['pids']==$lock){	
	$user_id=get_current_user_id();
	$lang=array( 
	array(   
	"nyelv" => cleantohtml($_POST['user_ltype']),
    "szint" => cleantohtml($_POST['user_lrank']),
	"szakmai"=>cleantohtml($_POST['user_ljob']),));
	
		if($user_info->user_lang==""){
			$lang=json_encode($lang);
			update_usermeta( $user_id, 'user_lang',$lang);
			
		}else{
				$langs=json_decode($user_info->user_lang);
				$langs=array_merge($langs,$lang);
				$langs=json_encode(array_values($langs));
				update_usermeta( $user_id, 'user_lang',$langs);
			
			}
			wp_redirect( get_permalink(74) ); exit; 
	}}

if($_GET["form"]=="killlang"){
	$user_id=get_current_user_id();
$langs=json_decode($user_info->user_lang);
unset($langs[$_GET['id']]);
$langs=json_encode(array_values($langs));
update_usermeta( $user_id, 'user_lang',$langs);
			wp_redirect( get_permalink(74) ); exit; 

}		

if($_GET["form"]=="newwork"){
	if($_POST['pids']==$lock){	
	$user_id=get_current_user_id();
	$work=array( 
	array(   
	"hol" => cleantohtml($_POST['user_wplace']),
    "mit" => cleantohtml($_POST['user_wjob']),
	"tipus"=>cleantohtml($_POST['user_wtype']),
	"kezdes"=>cleantohtml($_POST['user_wstart']),
	"befejez"=>cleantohtml($_POST['user_wend']),));
	
		if($user_info->user_work==""){
			$work=json_encode($work);
			update_usermeta( $user_id, 'user_work',$work);
			
		}else{
				$works=json_decode($user_info->user_work);
				$works=array_merge($works,$work);
				$works=json_encode(array_values($works));
				update_usermeta( $user_id, 'user_work',$works);
			
			}
			wp_redirect( get_permalink(74) ); exit; 
	}}

if($_GET["form"]=="killwork"){
	$user_id=get_current_user_id();
$works=json_decode($user_info->user_work);
unset($works[$_GET['id']]);
$works=json_encode(array_values($works));
update_usermeta( $user_id, 'user_work',$works);
			wp_redirect( get_permalink(74) ); exit; 

}	
	
	
if($_GET["form"]=="funeralforafriend"){
	if($_POST['pids']==$lock){
	 wp_delete_user2( get_current_user_id(), 1 ); 
	 wp_logout();}
	}	
	
	
if($user_profile_error!=""){user_profile_error($user_profile_error);}		
	
?>
<div id="page">

 <?php if ( is_user_logged_in() ) { ?> 
<div id="reg">
	<h1>Profil<div id="tool">Szerelés</div></h1>

	<div id="user_default">
		<h2>Alapvető beállítások</h2>
        <ul><li>
		<ol>
        
    		<li><strong>Email cím:</strong><br><?php echo $user_info->user_email; ?></li>
            <li><strong>Felhasználó név:</strong><br><?php echo $user_info->user_nicename; ?></li>   
            <li><strong>Telefonszám:</strong><br><?php echo $user_info->user_phone; ?></li>
            <li><strong>Város:</strong><br><?php echo $user_info->user_city; ?></li>
            <li><strong>Szeretnék kapni Állásajánlatokat:</strong><br><?php if($user_info->user_jobs=="1"){echo "igen";}else{echo "nem";} ?></li>
            <li><strong>Szeretném ha meghívnának Szakmai eseményekre:</strong><br><?php if($user_info->user_events=="1"){echo "igen";}else{echo "nem";} ?></li>
            <li><strong>Szeretném ha küldenének hírlevelet:</strong><br><?php if($user_info->user_news=="1"){echo "igen";}else{echo "nem";} ?></li> 
            <li><div id="killorder" class="button" style="background:#F00;margin:0px;">Szeretnem Törölni Magam</div></li>           
		</ol>
        </li>
        <li>
		<ol>
        <form id="your-profile" action="<?php echo get_permalink(74); ?>&form=usr" method="post">
    		<li><strong>Email cím:</strong><br><input type="text" maxlength="50" name="user_mail" id="user_mail" value="<?php echo $user_info->user_email; ?>" class="regular-text" /></li>
            <li><strong>Felhasználó név:</strong><br><input type="text" maxlength="50" name="user_nicename" id="user_nicename" value="<?php echo $user_info->user_nicename; ?>" class="regular-text" /></li>   
            <li><strong>Telefonszám:</strong><br><input type="text" maxlength="50" name="user_phone" id="user_phone" value="<?php echo $user_info->user_phone; ?>" class="regular-text" /></li>
            <li><strong>Város:</strong><br><input type="text" maxlength="50" name="user_city" id="user_city" value="<?php echo $user_info->user_city; ?>" class="regular-text" /></li>
            <li><strong>Szeretnék kapni Állásajánlatokat:</strong><br><input type="checkbox" name="user_jobs" id="user_jobs" value="1" class="regular-text" <?php if($user_info->user_jobs=="1"){echo "checked";} ?>/></li>
            <li><strong>Szeretném ha meghívnának Szakmai eseményekre:</strong><br><input type="checkbox" name="user_events" id="user_events" value="1" class="regular-text" <?php if($user_info->user_events=="1"){echo "checked";} ?>/></li>
            <li><strong>Szeretném ha küldenének hírlevelet:</strong><br><input type="checkbox" name="user_news" id="user_news" value="1" class="regular-text" <?php if($user_info->user_news=="1"){echo "checked";} ?>/></li> 
            <li><input type="hidden" name="pids" id="pids" value="<?php echo $key; ?>"><input type="submit" name="submit-usr" value="Frissítés" class="submit"></li>
            </form>           
		</ol>
        </li>
        <li style="text-align:center;">
        <p align="justify">Well, the way they make shows is, they make one show. That show's called a pilot. Then they show that show to the people who make shows, and on the strength of that one show they decide if they're going to make more shows. Some pilots get picked and become television programs. Some don't, become nothing. She starred in one of the ones that became nothing. </p>
        <form id="your-funeral" action="<?php echo get_permalink(74); ?>&form=funeralforafriend" method="post">
        <input type="hidden" name="pids" id="pids" value="<?php echo $key; ?>">
        <input type="submit" name="submit-usr" value="Igen, biztosan törölném magam" class="submit">
        </form>
        <p align="justify">Now that we know who you are, I know who I am. I'm not a mistake! It all makes sense! In a comic, you know how you can tell who the arch-villain's going to be? He's the exact opposite of the hero. And most times they're friends, like you and me! I should've known way back when... You know why, David? Because of the kids. They called me Mr Glass. </p>
        </li>
        </ul>
	</div>
    <h1>Önéletrajz<div id="tool_1">Szerelés</div></h1>
    <div id="cv_edit">
    	<ul>
        <h2>Alapadatok</h2>
		    <li>
			    <ol>
                	<li><strong>Vezetéknév</strong><br><?php echo $user_info->user_lastname; ?></li>
                    <li><strong>Keresztnév</strong><br><?php echo $user_info->user_firstname; ?></li>
                    <li><strong>Születési Dátum</strong><br><?php echo $user_info->user_birthdate; ?></li>
                    <li><strong>Facebook profil</strong><br><?php echo $user_info->user_facebook; ?></li>
                    <li><strong>LinkedIn profil</strong><br><?php echo $user_info->user_linkedin; ?></li>
                    <li><strong>Skype</strong><br><?php echo $user_info->user_skype; ?></li>
                    <li><strong>Publikus tetted a profilod</strong><br><?php if($user_info->user_publikcv=="1"){echo "igen";}else{echo "nem";} ?></li>
    			</ol>
		    </li>
            <li>
			    <ol>
                	 <form id="your-cv" action="<?php echo get_permalink(74); ?>&form=cv" method="post">
    		<li><strong>Vezetéknév:</strong><br><input type="text" maxlength="50" name="user_lastname"  id="user_lastname" value="<?php echo $user_info->user_lastname; ?>" class="regular-text" /></li>
            <li><strong>Keresztnév:</strong><br><input type="text" maxlength="50" name="user_firstname"  id="user_firstname" value="<?php echo $user_info->user_firstname; ?>" class="regular-text" /></li>   
            <li><strong>Születési Dátum:</strong><br><input type="text" maxlength="50" name="user_birthdate"  id="user_birthdate" value="<?php echo $user_info->user_birthdate; ?>" class="regular-text" /></li>
            <li><strong>Facebook Profil:</strong><br><input type="text" maxlength="100" name="user_facebook"  id="user_facebook" value="<?php echo $user_info->user_facebook; ?>" class="regular-text" /></li>
			<li><strong>Linkedin Profil:</strong><br><input type="text" maxlength="100" name="user_linkedin"  id="user_linkedin" value="<?php echo $user_info->user_linkedin; ?>" class="regular-text" /></li>
            <li><strong>Skype:</strong><br><input type="text" maxlength="50" name="user_skype" id="user_skype"  value="<?php echo $user_info->user_skype; ?>" class="regular-text" /></li>
			<input type="hidden" name="pids" id="pids" value="<?php echo $key; ?>">
            <li><strong>Publikussá tetted a Profilod:</strong><br><input type="checkbox" name="user_publikcv" id="user_publikcv" value="1" class="regular-text" <?php if($user_info->user_publikcv=="1"){echo "checked";} ?>/></li> 
            <li><input type="submit" name="submit-cv" value="Frissítés" class="submit"></li>
            </form>           
    			</ol>
		    </li>
    <li></li>
    </ul>
    </div>
    <h1>Önarckép és bemutatóanyag feltöltése</h1>
    <div id="image_and_pdf">
    	<ul>
    	<li style="border-right:1px solid #ddd;">
        <h2>Önarckép feltöltés</h2>
        <p align="justify">
        Ezen a részen lehetőséged van egy fotót elhelyezni magadról. Ez a fotó fog megjelenni a publikus cv-d, felületén.
        PNG,JPG,JPEG,GIF a megengedett, 2 mb alatt.
        </p>
        <p align="center">
        <div id="upload">
        <form id="your-cv" action="<?php echo get_permalink(74); ?>&form=image" method="post" enctype="multipart/form-data">
 		<input type="file" name="userpicture" id="userpicture">
 		<input type="hidden" name="pids" id="pids" value="<?php echo $key; ?>">
        <input type="submit" name="submit-file" value="Mentés" class="submit" style="width:240px;margin-top:5px;">
 		</form>
        </div>
        <a href="../uploads/<?php echo $user_info->user_picture; ?>"><div id="imgdown"><img src="../uploads/<?php echo $user_info->user_picture; ?>"></div></a>
        </li>
    	<li style="border:none;">
        <h2>Bemutatóanyag feltöltés</h2>
        <p align="justify">
        Ezen a részen lehetőséged van egy pdf fájl feltöltésére. Álláskeresés érdemes egy szakmai önéletrajzot, vagy más, munkáddal kapcsolatos anyagot elhelyezned.
        </p>
        <div id="upload">
        <form id="your-cv" action="<?php echo get_permalink(74); ?>&form=pdf" method="post" enctype="multipart/form-data">
 		<input type="file" name="user_pdf" id="user_pdf">
 		<input type="hidden" name="pids" id="pids" value="<?php echo $key; ?>">
        <input type="submit" name="submit-file" value="Mentés" class="submit" style="width:240px;margin-top:5px;">
 		</form>
        </div>
        <a href="../uploads/<?php echo $user_info->user_pdf; ?>"><div id="pdfdown"></div></a>
        </li>
    	</ul>
    </div>
    <h1>Képzések<div id="tool_2">Új hozzáadása</div></h1>
    <div id="cv_edu">
    <ul>
    <li><ul><?php 
	$edu=json_decode($user_info->user_edu);
	for($i=0;$i<sizeof($edu);$i++){
	echo '<li><a href="'.get_permalink(74).'&form=killedu&id='.$i.'"><div id="kill_edu">törles</div></a>';
	echo '<h2>'.urlencodeunicode($edu[$i]->hol).'</h2>';
	echo urlencodeunicode($edu[$i]->kezdes).'-';
	echo urlencodeunicode($edu[$i]->befejez);
	echo '<p>'.urlencodeunicode($edu[$i]->mit).' - ';
	echo urlencodeunicode($edu[$i]->tipus).'</p>';
	echo '</li>';
	}
	?></ul>
	 </li>
     
     <li>
     <ol>
      <form id="your-cv" action="<?php echo get_permalink(74); ?>&form=newedu" method="post">
    		<li><strong>Intézmény:</strong><br><input type="text" maxlength="50" name="user_school"  id="user_shool" value="" class="regular-text" /></li>
            <li><strong>Képzés Típusa:</strong><br><input type="text" maxlength="50" name="user_degree"  id="user_degree" value="" class="regular-text" /></li>   
            <li><strong>Képzés megnevezés:</strong><br><input type="text" maxlength="50" name="user_szak"  id="user_szak" value="" class="regular-text" /></li>
            <li><strong>Kezdés:</strong><br><input type="text" maxlength="100" name="user_start"  id="user_start" value="" class="regular-text" /></li>
			<li><strong>Befejezés:</strong><br><input type="text" maxlength="100" name="user_end"  id="user_end" value="" class="regular-text" /></li>
			<input type="hidden" name="pids" id="pids" value="<?php echo $key; ?>"> 
            <li><input type="submit" name="submit-edu" value="Mentés" class="submit"></li>
            </form> 
            </ol>          
     </li>
    </ul>
    </div>
    <h1>Tapasztalat<div id="tool_3">Új hozzáadása</div></h1>
     <div id="cv_work">
    <ul>
    <li><ul><?php 
	$edu=json_decode($user_info->user_work);
	for($i=0;$i<sizeof($edu);$i++){
	echo '<li><a href="'.get_permalink(74).'&form=killwork&id='.$i.'"><div id="kill_work">törles</div></a>';
	echo '<h2>'.urlencodeunicode($edu[$i]->hol).'</h2>';
	echo urlencodeunicode($edu[$i]->kezdes).'-';
	echo urlencodeunicode($edu[$i]->befejez);
	echo '<p>'.urlencodeunicode($edu[$i]->mit).' - ';
	echo urlencodeunicode($edu[$i]->tipus).'</p>';
	echo '</li>';
	}
	?></ul>
	 </li>
     
     <li>
     <ol>
      <form id="your-cv" action="<?php echo get_permalink(74); ?>&form=newwork" method="post">
    		<li><strong>Cég neve:</strong><br><input type="text" maxlength="50" name="user_wplace"  id="user_wplace" value="" class="regular-text" /></li>
            <li><strong>Munka típusa:</strong><br><input type="text" maxlength="50" name="user_wtype"  id="user_wtype" value="" class="regular-text" /></li>   
            <li><strong>Munkakör:</strong><br><input type="text" maxlength="50" name="user_wjob"  id="user_wjob" value="" class="regular-text" /></li>
            <li><strong>Kezdés:</strong><br><input type="text" maxlength="100" name="user_wstart"  id="user_wstart" value="" class="regular-text" /></li>
			<li><strong>Befejezés:</strong><br><input type="text" maxlength="100" name="user_wend"  id="user_wend" value="" class="regular-text" /></li>
			<input type="hidden" name="pids" id="pids" value="<?php echo $key; ?>"> 
            <li><input type="submit" name="submit-work" value="Mentés" class="submit"></li>
            </form> 
            </ol>          
     </li>
    </ul>
    </div>
    <h1>Szakmai nyelvismeret<div id="tool_4">Új hozzáadása</div></h1>
    <div id="cv_lang">
 <ul>
    <li><ul><?php 
	$lang=json_decode($user_info->user_lang);
	for($i=0;$i<sizeof($lang);$i++){
	echo '<li><a href="'.get_permalink(74).'&form=killlang&id='.$i.'"><div id="kill_lang">törles</div></a>';
	echo '<h2>'.urlencodeunicode($lang[$i]->nyelv).'</h2>';
	echo '<p>'.urlencodeunicode($lang[$i]->szint).' - ';
	if($lang[$i]->szakmai==1){echo 'szakmában már használta.'; }
	echo '</p>';
	echo '</li>';
	}
	?></ul>
	 </li>
     
     <li>
     <ol>
      <form id="your-cv" action="<?php echo get_permalink(74); ?>&form=newlang" method="post">
    		<li><strong>Nyelv:</strong><br><input type="text" maxlength="50" name="user_ltype"  id="user_ltype" value="" class="regular-text" /></li>
            <li><strong>Szint:</strong><br><input type="text" maxlength="50" name="user_lrank"  id="user_lrank" value="" class="regular-text" /></li>   
            <li><strong>Szakmában használtad már:</strong><br><input type="checkbox" name="user_ljob" id="user_news" value="1" class="regular-text"/></li>
			<input type="hidden" name="pids" id="pids" value="<?php echo $key; ?>"> 
            <li><input type="submit" name="submit-lang" value="Mentés" class="submit"></li>
            </form> 
            </ol>          
     </li>
    </ul>
    </div>
</div>
<div id="reg-shadow"></div>


	  
	  

<?php }else{ ?>
Sajnos nem vagy bejelentkezve.
<?php } ?>
  

</div>
</div>
<?php get_footer(); ?>
