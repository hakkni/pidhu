<?php 
function reklamok(){
echo '
<style type="text/css">
#admin_ads{float:none !important; margin-top:20px;}
	#admin_ads ul{width:1000px;border:1px solid #ddd;border-radius:3px;}
		#admin_ads ul li{width:980px; text-align:justify;list-style:none;padding:10px;}
			#admin_ads ul li {min-height:30px;margin-bottom:0px;}
			#admin_ads ul li:nth-child(even){background:#fcfcfc;}
			#admin_ads ul li:nth-child(odd){background:#efefef; min-height:20px; padding-bottom:20px;}
			#admin_ads ul li.elso{background: linear-gradient(to top, #DCDCDC, #E9E9E9) #E1E1E1; padding-top:8px;}
				#admin_ads ul li ul{width:1100px; border:none; border-radius:0px; display:block;}
					#admin_ads ul li ul li{float:left;height:0px; padding:0px 0px 0px 0px; background:none !important;}
						#admin_ads ul li ul li:nth-child(1){width:370px;}
						#admin_ads ul li ul li:nth-child(2){width:100px;}
    					#admin_ads ul li ul li:nth-child(3){width:100px;}
						#admin_ads ul li ul li:nth-child(4){width:100px;}		
						#admin_ads ul li ul li:nth-child(5){width:100px;text-align:center;}	
    					#admin_ads ul li ul li:nth-child(6){width:70px;text-align:center;}	
     					#admin_ads ul li ul li:nth-child(7){width:70px; text-align:center;}	
						#admin_ads ul li ul li:nth-child(8){width:70px; text-align:center;}																		
			
				#admin_ads ul li p{width:900px;}
				#admin_ads ul li img{margin:10px;float:right;}
				#admin_ads ul li h3{padding:0px !important;margin:0px !important;}
				
 </style>
';	

$connect=SqlFrameWork();
/*Kapcsolók*/	
/*Kapcsolók*/


if($_GET['shownoshow']!=""&&$_GET['ID']!=""){
$eid=$_GET['ID'];
$cold=0;
$result = mysqli_query($connect,"SELECT * FROM ads WHERE ID='".$_GET['ID']."'");

/*PIDHU*/
if($_GET['shownoshow']=="pidhu"&&$_GET['ID']!=""){
while($row = mysqli_fetch_array($result)){$cold=$row['ad_show'];}

if(GetShowVar($cold,"pidhu")==1){$cold=$cold-1000;}else{$cold=$cold+1000;}

mysqli_query($connect,"UPDATE ads SET ad_show='".$cold."' WHERE ID=$eid");

wp_redirect( 'admin.php?page=reklamok' ); exit;
	}

/*secuhu*/
if($_GET['shownoshow']=="secuhu"&&$_GET['ID']!=""){
while($row = mysqli_fetch_array($result)){$cold=$row['ad_show'];}

if(GetShowVar($cold,"secuhu")==1){$cold=$cold-100;}else{$cold=$cold+100;}

mysqli_query($connect,"UPDATE ads SET ad_show='".$cold."' WHERE ID=$eid");

wp_redirect( 'admin.php?page=reklamok' ); exit;
	}

/*ERAMHU*/
if($_GET['shownoshow']=="eramhu"&&$_GET['ID']!=""){
while($row = mysqli_fetch_array($result)){$cold=$row['ad_show'];}

if(GetShowVar($cold,"eramhu")==1){$cold=$cold-10;}else{$cold=$cold+10;}

mysqli_query($connect,"UPDATE ads SET ad_show='".$cold."' WHERE ID=$eid");

wp_redirect( 'admin.php?page=reklamok' ); exit;
	}

/*ITHU*/
if($_GET['shownoshow']=="ithu"&&$_GET['ID']!=""){
while($row = mysqli_fetch_array($result)){$cold=$row['ad_show'];}

if(GetShowVar($cold,"ithu")==1){$cold=$cold-1;}else{$cold=$cold+1;}

mysqli_query($connect,"UPDATE ads SET ad_show='".$cold."' WHERE ID=$eid");

wp_redirect( 'admin.php?page=reklamok' ); exit;
	}	
	
	}

if($_GET['action']!=""){
	/*Műveletek*/

/*Törlés*/	
if($_GET['action']=="del"&&$_GET['ID']!=""){
$eid=$_GET['ID'];
mysqli_query($connect,"UPDATE ads SET ad_active='3' WHERE ID=$eid");
wp_redirect( 'admin.php?page=reklamok' ); exit;
	}	
	
/*Flip-in/Flip-out*/	
if($_GET['action']=="flipin"&&$_GET['ID']!=""){
$eid=$_GET['ID'];
mysqli_query($connect,"UPDATE ads SET ad_active='1' WHERE ID=$eid");
wp_redirect( 'admin.php?page=reklamok' ); exit;
	}
	
if($_GET['action']=="flipout"&&$_GET['ID']!=""){
$eid=$_GET['ID'];
mysqli_query($connect,"UPDATE ads SET ad_active='0' WHERE ID=$eid");
wp_redirect( 'admin.php?page=reklamok' ); exit;
}
}
/*Mentesek*/
if($_GET['action']=="savenew"){
	
$query="INSERT INTO ads (author_ID, ad_name, ad_blob, ad_type, ad_active)
 VALUES ('".get_current_user_id()."', '".$_POST['ad_name']."',  '".$_POST['ad_blob']."',  '".$_POST['ad_type']."',  '0')";	
 
 mysqli_query($connect,$query);
wp_redirect( 'admin.php?page=reklamok' ); exit;
	}	
	
	
if($_GET['action']=="save"&&$_GET['ID']!=""){
$query="UPDATE ads SET ad_name='".$_POST['ad_name']."', ad_blob='".$_POST['ad_blob']."', ad_type='".$_POST['ad_type']."'  WHERE ID='".$_GET['ID']."'";	
 mysqli_query($connect,$query);
wp_redirect( 'admin.php?page=reklamok' ); exit;
	}	
	
		
/*Listázás*/
/*Eredeti lekérés:*/
$query="SELECT * FROM ads WHERE ad_active!=3 ORDER BY ID DESC";

if($_GET['list']!=""){
	
	if($_GET['list']=="active"){
		
		$uid=$_GET['uid'];
		$query="SELECT * FROM ads WHERE ad_active=1 ORDER BY ID DESC";
		
	}
	
	if($_GET['list']=="deactivated"){
		
		$uid=$_GET['uid'];
		$query="SELECT * FROM ads WHERE ad_active=0 ORDER BY ID DESC";
		
	}
	
	if($_GET['list']=="deleted"){
		
		$uid=$_GET['uid'];
		$query="SELECT * FROM ads WHERE ad_active=3 ORDER BY ID DESC";
		
	}
	
	if($_GET['list']=="user"){
		
		$uid=$_GET['uid'];
		$query="SELECT * FROM ads WHERE author_ID='".$uid."' ORDER BY ID DESC";
		
	}
	}	

/*Új létrehozása*/
	if($_GET['action']=="new"){
		/*Új létrehozása.*/
			echo '<div class="wrap"><div id="icon-edit-pages" class="icon32 icon32-posts-page"><br /></div><h2>Új reklám hozzáadása</h2></div>';
	echo '<form method="post" action="admin.php?page=reklamok&action=savenew">
<input type="hidden" name="option_page" value="general" />
<input type="hidden" name="action" value="update" /><input type="hidden" name="_wp_http_referer" value="/pidhu/wp-admin/options-general.php" />
<table class="form-table">
<tr valign="top">
<th scope="row"><label for="ad_place">Reklám neve</label></th>
<td><input name="ad_name" type="text" id="ad_name" value="" class="regular-text" /></td>
</tr>
</tr>

<tr valign="top">
<th scope="row"><label for="ad_name">Beillesztendő anyag</label></th>
<td><textarea name="ad_blob" type="text" id="ad_blob" rows="5" cols="100" class="regular-text" /></textarea></td>
</tr>
</tr>

<tr valign="top">
<th scope="row"><label for="ad_place">Reklám típusa</label></th>
<td><select name="ad_type">
   <option value="banner">Banner</option>
   <option value="nagybanner">Nagy Banner</option>
   <option value="beagyazott">Beágyazott reklám</option>
 </select></td>
</tr>
</tr>
';
echo '<p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="Módosítások mentése"  /></p></form>';	
		/*Új létrehozásának vége*/
		}
/*Elem*/
if($_GET['action']=="edit"&&$_GET['ID']!=""){
	$result = mysqli_query($connect,"SELECT * FROM ads WHERE ID=".$_GET['ID']."");
while($row = mysqli_fetch_array($result)){
	echo '<div class="wrap"><div id="icon-edit-pages" class="icon32 icon32-posts-page"><br /></div><h2>Új reklám hozzáadása</h2></div>';
	echo '<form method="post" action="admin.php?page=reklamok&action=save&ID='.$row['ID'].'">
<input type="hidden" name="option_page" value="general" />
<input type="hidden" name="action" value="update" /><input type="hidden" name="_wp_http_referer" value="/pidhu/wp-admin/options-general.php" />
<table class="form-table">
<tr valign="top">
<th scope="row"><label for="ad_place">Reklám neve</label></th>
<td><input name="ad_name" type="text" id="ad_name" value="'.$row['ad_name'].'" class="regular-text" /></td>
</tr>
</tr>

<tr valign="top">
<th scope="row"><label for="ad_name">Beillesztendő anyag</label></th>
<td><textarea name="ad_blob" type="text" id="ad_blob" rows="5" cols="100" class="regular-text" />'.$row['ad_blob'].'</textarea></td>
</tr>
</tr>

<tr valign="top">
<th scope="row"><label for="ad_place">Reklám típusa</label></th>
<td><select name="ad_type">
   <option value="1"'; if($row['ad_type']==1){echo ' selected '; }echo '>Banner</option>
   <option value="2"'; if($row['ad_type']==2){echo ' selected '; } echo '>Nagy Banner</option>
   <option value="3"'; if($row['ad_type']==3){echo ' selected '; } echo '>Beágyazott reklám</option>
 </select></td>
</tr>
</tr>
';
echo '<p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="Módosítások mentése"  /></p></form>';	
	
	
	}}
		/*Új létrehozása.*/

/*Összes*/
if($_GET['action']==""){
echo '<div class="wrap">
	<div id="icon-edit-pages" class="icon32 icon32-posts-page"><br /></div><h2>Reklámok <a href="admin.php?page=reklamok&action=new" class="add-new-h2">Új hozzáadása</a></h2></div>
	<div style="margin:10px 0px 10px 0px;width:1000px; height:30px;"><ul class="subsubsub">
	<li><a href="admin.php?page=reklamok">Összes</a></li> | 
	<li><a href="admin.php?page=reklamok&list=active">Aktív</a></li> | 
	<li><a href="admin.php?page=reklamok&list=deactivated">Deaktivált</a></li> | 
	<li><a href="admin.php?page=reklamok&list=deleted">Törölt</a> </li>
	</ul></div>';	
$result=mysqli_query($connect,$query);

echo '<div id="admin_ads"><ul>';
echo '<li class="elso"><ul><li>Cím</li><li>Felhasználó</li><li>Dátum</li><li>Helyszín</li><li>Aktív</li><li>Törlés</li><li>Szerkesztés</li></ul></li>';
		while($row = mysqli_fetch_array($result)){
			echo '<li>';
            echo '<ul><li><h3>'.$row['ad_name'].'</h3></li><li><a href="admin.php?page=reklamok&list=user&uid='.$row['author_ID'].'">';
			$user=get_userdata($row['author_ID']);
			echo $user->user_nicename;
			echo '</a></li><li>'.$row['ad_act_date'].'</li><li>';
			switch($row['ad_type']){
				case 1: echo 'banner'; break;
				case 2: echo 'nagybanner'; break;
				case 3: echo 'beágyazott'; break;
			}
			
			
			echo'</li><li>';   	
			if($row['ad_active']=="1"){echo '<a href="admin.php?page=reklamok&ID='.$row['ID'].'&action=flipout">Deaktiválás</a>';}else{echo '<a href="admin.php?page=reklamok&ID='.$row['ID'].'&action=flipin">Aktiválás</a>';}
			echo '</li><li>';
			if($row['ad_active']!="3"){echo '<a href="admin.php?page=reklamok&ID='.$row['ID'].'&action=del">Törlés</a>';}else{echo "Törölt.";}
			echo '</li><li><a href="admin.php?page=reklamok&ID='.$row['ID'].'&action=edit">Szerkesztés</a>';
			echo '</li><li>';
			echo '<a href="admin.php?page=reklamok&ID='.$row['ID'].'&shownoshow=pidhu">'.GetShowVar($row['ad_show'],"pidhu").'</a> ';
			echo '<a href="admin.php?page=reklamok&ID='.$row['ID'].'&shownoshow=secuhu">'.GetShowVar($row['ad_show'],"secuhu").'</a> ';
			echo '<a href="admin.php?page=reklamok&ID='.$row['ID'].'&shownoshow=eramhu">'.GetShowVar($row['ad_show'],"eramhu").'</a> ';
			echo '<a href="admin.php?page=reklamok&ID='.$row['ID'].'&shownoshow=ithu">'.GetShowVar($row['ad_show'],"ithu").'</a> ';
			
			echo '</li></ul>';
            echo '</li><li>';
			echo'<p>'.htmlentities($row['ad_blob']).'</p>';
            echo '</li>';	
			}
echo '</ul>';	
echo '</div>';	
}
}?>