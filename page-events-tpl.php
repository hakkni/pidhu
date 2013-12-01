<?php
/*
Template Name: Programok
*/
get_header(); 
$user_info = get_userdata(get_current_user_id()); 
$lock=md5($user_info->user_login.$user_info->user_email.$user_info->user_pass);
$key=$lock;
$connect=SqlFrameWork();
?>
<?php if($_GET['action']=="newevent"){echo '<style>#events ul li{left:-780px !important;}</style>';} ?>
<div id="page">
<div id="reg">
<?php 
if($_GET['action']!=""){
	if($_POST['pids']==$lock){
	if($_GET['action']=="newsave"){
		$userid=get_current_user_id();
		$query="INSERT INTO events (author_ID, event_name, event_date, event_place, event_body, event_active, event_url, event_facebook, event_reg)
 VALUES ('".$userid."', '".$_POST['event_name']."', '".$_POST['event_date']."', '".$_POST['event_place']."', '".$_POST['event_body']."', '0', '".$_POST['event_url']."', '".$_POST['event_facebook']."', '".$_POST['event_reg']."')";	
 mysqli_query($connect,$query);
 
wp_redirect( get_permalink(87) ); exit;
	}
		}
		
	if($_GET['action']=="oldsave"&&$_GET['id']!=""){
		$userid=get_current_user_id();
		$query="UPDATE events SET event_name='".$_POST['event_name']."', event_body='".$_POST['event_body']."', event_place='".$_POST['event_place']."', event_date='".$_POST['event_date']."', event_url='".$_POST['event_url']."', event_facebook='".$_POST['event_facebook']."', event_reg='".$_POST['event_reg']."'  WHERE ID='".$_GET['id']."'";	
 mysqli_query($connect,$query);
wp_redirect( get_permalink(87) ); exit;
		}	
		
		
	}

