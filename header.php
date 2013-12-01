<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="hu-HU">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:og="http://ogp.me/ns#" xmlns:fb="https://www.facebook.com/2008/fbml">  
<head profile="http://gmpg.org/xfn/11">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php bloginfo('name'); ?> <?php if ( is_single() ) { ?> &raquo; Blog Archive <?php } ?> <?php wp_title(); ?></title>
  <meta http-equiv="Content-Language" content="hu-hu" />
  <meta name="author" content="" />
  <meta http-equiv="content-language" content="hu" />
  <meta name="ROBOTS" content="ALL" />
  <meta name="revisit-after" content="1 days" />
  <meta name="description" content="" />
  <meta name="keywords" content="" />
  <meta name="generator" content="WordPress <?php bloginfo('version'); ?>" /> <!-- leave this for stats -->

<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/reset.css" type="text/css" media="screen" />
<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css" type="text/css" media="screen" />   

		<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
		<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
		<link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />   
        
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.js" type="text/javascript"></script>        
<script src="<?php echo get_template_directory_uri(); ?>/js/cufon-yui.js" type="text/javascript"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/sajat.js" type="text/javascript"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/bebas_neue_400.font.js" type="text/javascript"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/helvetica_neue_lt_std_250.font.js" type="text/javascript"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/Roboto_1400.font.js" type="text/javascript"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/Roboto_700.font.js" type="text/javascript"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/Roboto_350.font.js" type="text/javascript"></script>

      <script type="text/javascript">
Cufon.replace('#footer ul li h3', { fontFamily: 'bebas' });
Cufon.replace('#content h2', { fontFamily: 'bebas' });
Cufon.replace('#widget h2', { fontFamily: 'bebas' });
Cufon.replace('#post h1', { fontFamily: 'Helvetica Neue LT Std' });
Cufon.replace('#single h1', { fontFamily: 'Helvetica Neue LT Std' });
Cufon.replace('#news h1', { fontFamily: 'Helvetica Neue LT Std' });
Cufon.replace('#single h4', { fontFamily: 'Helvetica Neue LT Std' });
Cufon.replace('#day', { fontFamily: 'Roboto' });

Cufon.replace('#logo h1', { fontFamily: 'Roboto Bold' });
Cufon.replace('#logo h1 span', { fontFamily: 'Roboto Th' });
Cufon.replace('#logo h2', { fontFamily: 'Roboto' });

Cufon.replace('#subnav ol li', { fontFamily: 'Roboto' });
Cufon.replace('#rolldown ul li h2', { fontFamily: 'Roboto Th' });

Cufon.replace('#reg h1', { fontFamily: 'Roboto Th' });
Cufon.replace('#reg ul li h3', { fontFamily: 'Roboto' });
Cufon.replace('#reg h2', { fontFamily: 'Roboto' });
		</script>
<!-- gyari wp head-->  
<?php wp_head(); ?> 

</head>
<body>
<div id="network">
<div id="network-strip">
<span class="network-strip-item" style="text-transform: none; font-weight: normal;"><a href="http://nieman.harvard.edu/">Fedezze fel többi oldalunkat is</a></span>
<span class="network-strip-item"><a href="/pidhu">PID.hu</a></span>
<span class="network-strip-item"><a href="/eramhu">Eram.hu</a></span>
<span class="network-strip-item"><a href="/secuhu">Secu.hu</a></span>
<span class="network-strip-item"><a href="/ithu">It.hu</a></span>
</div>
</div>
<div id="title"><div style="opacity:0.7;">Egy hely irányítástechnikával foglalkozó mérnököknek, mert együtt előrébb jutunk. Ha érted a címet, jó helyen jársz.</div></div>

<?php Banner(6); ?>
<div id="wrapper">
	<div id="header">
