<?php 
function rendezvenyek(){
echo '
<style type="text/css">
#admin_events{float:none !important; margin-top:20px;}
	#admin_events ul{width:1000px;border:1px solid #ddd;border-radius:3px;}
		#admin_events ul li{width:980px; text-align:justify;list-style:none;padding:10px;}
			#admin_events ul li {min-height:10px;margin-bottom:0px;}
			#admin_events ul li:nth-child(even){background:#fcfcfc;}
			#admin_events ul li:nth-child(odd){background:#efefef; min-height:20px; padding-bottom:20px;}
			#admin_events ul li.elso{background: linear-gradient(to top, #DCDCDC, #E9E9E9) #E1E1E1; padding-top:8px;}
				#admin_events ul li ul{width:1100px; border:none; border-radius:0px; display:block;}
					#admin_events ul li ul li{float:left;height:0px; padding:0px 0px 0px 0px; background:none !important;}
						#admin_events ul li ul li:nth-child(1){width:370px;}
						#admin_events ul li ul li:nth-child(2){width:100px;}
    					#admin_events ul li ul li:nth-child(3){width:100px;}
						#admin_events ul li ul li:nth-child(4){width:100px;}		
						#admin_events ul li ul li:nth-child(5){width:100px;text-align:center;}	
    					#admin_events ul li ul li:nth-child(6){width:70px;text-align:center;}	
     					#admin_events ul li ul li:nth-child(7){width:70px; text-align:center;}	
						#admin_events ul li ul li:nth-child(8){width:70px; text-align:center;}																		
			
				#admin_events ul li p{width:900px;}
				#admin_events ul li img{margin:10px;float:right;}
				#admin_events ul li h3{padding:0px !important;margin:0px !important;}
				
 </style>
';	

$connect=SqlFrameWork();

if($_GET['action']=="save"&&$_GET['ID']!=""){
$query="UPDATE events SET event_name='".$_POST['event_name']."', event_body='".$_POST['event_body']."', event_place='".$_POST['event_place']."', event_date='".$_POST['event_date']."', event_url='".$_POST['event_url']."', event_facebook='".$_POST['event_facebook']."', event_reg='".$_POST['event_reg']."'  WHERE ID='".$_GET['ID']."'";	
 mysqli_query($connect,$query);
wp_redirect( 'admin.php?page=rendezvenyek' ); exit;
	}

if($_GET['action']=="savenew"){
$query="INSERT INTO events (author_ID, event_name, event_date, event_place, event_body, event_active, event_url, event_facebook, event_reg)
 VALUES ('".get_current_user_id()."', '".$_POST['event_name']."', '".$_POST['event_date']."', '".$_POST['event_place']."', '".$_POST['event_body']."', '0', '".$_POST['event_url']."', '".$_POST['event_facebook']."', '".$_POST['event_reg']."')";	
 mysqli_query($connect,$query);
wp_redirect( 'admin.php?page=rendezvenyek' ); exit;
	}	

if($_GET['action']=="flipin"&&$_GET['ID']!=""){
$eid=$_GET['ID'];
mysqli_query($connect,"UPDATE events SET event_active='1' WHERE ID=$eid");
wp_redirect( 'admin.php?page=rendezvenyek' ); exit;
	}
	
if($_GET['action']=="flipout"&&$_GET['ID']!=""){
$eid=$_GET['ID'];
mysqli_query($connect,"UPDATE events SET event_active='0' WHERE ID=$eid");
wp_redirect( 'admin.php?page=rendezvenyek' ); exit;
	}

if($_GET['shownoshow']!=""&&$_GET['ID']!=""){
$eid=$_GET['ID'];
$cold=0;
$result = mysqli_query($connect,"SELECT * FROM events WHERE ID=".$_GET['ID']."");

/*PIDHU*/
if($_GET['shownoshow']=="pidhu"&&$_GET['ID']!=""){
while($row = mysqli_fetch_array($result)){$cold=$row['event_show'];}

if(GetShowVar($cold,"pidhu")==1){$cold=$cold-1000;}else{$cold=$cold+1000;}

mysqli_query($connect,"UPDATE events SET event_show='".$cold."' WHERE ID=$eid");

wp_redirect( 'admin.php?page=rendezvenyek' ); exit;
	}

/*secuhu*/
if($_GET['shownoshow']=="secuhu"&&$_GET['ID']!=""){
while($row = mysqli_fetch_array($result)){$cold=$row['event_show'];}

if(GetShowVar($cold,"secuhu")==1){$cold=$cold-100;}else{$cold=$cold+100;}

mysqli_query($connect,"UPDATE events SET event_show='".$cold."' WHERE ID=$eid");

wp_redirect( 'admin.php?page=rendezvenyek' ); exit;
	}

/*ERAMHU*/
if($_GET['shownoshow']=="eramhu"&&$_GET['ID']!=""){
while($row = mysqli_fetch_array($result)){$cold=$row['event_show'];}

if(GetShowVar($cold,"eramhu")==1){$cold=$cold-10;}else{$cold=$cold+10;}

mysqli_query($connect,"UPDATE events SET event_show='".$cold."' WHERE ID=$eid");

wp_redirect( 'admin.php?page=rendezvenyek' ); exit;
	}

/*ITHU*/
if($_GET['shownoshow']=="ithu"&&$_GET['ID']!=""){
while($row = mysqli_fetch_array($result)){$cold=$row['event_show'];}

if(GetShowVar($cold,"ithu")==1){$cold=$cold-1;}else{$cold=$cold+1;}

mysqli_query($connect,"UPDATE events SET event_show='".$cold."' WHERE ID=$eid");

wp_redirect( 'admin.php?page=rendezvenyek' ); exit;
	}	
	
	}
		
if($_GET['action']=="del"&&$_GET['ID']!=""){
$eid=$_GET['ID'];
mysqli_query($connect,"UPDATE events SET event_active='3' WHERE ID=$eid");
wp_redirect( 'admin.php?page=rendezvenyek' ); exit;
	}		

$query="SELECT * FROM events WHERE event_active!=3 ORDER BY ID DESC";
if($_GET['list']!=""){
	
	if($_GET['list']=="active"){
		
		$uid=$_GET['uid'];
		$query="SELECT * FROM events WHERE event_active=1 ORDER BY ID DESC";
		
	}
	
	if($_GET['list']=="deactivated"){
		
		$uid=$_GET['uid'];
		$query="SELECT * FROM events WHERE event_active=0 ORDER BY ID DESC";
		
	}
	
	if($_GET['list']=="deleted"){
		
		$uid=$_GET['uid'];
		$query="SELECT * FROM events WHERE event_active=3 ORDER BY ID DESC";
		
	}
	
	if($_GET['list']=="user"){
		
		$uid=$_GET['uid'];
		$query="SELECT * FROM events WHERE author_ID='".$uid."' ORDER BY ID DESC";
		
	}
	}

if($_GET['action']=="new"&&$_GET['ID']==""){
	echo '<div class="wrap"><div id="icon-edit-pages" class="icon32 icon32-posts-page"><br /></div><h2>Új esemény hozzáadása</h2></div>';
	echo '<form method="post" action="admin.php?page=rendezvenyek&action=savenew">
<input type="hidden" name="option_page" value="general" />
<input type="hidden" name="action" value="update" /><input type="hidden" name="_wp_http_referer" value="/pidhu/wp-admin/options-general.php" />
<table class="form-table">
<tr valign="top">
<th scope="row"><label for="event_name">Cím</label></th>
<td><input name="event_name" type="text" id="event_name" value="" class="regular-text" /></td>
</tr>
</tr>

<tr valign="top">
<th scope="row"><label for="event_date">Dátum</label></th>
<td><input name="event_date" type="text" id="event_date" value="" class="regular-text" /></td>
</tr>
</tr>

<tr valign="top">
<th scope="row"><label for="event_place">Helyszín</label></th>
<td><input name="event_place" type="text" id="event_place" value="" class="regular-text" /></td>
</tr>
</tr>


<tr valign="top">
<th scope="row"><label for="event_url">Rendezvény honlapának címe</label></th>
<td><input name="event_url" type="text" id="event_url" value="" class="regular-text" /></td>
</tr>
</tr>


<tr valign="top">
<th scope="row"><label for="event_facebook">Facebook esemény linkje</label></th>
<td><input name="event_facebook" type="text" id="event_facebook" value="" class="regular-text" /></td>
</tr>
</tr>


<tr valign="top">
<th scope="row"><label for="event_reg">Regisztráció</label></th>
<td><input name="event_reg" type="text" id="event_reg" value="" class="regular-text" /></td>
<p>Ezt a részt, csak akkor töltsd ki, ha regisztráció szükséges.</p>
</tr>
</tr>


<tr valign="top">
<th scope="row"><label for="event_body">Esemény leírása</label></th>
<td><textarea name="event_body" type="text" id="event_body" rows="5" cols="100" class="regular-text" /></textarea></td>
</tr>
</tr>
';
echo '<p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="Módosítások mentése"  /></p></form>';		
	
	
	
	}
	elseif($_GET['action']=="edit"&&$_GET['ID']!=""){
$result = mysqli_query($connect,"SELECT * FROM events WHERE ID=".$_GET['ID']."");
while($row = mysqli_fetch_array($result)){
	
	echo '<div class="wrap"><div id="icon-edit-pages" class="icon32 icon32-posts-page"><br /></div><h2>Esemény szerkesztése</h2></div>';
	echo '<form method="post" action="admin.php?page=rendezvenyek&action=save&ID='.$row['ID'].'">
<input type="hidden" name="option_page" value="general" />
<input type="hidden" name="action" value="update" /><input type="hidden" name="_wp_http_referer" value="/pidhu/wp-admin/options-general.php" />
<table class="form-table">
<tr valign="top">
<th scope="row"><label for="event_name">Cím</label></th>
<td><input name="event_name" type="text" id="event_name" value="'.$row['event_name'].'" class="regular-text" /></td>
</tr>
</tr>

<tr valign="top">
<th scope="row"><label for="event_date">Dátum</label></th>
<td><input name="event_date" type="text" id="event_date" value="'.$row['event_date'].'" class="regular-text" /></td>
</tr>
</tr>

<tr valign="top">
<th scope="row"><label for="event_place">Helyszín</label></th>
<td><input name="event_place" type="text" id="event_place" value="'.$row['event_place'].'" class="regular-text" /></td>
</tr>
</tr>


<tr valign="top">
<th scope="row"><label for="event_url">Rendezvény honlapának címe</label></th>
<td><input name="event_url" type="text" id="event_url" value="'.$row['event_url'].'" class="regular-text" /></td>
</tr>
</tr>


<tr valign="top">
<th scope="row"><label for="event_facebook">Facebook esemény linkje</label></th>
<td><input name="event_facebook" type="text" id="event_facebook" value="'.$row['event_facebook'].'" class="regular-text" /></td>
</tr>
</tr>


<tr valign="top">
<th scope="row"><label for="event_reg">Regisztráció</label></th>
<td><input name="event_reg" type="text" id="event_reg" value="'.$row['event_reg'].'" class="regular-text" /></td>
<p>Ezt a részt, csak akkor töltsd ki, ha regisztráció szükséges.</p>
</tr>
</tr>


<tr valign="top">
<th scope="row"><label for="event_body">Esemény leírása</label></th>
<td><textarea name="event_body" type="text" id="event_body" rows="5" cols="100" class="regular-text" />'.$row['event_body'].'</textarea></td>
</tr>
</tr>
';
echo '<p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="Módosítások mentése"  /></p></form>';
	
}}else{
$result=mysqli_query($connect,$query);
echo '<div class="wrap">
	<div id="icon-edit-pages" class="icon32 icon32-posts-page"><br /></div><h2>Események <a href="admin.php?page=rendezvenyek&action=new" class="add-new-h2">Új hozzáadása</a></h2></div>
	<div style="margin:10px 0px 10px 0px;width:1000px; height:30px;"><ul class="subsubsub">
	<li><a href="admin.php?page=rendezvenyek">Összes</a></li> | 
	<li><a href="admin.php?page=rendezvenyek&list=active">Aktív</a></li> | 
	<li><a href="admin.php?page=rendezvenyek&list=deactivated">Deaktivált</a></li> | 
	<li><a href="admin.php?page=rendezvenyek&list=deleted">Törölt</a> </li>
	</ul></div>';
	
echo '<div id="admin_events"><ul>';
echo '<li class="elso"><ul><li>Cím</li><li>Felhasználó</li><li>Dátum</li><li>Helyszín</li><li>Aktív</li><li>Törlés</li><li>Szerkesztés</li></ul></li>';
		while($row = mysqli_fetch_array($result)){
			echo '<li>';
            echo '<ul><li><h3>'.$row['event_name'].'</h3></li><li><a href="admin.php?page=rendezvenyek&list=user&uid='.$row['author_ID'].'">';
			$user=get_userdata($row['author_ID']);
			echo $user->user_nicename;
			echo '</a></li><li>'.$row['event_date'].'</li><li>'.$row['event_place'].'</li><li>';   	
			if($row['event_active']=="1"){echo '<a href="admin.php?page=rendezvenyek&ID='.$row['ID'].'&action=flipout">Deaktiválás</a>';}else{echo '<a href="admin.php?page=rendezvenyek&ID='.$row['ID'].'&action=flipin">Aktiválás</a>';}
			echo '</li><li>';
			if($row['event_active']!="3"){echo '<a href="admin.php?page=rendezvenyek&ID='.$row['ID'].'&action=del">Törlés</a>';}else{echo "Törölt.";}
			echo '</li><li><a href="admin.php?page=rendezvenyek&ID='.$row['ID'].'&action=edit">Szerkesztés</a>';
			echo '</li><li>';
			echo '<a href="admin.php?page=rendezvenyek&ID='.$row['ID'].'&shownoshow=pidhu">'.GetShowVar($row['event_show'],"pidhu").'</a> ';
			echo '<a href="admin.php?page=rendezvenyek&ID='.$row['ID'].'&shownoshow=secuhu">'.GetShowVar($row['event_show'],"secuhu").'</a> ';
			echo '<a href="admin.php?page=rendezvenyek&ID='.$row['ID'].'&shownoshow=eramhu">'.GetShowVar($row['event_show'],"eramhu").'</a> ';
			echo '<a href="admin.php?page=rendezvenyek&ID='.$row['ID'].'&shownoshow=ithu">'.GetShowVar($row['event_show'],"ithu").'</a> ';
			
			echo '</li></ul>';
            echo '</li><li>';
			if($row['event_img']!=""){echo '<img src="'.get_template_directory_uri().'/images/'.$row['event_img'].'">';}else{
				echo '<img src="'.get_template_directory_uri().'/images/Simple_silver_crown.svg.png">';
				}
			echo'<p>'.$row['event_body'].'</p>';
            echo '</li>';
			
			}
echo '</ul>';	
	}
echo '</div>';	
}
?>