if($_GET['event']!=0){ 
$id=$_GET['event'];
$result = mysqli_query($connect,"SELECT * FROM events WHERE ID=$id");
while($row = mysqli_fetch_array($result)){
	if($row['event_active']=="1"||$row['author_id']==get_current_user_id()){
	?>
 <h1><?php if($row['event_active']!="1"){echo "Nem aktivált rendezvény: ";} echo $row['event_name']; if($row['author_ID']==get_current_user_id()){ echo '<div id="tool_6">Szerkesztés</div>';} ?></h1>
 <div id="single_event">
 <ul>
 <li>
		<p><h2>Rendezvény Leírása</h2>-<?php echo $row['event_body']; ?></p>
        <p><h2>Rendezvény Dátuma</h2>-<?php echo $row['event_date']; ?></p>
        <p><?php   		 $now = time();  $your_date = strtotime($row['event_date']);
     $datediff = $your_date - $now;     $nap=floor($datediff/(60*60*24));
	 if($nap<0){echo 'A rendezvény tehát '.$nap.' nappal ezelőtt volt.';}elseif($nap==0){echo 'A rendezvényt tehát ma lesz!!!4.';}else{echo 'A rendezvény tehát '.$nap.' nap múlva lesz.';}
	  ?> </p>
        <p><h2>Feltöltés dátuma</h2>-<?php echo $row['event_act_date']; ?></p>
        <p><?php   		 $now = strtotime($row['event_date']);     $your_date = strtotime($row['event_act_date']);
     $datediff = $now - $your_date;     $nap=floor($datediff/(60*60*24));
	 if($nap<0){echo 'A rendezvény tehát '.$nap.' nappal később töltötték fel.';}elseif($nap==0){echo 'A rendezvényt tehát aznap töltötték fel!!!4.';}else{echo 'A rendezvény tehát '.$nap.' nappal előtte töltötték fel.';}
	  ?> </p>
        <p><h2>Rendezvény url</h2>-<?php echo $row['event_url']; ?></p>
        <p><h2>Rendezvény helyszín</h2>-<?php echo $row['event_place']; ?></p>
        <p><h2>Rendezvény Facebook</h2>-<?php echo $row['event_facebook']; ?></p>
        <p><h2>Rendezvény reg</h2>-<?php echo $row['event_reg']; ?></p>
        <p><h2>Feltöltő ID</h2>-<?php echo $row['author_ID']; ?></p>
</li>
<li>
<ul>
   <form id="your-profile" action="<?php echo get_permalink(87);?>&action=oldsave&id=<?php echo $row['ID']; ?>" method="post">
    		<li><strong>Cím:</strong><br><input name="event_name" type="text" id="event_name" value="<?php echo $row['event_name']; ?>" class="regular-text" /></li>
            <li><strong>Dátum:</strong><br><input name="event_date" type="text" id="event_date" value="<?php echo $row['event_date']; ?>" class="regular-text" /></li>   
            <li><strong>Helyszín:</strong><br><input name="event_place" type="text" id="event_place" value="<?php echo $row['event_place']; ?>" class="regular-text" /></li>
            <li><strong>Rendezvény weboldalának linkje:</strong><br><input name="event_url" type="text" id="event_url" value="<?php echo $row['event_url']; ?>" class="regular-text" /></li>
            <li><strong>Facebook esemény linkje:</strong><br><input name="event_facebook" type="text" id="event_facebook" value="<?php echo $row['event_facebook']; ?>" class="regular-text" /></li>
            <li><strong>Regisztráció:</strong><br><input name="event_reg" type="text" id="event_reg" value="<?php echo $row['event_reg']; ?>" class="regular-text" /></li>                        
            <li><strong>Leírás:</strong><br><textarea name="event_body" type="text" id="event_body" rows="5" cols="100" class="regular-text"/><?php echo $row['event_body']; ?></textarea></li>  

            <li><input type="hidden" name="pids" id="pids" value="<?php echo $key; ?>"><input type="submit" name="submit-usr" value="Mentés" class="submit"></li>
            </form>        
</li>
</ul>
 </div>

<?php } else{
    wp_redirect( '404_page' );
    exit();
}}}else{ ?>
	<h1>Események<?php if($_GET['action']!=="newevent"){ ?><div id="tool_5">Új hozzáadása</div><?php } ?></h1>
    <div id="events">
    <ul>
    	<li>
    	<ol>
        <?php 

		
		$result = mysqli_query($connect,"SELECT * FROM events WHERE event_active='1' ORDER BY event_date DESC");
		while($row = mysqli_fetch_array($result)){
			if(GetShowVar($row['event_show'],'pidhu')==1){
			echo '<a href="'.get_permalink(87).'&event='.$row['ID'].'"><li>';
            if($row['event_img']!=""){echo '<img src="'.get_template_directory_uri().'/images/'.$row['event_img'].'">';}else{
				echo '<img src="'.get_template_directory_uri().'/images/Simple_silver_crown.svg.png">';
				}
            echo '<h3>'.$row['event_name'].'<span> '.$row['event_date'].' @ '.$row['event_place'].'</span></h3>';
            echo '<p>'.$row['event_body'].'</p>';
            echo '</li></a>';
			}
			}
		
		?>
            </ol>
            </li>
            
            <li><ul>
                    <form id="your-profile" action="<?php echo get_permalink(87);?>&action=newsave" method="post">
    		<li><strong>Cím:</strong><br><input name="event_name" type="text" id="event_name" value="" class="regular-text" /></li>
            <li><strong>Dátum:</strong><br><input name="event_date" type="text" id="event_date" value="" class="regular-text" /></li>   
            <li><strong>Helyszín:</strong><br><input name="event_place" type="text" id="event_place" value="" class="regular-text" /></li>
            <li><strong>Rendezvény weboldalának linkje:</strong><br><input name="event_url" type="text" id="event_url" value="" class="regular-text" /></li>
            <li><strong>Facebook esemény linkje:</strong><br><input name="event_facebook" type="text" id="event_facebook" value="" class="regular-text" /></li>
            <li><strong>Regisztráció:</strong><br><input name="event_reg" type="text" id="event_reg" value="" class="regular-text" /></li>                        
            <li><strong>Leírás:</strong><br><textarea name="event_body" type="text" id="event_body" rows="5" cols="100" class="regular-text"/></textarea></li>  

            <li><input type="hidden" name="pids" id="pids" value="<?php echo $key; ?>"><input type="submit" name="submit-usr" value="Mentés" class="submit"></li>
            </form>        
            </ul>
            </li>
            </ul>
    </div>
<?php }?>
</div>
<div id="reg-shadow"></div>


  

</div>
</div>
<?php get_footer(); ?>