<div id="logo">
<a href="<?php echo get_home_url(); ?>"><div style="float:left;"><h1>PID<span>hu</span></h1><h2>*proportional-integral-deriative controller</h2></div></a>
<div id="searchandlogin">
<div id="search">
<form action="index.php" method="get">
<input type="text" id="s" value="<?php if($_GET['s']!=""){echo $_GET['s'];} ?>" name="s">
<input type="submit" value="" />
</form>
</div>
<div id="day">
<?php the_time('Y. F j. l') ?>
<br><span><?php nevnap(get_the_time('n'),get_the_time('j')-1);?></span>
</div>
<div id="login">
| Bejelentkezés
</div>
</div>
</div>  
        <nav>
        <ul>
        	<li >Címlap </li>
            <li >Hírek</li>
            <li>Tudásbázis</li> 
            <li>Állás</li>
			<li>Programok</li>
			<li>Cégek</li>
			<li><?php if ( !(is_user_logged_in()) ) { ?> Bejelentkezés<?php }else{ ?>Profil<?php }?></li>
        </ul>
        </nav>
	</div>
    <div id="rolldown">
    <ul>
    	<li><h2>1</h2></li>
    	<li><h2>2</h2></li>
    	<li><h2>3</h2></li>
    	<li>
        <div id="subnav-sect" style="width:200px;border-right:1px dotted #ccc;">
        <ol>
        <a href="<?php echo get_permalink(93); ?>"><li>Állások listája</li></a>
        <a href="<?php echo get_permalink(93); ?>&action=newjobs"><li>Új Állás hozzáadása</li></a>
        </ol>
            </div>
             <div id="jobs_in_head" style="">
         	<ol>
          <?php  
		  $connect=SqlFrameWork();
		  
		  $result = mysqli_query($connect,"SELECT * FROM jobs WHERE job_active='1'");
		  $i=0;
		while($row = mysqli_fetch_array($result)){
			if(GetShowVar($row['job_show'],'pidhu')==1){
			if($i==3){break;}
			$i++;
			echo '<a href="'.get_permalink(93).'&jobs='.$row['ID'].'"><li>';
            echo '<h3>'.$row['job_name'].'</h3>';
			echo '<h3><span> '.$row['job_type'].' @ '.$row['job_place'].'</span></h3>';
			echo '<p>'.$row['job_desc'].'</p>';
            echo '</li></a>';
		}}
			?>
            </ol>
         	<div>
            
            
            </li>
    	<li>
        <div id="subnav-sect" style="width:200px;border-right:1px dotted #ccc;">
        <ol>
        <a href="<?php echo get_permalink(87); ?>"><li>Események listája</li></a>
        <a href="<?php echo get_permalink(87); ?>&action=newevent"><li>Új esemény hozzáadása</li></a>
        </ol>
            </div>
         <div id="events_in_head" style="">
         	<ol>
          <?php  
		  $result = mysqli_query($connect,"SELECT * FROM events WHERE event_active='1' ORDER BY event_date DESC");
		  $i=0;
		while($row = mysqli_fetch_array($result)){
			if(GetShowVar($row['event_show'],'pidhu')==1){
			if($i==3){break;}
			$i++;
			echo '<a href="'.get_permalink(87).'&event='.$row['ID'].'"><li>';
            if($row['event_img']!=""){echo '<img src="'.get_template_directory_uri().'/images/'.$row['event_img'].'">';}else{
				echo '<img src="'.get_template_directory_uri().'/images/Simple_silver_crown.svg.png">';
				}
            echo '<h3>'.$row['event_name'].'<span> '.$row['event_date'].' @ '.$row['event_place'].'</span></h3>';
            echo '<p>'.$row['event_body'].'</p>';
            echo '</li></a>';
		}}
			?>
            </ol>
         	<div>
        
        </li>
    	<li><h2>6</h2></li>
    	<li>
        	<div id="subnav-sect" style="width:200px;">
            	<ol>
                	<?php if((is_user_logged_in())){ ?>
                    <a href="<?php echo get_permalink(74); ?> "><li>Profil szerkesztése</li></a>
                    <a href="<?php $user_info = get_userdata(get_current_user_id()); echo get_permalink(84).'&user='.$user_info->user_nicename; ?>"><li>Nyilvános Profilom</li></a>
                    <a href="<?php echo wp_logout_url($_SERVER["REQUEST_URI"]); ?>"><li>Kijelentkezés</li></a>
                    <?php }else{?>
                    <a href="<?php echo get_permalink(76); ?> "><li>Regisztráció</li></a>
                <?php } ?>
                </ol>
            </div>
        <?php if ( !(is_user_logged_in()) ) { ?> 
          <div id="subnav-sect" style="border-right:1px dotted #ccc;">
            <h2>Bejelentkezés</h2>
            <p>Amennyiben alábbi szolgáltatások felhasználója, egy kattintással bejelentkezhet oldalainkra.</p>
            <div id="sociallogin">
            <img src="<?php echo get_template_directory_uri(); ?>/images/facebook.png" width="32" height="32" />
            <img src="<?php echo get_template_directory_uri(); ?>/images/google.png" width="32" height="32" />
            <img src="<?php echo get_template_directory_uri(); ?>/images/linkedin.png" width="32" height="32" />
            <img src="<?php echo get_template_directory_uri(); ?>/images/twitter.png" width="32" height="32" />
            </div>
          </div>
            <div id="subnav-sect">
            <h2>Klasszikus Bejelentkezés</h2>
            <p>Klasszikus bejelentkezési felületünk.</p>
            <?php wp_login_form(); ?>
            </div>
           <?php }else{ ?> 
	<div id="subnav-sect" style="border-right:1px dotted #ccc;">
    <h2>Beállítások</h2>
    <p>Üdv itthon <strong><?php echo $user_info->user_nicename;?>!</strong></p>
    <p>A legfontosabb adatod amit tárolunk az email címed. Ezzel azonosítunk téged, és követünk nyomon.</p>
    <div id="useremail"><?php echo $user_info->user_email;?></div>
    <p>Jelenleg Te azt szeretnéd, hogy <strong><?php if($user_info->user_jobs!="1"){echo "ne küldjünk".$user_info->user_jobs;}else{echo "küldjünk";} ?></strong> számodra álláshirdetéseket az általunk regisztrált cégektől. <strong><?php if($user_info->user_jobs==$user_info->user_events){echo "Szintén ";}else{echo "De ";}  if($user_info->user_events=="1"){echo "küldjünk";}else{echo "ne küldjünk";} ?></strong> számodra meghívót az oldalunk hirdetett eseményekre.</p>
    <p>Ezen kívül, profilodat <strong><?php if($user_info->user_publikcv=="1"){echo "publikussá";}else{echo " titkossá ";} ?></strong> tetted, azaz önéletrajzod <?php if($user_info->user_publikcv!="1"){echo "nem";} ?> elérhető az oldalunkon.</p>

    <a href="<?php echo get_permalink(74); ?> "><div class="button">Ezen beállítások megváltoztatása</div></a>
    </div>
    	<div id="subnav-sect">
        <h2>Önéletrajz</h2>
        <p>Oldalunkon lehetőséged online, szakmai önéletrajzot elhelyezni. Pillanatnyi kitöltöttsége az önéletrajzodnak:</p>
        <div id="status_wrapper">
        <?php $szazalek=GetPercentCv(); echo $szazalek; ?>%
        <div id="status_bar">
        <div id="status" style="width:<?php $teljes=360; $ertek=($teljes/100)*$szazalek; echo $ertek; ?>px;color:#ccc;"></div>
        </div>
        </div>
        <p>Lehetőséged van pdf fájlok feltöltésére, azonban mindenképp ajánljuk, hogy egyszer fuss végig a kitöltésen.</p>
        
    <div class="button">Önéletrajz <?php if($szazalek<=20){echo "elkezdése";}else{echo "folytatása";} ?></div>
    </div>
           <?php } ?>
        </li>                                
    </ul>
        </div>