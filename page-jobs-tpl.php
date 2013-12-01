<?php
/*
Template Name: Munkak
*/
get_header(); 
$user_info = get_userdata(get_current_user_id()); 
$lock=md5($user_info->user_login.$user_info->user_email.$user_info->user_pass);
$key=$lock;
$connect=SqlFrameWork();


//Mentés//
if($_GET['action']!=""){
	if($_POST['pids']==$lock){
	if($_GET['action']=="newsave"){
		$userid=get_current_user_id();
		$query="INSERT INTO jobs (author_ID, job_name, job_place, job_type, job_school, job_prereq, job_desc, job_contact_name, job_mail, job_tel, job_url )
 VALUES ('".get_current_user_id()."', '".$_POST['job_name']."',  '".$_POST['job_place']."',  '".$_POST['job_type']."',  '".$_POST['job_school']."',  '".$_POST['job_prereq']."',  '".$_POST['job_desc']."',  '".$_POST['job_contact_name']."',  '".$_POST['job_mail']."',  '".$_POST['job_tel']."',  '".$_POST['job_url']."')";	
 mysqli_query($connect,$query);
wp_redirect( get_permalink(93) ); exit;
	}
	
	if($_GET['action']=="oldsave"&&$_GET['id']!=""){
		$userid=get_current_user_id();
		$query="UPDATE jobs SET job_name='".$_POST['job_name']."', job_place='".$_POST['job_place']."', job_type='".$_POST['job_type']."', job_school='".$_POST['job_school']."', job_prereq='".$_POST['job_prereq']."', job_desc='".$_POST['job_desc']."', job_contact_name='".$_POST['job_contact_name']."', job_mail='".$_POST['job_mail']."', job_tel='".$_POST['job_tel']."', job_url='".$_POST['job_url']."'  WHERE ID='".$_GET['id']."'";	
 mysqli_query($connect,$query);
wp_redirect( get_permalink(93) ); exit;
		}	
	
		}}
