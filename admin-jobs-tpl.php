<?php
function allasok(){
	echo '
<style type="text/css">
#admin_jobs{float:none !important; margin-top:20px;}
	#admin_jobs ul{width:1000px;border:1px solid #ddd;border-radius:3px;}
		#admin_jobs ul li{width:980px; text-align:justify;list-style:none;padding:10px;}
			#admin_jobs ul li {min-height:10px;margin-bottom:0px;}
			#admin_jobs ul li:nth-child(even){background:#fcfcfc; min-height:25px;}
			#admin_jobs ul li:nth-child(odd){background:#efefef; min-height:20px; padding-bottom:20px;}
			#admin_jobs ul li.elso{background: linear-gradient(to top, #DCDCDC, #E9E9E9) #E1E1E1; padding-top:8px;}
				#admin_jobs ul li ul{width:1100px; border:none; border-radius:0px; display:block;}
					#admin_jobs ul li ul li{float:left;height:0px; padding:0px 0px 0px 0px; background:none !important;}
						#admin_jobs ul li ul li:nth-child(1){width:370px;}
						#admin_jobs ul li ul li:nth-child(2){width:100px;}
    					#admin_jobs ul li ul li:nth-child(3){width:100px;}
						#admin_jobs ul li ul li:nth-child(4){width:100px;}		
						#admin_jobs ul li ul li:nth-child(5){width:100px;text-align:center;}	
    					#admin_jobs ul li ul li:nth-child(6){width:70px;text-align:center;}	
     					#admin_jobs ul li ul li:nth-child(7){width:70px; text-align:center;}	
						#admin_jobs ul li ul li:nth-child(8){width:70px; text-align:center;}																		
			
				#admin_jobs ul li p{width:900px;}
				#admin_jobs ul li img{margin:10px;float:right;}
				#admin_jobs ul li h3{padding:0px !important;margin:0px !important;}		
 </style>
';	
$connect=SqlFrameWork();

/*Kapcsolók*/


if($_GET['shownoshow']!=""&&$_GET['ID']!=""){
$eid=$_GET['ID'];
$cold=0;
$result = mysqli_query($connect,"SELECT * FROM jobs WHERE ID='".$_GET['ID']."'");

/*PIDHU*/
if($_GET['shownoshow']=="pidhu"&&$_GET['ID']!=""){
while($row = mysqli_fetch_array($result)){$cold=$row['job_show'];}

if(GetShowVar($cold,"pidhu")==1){$cold=$cold-1000;}else{$cold=$cold+1000;}

mysqli_query($connect,"UPDATE jobs SET job_show='".$cold."' WHERE ID=$eid");

wp_redirect( 'admin.php?page=allasok' ); exit;
	}

/*secuhu*/
if($_GET['shownoshow']=="secuhu"&&$_GET['ID']!=""){
while($row = mysqli_fetch_array($result)){$cold=$row['job_show'];}

if(GetShowVar($cold,"secuhu")==1){$cold=$cold-100;}else{$cold=$cold+100;}

mysqli_query($connect,"UPDATE jobs SET job_show='".$cold."' WHERE ID=$eid");

wp_redirect( 'admin.php?page=allasok' ); exit;
	}

/*ERAMHU*/
if($_GET['shownoshow']=="eramhu"&&$_GET['ID']!=""){
while($row = mysqli_fetch_array($result)){$cold=$row['job_show'];}

if(GetShowVar($cold,"eramhu")==1){$cold=$cold-10;}else{$cold=$cold+10;}

mysqli_query($connect,"UPDATE jobs SET job_show='".$cold."' WHERE ID=$eid");

wp_redirect( 'admin.php?page=allasok' ); exit;
	}

/*ITHU*/
if($_GET['shownoshow']=="ithu"&&$_GET['ID']!=""){
while($row = mysqli_fetch_array($result)){$cold=$row['job_show'];}

if(GetShowVar($cold,"ithu")==1){$cold=$cold-1;}else{$cold=$cold+1;}

mysqli_query($connect,"UPDATE jobs SET job_show='".$cold."' WHERE ID=$eid");

wp_redirect( 'admin.php?page=allasok' ); exit;
	}	
	
	}

if($_GET['action']!=""){
	/*Műveletek*/

/*Törlés*/	
if($_GET['action']=="del"&&$_GET['ID']!=""){
$eid=$_GET['ID'];
mysqli_query($connect,"UPDATE jobs SET job_active='3' WHERE ID=$eid");
wp_redirect( 'admin.php?page=allasok' ); exit;
	}	
	
/*Flip-in/Flip-out*/	
if($_GET['action']=="flipin"&&$_GET['ID']!=""){
$eid=$_GET['ID'];
mysqli_query($connect,"UPDATE jobs SET job_active='1' WHERE ID=$eid");
wp_redirect( 'admin.php?page=allasok' ); exit;
	}
	
if($_GET['action']=="flipout"&&$_GET['ID']!=""){
$eid=$_GET['ID'];
mysqli_query($connect,"UPDATE jobs SET job_active='0' WHERE ID=$eid");
wp_redirect( 'admin.php?page=allasok' ); exit;
}
	

	/*Mentések*/
if($_GET['action']=="savenew"){
	
$query="INSERT INTO jobs (author_ID, job_name, job_place, job_type, job_school, job_prereq, job_desc, job_contact_name, job_mail, job_tel, job_url )
 VALUES ('".get_current_user_id()."', '".$_POST['job_name']."',  '".$_POST['job_place']."',  '".$_POST['job_type']."',  '".$_POST['job_school']."',  '".$_POST['job_prereq']."',  '".$_POST['job_desc']."',  '".$_POST['job_contact_name']."',  '".$_POST['job_email']."',  '".$_POST['job_tel']."',  '".$_POST['job_url']."')";	
 
 mysqli_query($connect,$query);
wp_redirect( 'admin.php?page=allasok' ); exit;
	}	
	
if($_GET['action']=="save"&&$_GET['ID']!=""){
$query="UPDATE jobs SET job_name='".$_POST['job_name']."', job_place='".$_POST['job_place']."', job_type='".$_POST['job_type']."', job_school='".$_POST['job_school']."', job_prereq='".$_POST['job_prereq']."', job_desc='".$_POST['job_desc']."', job_contact_name='".$_POST['job_contact_name']."', job_mail='".$_POST['job_email']."', job_tel='".$_POST['job_tel']."', job_url='".$_POST['job_url']."'  WHERE ID='".$_GET['ID']."'";	
 mysqli_query($connect,$query);
wp_redirect( 'admin.php?page=allasok' ); exit;
	}	
	


	if($_GET['action']=="new"){
		/*Új létrehozása.*/
			echo '<div class="wrap"><div id="icon-edit-pages" class="icon32 icon32-posts-page"><br /></div><h2>Új álláshirdetés hozzáadása</h2></div>';
	echo '<form method="post" action="admin.php?page=allasok&action=savenew">
<input type="hidden" name="option_page" value="general" />
<input type="hidden" name="action" value="update" /><input type="hidden" name="_wp_http_referer" value="/pidhu/wp-admin/options-general.php" />
<table class="form-table">
<tr valign="top">
<th scope="row"><label for="job_name">Cím</label></th>
<td><input name="job_name" type="text" id="job_name" value="" class="regular-text" /></td>
</tr>
</tr>

<tr valign="top">
<th scope="row"><label for="job_place">Munkavégzés helye</label></th>
<td><input name="job_place" type="text" id="job_place" value="" class="regular-text" /></td>
</tr>
</tr>

<tr valign="top">
<th scope="row"><label for="job_type">Munkarend</label></th>
<td><input name="job_type" type="text" id="job_type" value="" class="regular-text" /></td>
</tr>
</tr>


<tr valign="top">
<th scope="row"><label for="job_school">Iskolai végzettség</label></th>
<td><input name="job_school" type="text" id="job_school" value="" class="regular-text" /></td>
</tr>
</tr>
<tr valign="top">
<th scope="row"><h2>Leírások</h2></th>
</tr>
<tr valign="top">
<th scope="row"><label for="job_prereq">Követelmények a pályázóval szemben</label></th>
<td><textarea name="job_prereq" type="text" id="job_prereq" rows="5" cols="100" class="regular-text" /></textarea></td>
</tr>
</tr>
<tr valign="top">
<th scope="row"><label for="job_desc">Munkakör leírása</label></th>
<td><textarea name="job_desc" type="text" id="job_desc" rows="5" cols="100" class="regular-text" /></textarea></td>
</tr>
</tr>
<tr valign="top">
<th scope="row"><h2>Kapcsolati adatok</h2></th>
</tr>
<tr valign="top">
<th scope="row"><label for="job_contact_name">Kapcsolattartó</label></th>
<td><input name="job_contact_name" type="text" id="job_contact_name" value="" class="regular-text" /></td>
</tr>
</tr>

<tr valign="top">
<th scope="row"><label for="job_email">Kontakt Email</label></th>
<td><input name="job_email" type="text" id="job_email" value="" class="regular-text" /></td>
</tr>
</tr>


<tr valign="top">
<th scope="row"><label for="job_tel">Kontakt telefonszám</label></th>
<td><input name="job_tel" type="text" id="job_tel" value="" class="regular-text" /></td>
</tr>
</tr>


<tr valign="top">
<th scope="row"><label for="job_url">Állás linkje</label></th>
<td><input name="job_url" type="text" id="job_url" value="" class="regular-text" /></td>
</tr>
</tr>



';
echo '<p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="Módosítások mentése"  /></p></form>';	
		/*Új létrehozásának vége*/
		}
		
if($_GET['action']=="edit"&&$_GET['ID']!=""){
	$result = mysqli_query($connect,"SELECT * FROM jobs WHERE ID=".$_GET['ID']."");
while($row = mysqli_fetch_array($result)){
		/*Új létrehozása.*/
			echo '<div class="wrap"><div id="icon-edit-pages" class="icon32 icon32-posts-page"><br /></div><h2>Új álláshirdetés hozzáadása</h2></div>';
	echo '<form method="post" action="admin.php?page=allasok&action=save&ID='.$row['ID'].'">
<input type="hidden" name="option_page" value="general" />
<input type="hidden" name="action" value="update" /><input type="hidden" name="_wp_http_referer" value="/pidhu/wp-admin/options-general.php" />
<table class="form-table">
<tr valign="top">
<th scope="row"><label for="job_name">Cím</label></th>
<td><input name="job_name" type="text" id="job_name" value="'.$row['job_name'].'" class="regular-text" /></td>
</tr>
</tr>

<tr valign="top">
<th scope="row"><label for="job_place">Munkavégzés helye</label></th>
<td><input name="job_place" type="text" id="job_place" value="'.$row['job_place'].'" class="regular-text" /></td>
</tr>
</tr>

<tr valign="top">
<th scope="row"><label for="job_type">Munkarend</label></th>
<td><input name="job_type" type="text" id="job_type" value="'.$row['job_type'].'" class="regular-text" /></td>
</tr>
</tr>


<tr valign="top">
<th scope="row"><label for="job_school">Iskolai végzettség</label></th>
<td><input name="job_school" type="text" id="job_school" value="'.$row['job_school'].'" class="regular-text" /></td>
</tr>
</tr>
<tr valign="top">
<th scope="row"><h2>Leírások</h2></th>
</tr>
<tr valign="top">
<th scope="row"><label for="job_prereq">Követelmények a pályázóval szemben</label></th>
<td><textarea name="job_prereq" type="text" id="job_prereq" rows="5" cols="100" class="regular-text" />'.$row['job_prereq'].'</textarea></td>
</tr>
</tr>
<tr valign="top">
<th scope="row"><label for="job_desc">Munkakör leírása</label></th>
<td><textarea name="job_desc" type="text" id="job_desc" rows="5" cols="100" class="regular-text" />'.$row['job_desc'].'</textarea></td>
</tr>
</tr>
<tr valign="top">
<th scope="row"><h2>Kapcsolati adatok</h2></th>
</tr>
<tr valign="top">
<th scope="row"><label for="job_contact_name">Kapcsolattartó</label></th>
<td><input name="job_contact_name" type="text" id="job_contact_name" value="'.$row['job_contact_name'].'" class="regular-text" /></td>
</tr>
</tr>

<tr valign="top">
<th scope="row"><label for="job_email">Kontakt Email</label></th>
<td><input name="job_email" type="text" id="job_email" value="'.$row['job_mail'].'" class="regular-text" /></td>
</tr>
</tr>


<tr valign="top">
<th scope="row"><label for="job_tel">Kontakt telefonszám</label></th>
<td><input name="job_tel" type="text" id="job_tel" value="'.$row['job_tel'].'" class="regular-text" /></td>
</tr>
</tr>


<tr valign="top">
<th scope="row"><label for="job_url">Állás linkje</label></th>
<td><input name="job_url" type="text" id="job_url" value="'.$row['job_url'].'" class="regular-text" /></td>
</tr>
</tr>



';
echo '<p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="Módosítások mentése"  /></p></form>';	
		/*Meglévő szerkesztésének vége*/	
}
	}		
	
	}

/*Eredeti lekérés:*/
$query="SELECT * FROM jobs WHERE job_active!=3 ORDER BY ID DESC";

/*Listázások*/
if($_GET['list']!=""){
	
	if($_GET['list']=="active"){
		
		$uid=$_GET['uid'];
		$query="SELECT * FROM jobs WHERE job_active=1 ORDER BY ID DESC";
		
	}
	
	if($_GET['list']=="deactivated"){
		
		$uid=$_GET['uid'];
		$query="SELECT * FROM jobs WHERE job_active=0 ORDER BY ID DESC";
		
	}
	
	if($_GET['list']=="deleted"){
		
		$uid=$_GET['uid'];
		$query="SELECT * FROM jobs WHERE job_active=3 ORDER BY ID DESC";
		
	}
	
	if($_GET['list']=="user"){
		
		$uid=$_GET['uid'];
		$query="SELECT * FROM jobs WHERE author_ID='".$uid."' ORDER BY ID DESC";
		
	}
	}	

/*Print*/
/*Print-egyedi*/
/*Print_all*/

if($_GET['action']==""){
echo '<div class="wrap">
	<div id="icon-edit-pages" class="icon32 icon32-posts-page"><br /></div><h2>Állások <a href="admin.php?page=allasok&action=new" class="add-new-h2">Új hozzáadása</a></h2></div>
	<div style="margin:10px 0px 10px 0px;width:1000px; height:30px;"><ul class="subsubsub">
	<li><a href="admin.php?page=allasok">Összes</a></li> | 
	<li><a href="admin.php?page=allasok&list=active">Aktív</a></li> | 
	<li><a href="admin.php?page=allasok&list=deactivated">Deaktivált</a></li> | 
	<li><a href="admin.php?page=allasok&list=deleted">Törölt</a> </li>
	</ul></div>';	
$result=mysqli_query($connect,$query);

echo '<div id="admin_jobs"><ul>';
echo '<li class="elso"><ul><li>Cím</li><li>Felhasználó</li><li>Dátum</li><li>Helyszín</li><li>Aktív</li><li>Törlés</li><li>Szerkesztés</li></ul></li>';
		while($row = mysqli_fetch_array($result)){
			echo '<li>';
            echo '<ul><li><h3>'.$row['job_name'].'</h3></li><li><a href="admin.php?page=allasok&list=user&uid='.$row['author_ID'].'">';
			$user=get_userdata($row['author_ID']);
			echo $user->user_nicename;
			echo '</a></li><li>'.$row['job_act_date'].'</li><li>'.$row['job_place'].'</li><li>';   	
			if($row['job_active']=="1"){echo '<a href="admin.php?page=allasok&ID='.$row['ID'].'&action=flipout">Deaktiválás</a>';}else{echo '<a href="admin.php?page=allasok&ID='.$row['ID'].'&action=flipin">Aktiválás</a>';}
			echo '</li><li>';
			if($row['job_active']!="3"){echo '<a href="admin.php?page=allasok&ID='.$row['ID'].'&action=del">Törlés</a>';}else{echo "Törölt.";}
			echo '</li><li><a href="admin.php?page=allasok&ID='.$row['ID'].'&action=edit">Szerkesztés</a>';
			echo '</li><li>';
			echo '<a href="admin.php?page=allasok&ID='.$row['ID'].'&shownoshow=pidhu">'.GetShowVar($row['job_show'],"pidhu").'</a> ';
			echo '<a href="admin.php?page=allasok&ID='.$row['ID'].'&shownoshow=secuhu">'.GetShowVar($row['job_show'],"secuhu").'</a> ';
			echo '<a href="admin.php?page=allasok&ID='.$row['ID'].'&shownoshow=eramhu">'.GetShowVar($row['job_show'],"eramhu").'</a> ';
			echo '<a href="admin.php?page=allasok&ID='.$row['ID'].'&shownoshow=ithu">'.GetShowVar($row['job_show'],"ithu").'</a> ';
			
			echo '</li></ul>';
            echo '</li><li>';
			echo'<p>'.$row['job_desc'].'</p>';
            echo '</li>';	
			}
echo '</ul>';	
echo '</div>';	
}
}?>