?><?php if($_GET['action']=="newjobs"){echo '<style>#jobs ul li{left:-780px !important;}</style>';} ?>
<div id="page">
<div id="reg">
<?php if($_GET['jobs']!=""){
$id=$_GET['jobs'];
$result = mysqli_query($connect,"SELECT * FROM jobs WHERE ID=$id");
while($row = mysqli_fetch_array($result)){
		if($row['job_active']=="1"||$row['author_id']==get_current_user_id()){
	?>
     <h1><?php if($row['job_active']!="1"){echo "Nem aktivált állás: ";} echo $row['job_name']; if($row['author_ID']==get_current_user_id()){ echo '<div id="tool_8">Szerkesztés</div>';} ?></h1>
 <div id="single_job">
 <ul>
 <li>
 <?php 
 echo '<p><h2>Cím</h2>-'.$row['job_name'].'</p>';
  echo '<p><h2>Munkavégzés Helye</h2>-'.$row['job_place'].'</p>';
   echo '<p><h2>Munkarend</h2>-'.$row['job_type'].'</p>';
    echo '<p><h2>Megkövetelt végzettség</h2>-'.$row['job_school'].'</p>';
	 echo '<p><h2>Követelmények a pályázóval szemben</h2>-'.$row['job_preg'].'</p>';
	  echo '<p><h2>Munkaköri leírás</h2>-'.$row['job_desc'].'</p>';
	   echo '<p><h2>Kapcsolattartó</h2>-'.$row['job_contact_name'].'</p>';
	    echo '<p><h2>Email</h2>-'.$row['job_mail'].'</p>';
		 echo '<p><h2>Telefonszám</h2>-'.$row['job_tel'].'</p>';
		  echo '<p><h2>Url</h2>-'.$row['job_url'].'</p>';
		   echo '<p><h2>Feladás ideje</h2>-'.$row['job_act_date'].'</p>';
 		$now = time();  $your_date = strtotime($row['job_act_date']);
     $datediff = $now - $your_date ;     $nap=floor($datediff/(60*60*24));
	 if($nap<30){echo 'Az állás '.$nap.' napja van az oldalon.';}elseif($nap==0){echo 'Az állás ma jár le, tehát ma lesz!!!4.';}else{echo 'Az állás tehát '.$nap.' nappal ezelőtt járt le.';}
			echo '<p>Az állás tehát '.date('Y-m-d', strtotime($row['job_act_date']. ' + 30 days')).' napján inaktiválódik.</p>';
 
 ?>
 </li>             
            <li><ul>
             <li style="border:none !important;"><h2>Alapadatok</h2></li>
                    <form id="your-profile" action="<?php echo get_permalink(93);?>&action=oldsave&id=<?php echo $row['ID']; ?>" method="post">
    		<li><strong>Cím:</strong><br><input name="job_name" type="text" id="job_name" value="<?php echo $row['job_name']; ?>" class="regular-text" /></li>
            <li><strong>Munkavégzés helye:</strong><br><input name="job_place" type="text" id="job_place" value="<?php echo $row['job_place']; ?>" class="regular-text" /></li>   
            <li><strong>Munkarend:</strong><br><input name="job_type" type="text" id="job_type" value="<?php echo $row['job_type']; ?>" class="regular-text" /></li>
            <li><strong>Megkövetelt végzettség:</strong><br><input name="job_school" type="text" id="job_school" value="<?php echo $row['job_school']; ?>" class="regular-text" /></li>
            <li style="border:none !important;"><h2>Leírások</h2></li>
                         <li><strong>Követelmények a pályázóval szemben:</strong><br><textarea name="job_prereq" type="text" id="job-prereq" rows="10" cols="70" class="regular-text"/><?php echo $row['job_prereq']; ?></textarea></li>              
            <li><strong>Munkakör:</strong><br><textarea name="job_desc" type="text" id="job_desc" rows="10" cols="70" class="regular-text"/><?php echo $row['job_desc']; ?></textarea></li>  
			<li style="border:none !important;"><h2>Kapcsolati Adatok</h2></li>

<li><strong>Kapcsolattartó:</strong><br><input name="job_contact_name" type="text" id="job_contact_name" value="<?php echo $row['job_contact_name']; ?>" class="regular-text" /></li>
<li><strong>Email:</strong><br><input name="job_mail" type="text" id="job_mail" value="<?php echo $row['job_mail']; ?>" class="regular-text" /></li>
<li><strong>Telefonszám:</strong><br><input name="job_tel" type="text" id="job_tel" value="<?php echo $row['job_tel']; ?>" class="regular-text" /></li>
<li><strong>URL:</strong><br><input name="job_url" type="text" id="job_url" value="<?php echo $row['job_url']; ?>" class="regular-text" /></li>


            <li><input type="hidden" name="pids" id="pids" value="<?php echo $key; ?>"><input type="submit" name="submit-usr" value="Mentés" class="submit"></li>
            </form>        
            </ul>
            </li>
            </ul>
    </div>
 
</div>
<?php }} } ?>
<?php if($_GET['jobs']==""){?>
<h1>Állások<?php if($_GET['action']!=="newjobs"){ ?><div id="tool_7">Új hozzáadása</div><?php } ?></h1>
    <div id="jobs">
    <ul>
    	<li>
    	<ol>
        <?php 

		$result = mysqli_query($connect,"SELECT * FROM jobs WHERE job_active='1' ORDER BY job_act_date DESC");
		while($row = mysqli_fetch_array($result)){
			if(GetShowVar($row['job_show'],'pidhu')==1){
			echo '<a href="'.get_permalink(93).'&jobs='.$row['ID'].'"><li>';
    
            echo '<h3>'.$row['job_name'].'<span> '.$row['job_act_date'].' @ '.$row['job_place'].'</span></h3>';
            echo '<p>'.$row['job_desc'].'</p>';
            echo '</li></a>';
			}
			}
		
		?>
            </ol>
            </li>
            
            <li><ul>
             <li style="border:none !important;"><h2>Alapadatok</h2></li>
                    <form id="your-profile" action="<?php echo get_permalink(93);?>&action=newsave" method="post">
    		<li><strong>Cím:</strong><br><input name="job_name" type="text" id="job_name" value="" class="regular-text" /></li>
            <li><strong>Munkavégzés helye:</strong><br><input name="job_place" type="text" id="job_place" value="" class="regular-text" /></li>   
            <li><strong>Munkarend:</strong><br><input name="job_type" type="text" id="job_type" value="" class="regular-text" /></li>
            <li><strong>Megkövetelt végzettség:</strong><br><input name="job_school" type="text" id="job_school" value="" class="regular-text" /></li>
            <li style="border:none !important;"><h2>Leírások</h2></li>
                         <li><strong>Követelmények a pályázóval szemben:</strong><br><textarea name="job_prereq" type="text" id="job-prereq" rows="10" cols="70" class="regular-text"/></textarea></li>              
            <li><strong>Munkakör:</strong><br><textarea name="job_desc" type="text" id="job_desc" rows="10" cols="70" class="regular-text"/></textarea></li>  
			<li style="border:none !important;"><h2>Kapcsolati Adatok</h2></li>

<li><strong>Kapcsolattartó:</strong><br><input name="job_contact_name" type="text" id="job_contact_name" value="" class="regular-text" /></li>
<li><strong>Email:</strong><br><input name="job_mail" type="text" id="job_mail" value="" class="regular-text" /></li>
<li><strong>Telefonszám:</strong><br><input name="job_tel" type="text" id="job_tel" value="" class="regular-text" /></li>
<li><strong>URL:</strong><br><input name="job_url" type="text" id="job_url" value="" class="regular-text" /></li>


            <li><input type="hidden" name="pids" id="pids" value="<?php echo $key; ?>"><input type="submit" name="submit-usr" value="Mentés" class="submit"></li>
            </form>        
            </ul>
            </li>
            </ul>
    </div></div>
<?php } ?>

<div id="reg-shadow"></div>


  

</div>
</div>
<?php get_footer(); ?>
