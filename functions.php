<?php
/**
 * Register our sidebars and widgetized areas.
 *
 */
 
 include('/admin-events-tpl.php');
 include('/admin-jobs-tpl.php');
 include('/admin-ads-tpl.php'); 
 
function nevnap($honap,$nap){
	$januar = array("Fruzsina","Ábel","Genovéva, Benjámin","Titusz, Leona","Simon","Boldizsár","Attila, Ramóna","Gyöngyvér","Marcell","Melánia","Ágota","Ernő","Veronika","Bódog","Lóránt, Loránd","Gusztáv","Antal, Antónia","Piroska","Sára, Márió","Fábián, Sebestyén","Ágnes","Vince, Artúr","Zelma, Rajmund","Timót","Pál","Vanda, Paula","Angelika","Károly, Karola","Adél","Martina, Gerda","Marcella");
	$februar = array("Ignác","Karolina, Aida","Balázs","Ráhel, Csenge","Ágota, Ingrid","Dorottya, Dóra","Tódor, Rómeó","Aranka","Abigél, Alex","Elvira","Bertold, Marietta","Lívia, Lídia","Ella, Linda","Bálint, Valentin","Kolos, Georgina","Julianna, Lilla","Donát","Bernadett","Zsuzsanna","Aladár, Álmos","Eleonóra","Gerzson","Alfréd","Szokonap","Mátyás","Géza","Edina","Ákos, Bátor","Elemér","","");
	$marcius = array("Albin","Lujza","Kornélia","Kázmér","Adorján, Adrián","Leonóra, Inez","Tamás","Zoltán","Franciska, Fanni","Ildikó","Szilárd","Gergely","Krisztián, Ajtony","Matild","Kristóf","Henrietta","Gertrúd, Patrik","Sándor, Ede","József, Bánk","Klaudia","Benedek","Beáta, Izolda","Emoke","Gábor, Karina","Irén, Irisz","Emánuel","Hajnalka","Gedeon, Johanna","Auguszta","Zalán","Árpád");
	$aprilis = array("Hugó","Áron","Buda, Richárd","Izidor","Vince","Vilmos, Bíborka","Herman","Dénes","Erhard","Zsolt","Leó, Szaniszló","Gyula","Ida","Tibor","Anasztázia, Tas","Csongor","Rudolf","Andrea, Ilma","Emma","Tivadar","Konrád","Csilla, Noémi","Béla","György","Márk","Ervin","Zita","Valéria","Péter","Katalin, Kitti");
	$majus = array("Fülöp, Jakab","Zsigmond","Tímea, Irma","Mónika, Flórián",
"Györgyi","Ivett, Frida","Gizella","Mihály","Gergely","Ármin, Pálma",
"Ferenc","Pongrác","Szervác, Imola","Bonifác","Zsófia, Szonja",
"Mózes, Botond","Paszkál","Erik, Alexandra","Ivó, Milán",
"Bernát, Felícia","Konstantin","Júlia, Rita","Dezso","Eszter, Eliza",
"Orbán","Fülöp, Evelin","Hella","Emil, Csanád","Magdolna",
"Janka, Zsanett","Angéla, Petronella");
	$junius = array("Tünde","Kármen, Anita","Klotild","Bulcsú","Fatime","Norbert, Cintia","Róbert","Medárd","Félix","Margit, Gréta","Barnabás","Villo","Antal, Anett","Vazul","Jolán, Vid","Jusztin","Laura, Alida","Arnold, Levente","Gyárfás","Rafael","Alajos, Leila","Paulina","Zoltán","Iván","Vilmos","János, Pál","László","Levente, Irén","Péter, Pál","Pál");
	$julius = array("Tihamér, Annamária","Ottó","Kornél, Soma","Ulrik","Emese, Sarolta","Csaba","Appolónia","Ellák","Lukrécia","Amália","Nóra, Lili","Izabella, Dalma","Jeno","Ors, Stella","Henrik, Roland","Valter","Endre, Elek","Frigyes","Emília","Illés","Dániel, Daniella","Magdolna","Lenke","Kinga, Kincso","Kristóf, Jakab","Anna, Anikó","Olga, Liliána","Szabolcs","Márta, Flóra","Judit, Xénia","Oszkár");
	$augusztus = array("Boglárka","Lehel","Hermina","Domonkos, Dominika","Krisztina","Berta, Bettina","Ibolya","László","Emod","Lörinc","Zsuzsanna, Tiborc","Klára","Ipoly","Marcell","Mária","Ábrahám","Jácint","Ilona","Huba","István","Sámuel, Hajna","Menyhért, Mirjam","Bence","Bertalan","Lajos, Patrícia","Izsó","Gáspár","Ágoston","Beatrix, Erna","Rózsa","Erika, Bella");
	$szeptember = array("Egyed, Egon","Rebeka, Dorina","Hilda","Rozália","Viktor, Lorinc","Zakariás","Regina","Mária, Adrienn","Ádám","Nikolett, Hunor","Teodóra","Mária","Kornél","Szeréna, Roxána","Eniko, Melitta","Edit","Zsófia","Diána","Vilhelmina","Friderika","Máté, Mirella","Móric","Tekla","Gellért, Mercédesz","Eufrozina, Kende","Jusztina","Adalbert","Vencel","Mihály","Jeromos");
	$oktober = array("Malvin","Petra","Helga","Ferenc","Aurél","Brúnó, Renáta","Amália","Koppány","Dénes","Gedeon","Brigitta","Miksa","Kálmán, Ede","Helén","Teréz","Gál","Hedvig","Lukács","Nándor","Vendel","Orsolya","Elod","Gyöngyi a Forradalomban","Salamon","Blanka, Bianka","Dömötör","Szabina","Simon, Szimonetta","Nárcisz","Alfonz","Farkas");
	$november = array("Marianna","Achilles","Gyozo","Károly","Imre","Lénárd","Rezso","Zsombor","Tivadar","Réka","Márton","Jónás, Renátó","Szilvia","Aliz","Albert, Lipót","Ödön","Hortenzia, Gergo","Jeno","Erzsébet","Jolán","Olivér","Cecília","Kelemen, Klementina","Emma","Katalin","Virág","Virgil","Stefánia","Taksony","András, Andor" );
	$december = array("Elza","Melinda, Vivien","Ferenc, Olívia","Borbála, Barbara","Vilma","Miklós","Ambrus","Mária","Natália","Judit","Árpád","Gabriella","Luca, Otília","Szilárda","Valér","Etelka, Aletta","Lázár, Olimpia","Auguszta","Viola","Teofil","Tamás","Zéno","Viktória","Ádám, Éva","Boldog Karácsonyt!","Boldog Karácsonyt!","János","Kamilla",
"Tamás, Tamara","Dávid","Szilveszter");

$akt=array();
switch($honap){
	case 1:$akt=$januar;break;
	case 2:$akt=$februar;break;
	case 3:$akt=$marcius;break;
	case 4:$akt=$aprilis;break;
	case 5:$akt=$majus;break;
	case 6:$akt=$junius;break;
	case 7:$akt=$julius;break;
	case 8:$akt=$augusztus;break;
	case 9:$akt=$szeptember;break;
	case 10:$akt=$oktober;break;
	case 11:$akt=$november;break;	
	case 12:$akt=$december;break;	
	}
	echo $akt[$nap];
	}

function arphabet_widgets_init() {

	register_sidebar( array(
		'name' => 'Home right sidebar',
		'id' => 'home_right_1',
		'before_widget' => '<div id="widget">',
		'after_widget' => '</div>',
		'before_title' => '<h2>',
		'after_title' => '</h2>',
	) );
	
}
add_action( 'widgets_init', 'arphabet_widgets_init' );

function cikk_widgets_init() {

	register_sidebar( array(
		'name' => 'news_left',
		'id' => 'home_right_2',
		'before_widget' => '<div id="widget">',
		'after_widget' => '</div>',
		'before_title' => '<h2>',
		'after_title' => '</h2>',
	) );
	
}
add_action( 'widgets_init', 'cikk_widgets_init' );

add_action('user_register', 'myplugin_registration_save');

function myplugin_registration_save($user_id) {
	
$pid_conn=mysqli_connect("localhost","root",'',"pidhu");
$eram_conn=mysqli_connect("localhost","root",'',"eramhu");
$ithu_conn=mysqli_connect("localhost","root",'',"ithu");
$secuhu_conn=mysqli_connect("localhost","root",'',"secuhu");

mysqli_query($eram_conn,"INSERT INTO wp_users (user_login, user_pass, user_nicename, user_email,user_url,user_registered,user_status,display_name)
 VALUES ('Cardinal','Tom B. Erichsen','Skagen 21','Stavanger','4006','Norway');");
}

add_action( 'show_user_profile', 'my_show_extra_profile_fields' );
add_action( 'edit_user_profile', 'my_show_extra_profile_fields' );

function my_show_extra_profile_fields( $user ) { ?>

	<h3>További dolgok magadról</h3>

	<table class="form-table">

		<tr>
			<th><label for="user_city">Város</label></th>

			<td>
				<input type="text" name="user_city" id="user_city" value="<?php echo esc_attr( get_the_author_meta( 'user_city', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description">A város ahol élsz.</span>
			</td>
		</tr>
		<tr>
			<th><label for="user_phone">Telefonszám</label></th>

			<td>
				<input type="text" name="user_phone" id="user_phone" value="<?php echo esc_attr( get_the_author_meta( 'user_phone', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description">A szám amin elérhetnek.</span>
			</td>
		</tr>
        		<tr>
			<th><label for="user_jobs">Állásajánlatok</label></th>

			<td>
				<input type="checkbox" name="user_jobs" id="user_jobs" value="1" class="regular-text" <?php if(esc_attr( get_the_author_meta( 'user_jobs', $user->ID ) )=="1"){echo "checked";} ?>  /><br />
				<span class="description">Ha szeretnél állásajánlatokról értesülni.</span>
			</td>
		</tr>
        		<tr>
			<th><label for="user_events">Események</label></th>

			<td>
				<input type="checkbox" name="user_events" id="user_events" value="1" class="regular-text" <?php if(esc_attr( get_the_author_meta( 'user_jobs', $user->ID ) )=="1"){echo "checked";} ?>/><br />
				<span class="description">Ha szeretnél eseményekről értesülni.</span>
			</td>
		</tr>
                		<tr>
			<th><label for="user_news">Hírlevelek</label></th>

			<td>
				<input type="checkbox" name="user_news" id="user_news" value="1" class="regular-text" <?php if(esc_attr( get_the_author_meta( 'user_jobs', $user->ID ) )=="1"){echo "checked";} ?>/><br />
				<span class="description">Ha szeretnél eseményekről értesülni.</span>
			</td>
		</tr>
	</table>
<?php }

add_action( 'show_user_profile', 'my_show_cv_fields' );
add_action( 'edit_user_profile', 'my_show_cv_fields' );

function my_show_cv_fields( $user ) { ?>

	<h3>Önéletrajzhoz szükséges adatok</h3>

	<table class="form-table">

		<tr>
			<th><label for="user_linkedin">Linkedin</label></th>

			<td>
				<input type="text" name="user_linkedin" id="user_linkedin" value="<?php echo esc_attr( get_the_author_meta( 'user_linkedin', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description">A Linkedin profilod linkje.</span>
			</td>
		</tr>
		<tr>
			<th><label for="user_facebook">Facebook</label></th>

			<td>
				<input type="text" name="user_facebook" id="user_facebook" value="<?php echo esc_attr( get_the_author_meta( 'user_facebook', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description">A facebook profilod linkje.</span>
			</td>
		</tr>
        		<tr>
			<th><label for="user_skype">Skype</label></th>

			<td>
<input type="text" name="user_skype" id="user_skype" value="<?php echo esc_attr( get_the_author_meta( 'user_skype', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description">Skype elérésed.</span>
			</td>
		</tr>
                		<tr>
			<th><label for="user_birthdate">Születés Dátuma</label></th>

			<td>
<input type="text" name="user_birthdate" id="user_birthdate" value="<?php echo esc_attr( get_the_author_meta( 'user_birthdate', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description">Amikor születtél.</span>
			</td>
		</tr>
        		<tr>
			<th><label for="user_publikcv">Nyilvános CV</label></th>

			<td>
				<input type="checkbox" name="user_publikcv" id="user_publikcv" value="1" class="regular-text" <?php if(esc_attr( get_the_author_meta( 'user_publikcv', $user->ID ) )=="1"){echo "checked";} ?>/><br />
				<span class="description">Ha elérhetővé szeretnéd tenni az önéletrajzod.</span>
			</td>
		</tr>
	</table>
<?php }?>
<?php


add_action( 'show_user_profile', 'my_show_tamara_fields' );
add_action( 'edit_user_profile', 'my_show_tamara_fields' );

function my_show_tamara_fields( $user ) { ?>

	<h3>Tapasztalat adatok</h3>

	<table class="form-table">

		<tr>
			<th><label for="user_edu">Education</label></th>

			<td>
				<input type="text" name="user_edu" id="user_edu" value="<?php echo esc_attr( get_the_author_meta( 'user_edu', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description">Oktatási tömb.</span>
			</td>
		</tr>
        <tr>
			<th><label for="user_work">Tapasztalat</label></th>

			<td>
				<input type="text" name="user_work" id="user_work" value="<?php echo esc_attr( get_the_author_meta( 'user_work', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description">Munka tömb.</span>
			</td>
		</tr>
                <tr>
			<th><label for="user_image">Kép</label></th>

			<td>
				<input type="text" name="user_picture" id="user_picture" value="<?php echo esc_attr( get_the_author_meta( 'user_picture', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description">Kép linkje.</span>
			</td>
		</tr>
                <tr>
			<th><label for="user_pdf">PDF</label></th>

			<td>
				<input type="text" name="user_pdf" id="user_pdf" value="<?php echo esc_attr( get_the_author_meta( 'user_pdf', $user->ID ) ); ?>" class="regular-text" /><br />
				<span class="description">PDF Link</span>
			</td>
		</tr>
	</table>
<?php }?>
<?php



add_action( 'personal_options_update', 'my_save_extra_profile_fields' );
add_action( 'edit_user_profile_update', 'my_save_extra_profile_fields' );

function my_save_extra_profile_fields( $user_id ) {

	if ( !current_user_can( 'edit_user', $user_id ) )
		return false;

	/* Copy and paste this line for additional fields. Make sure to change 'twitter' to the field ID. */
	update_usermeta( $user_id, 'user_city', $_POST['user_city'] );
	update_usermeta( $user_id, 'user_phone', $_POST['user_phone'] );
	update_usermeta( $user_id, 'user_jobs', $_POST['user_jobs'] );
	update_usermeta( $user_id, 'user_events', $_POST['user_events'] );
	update_usermeta( $user_id, 'user_news', $_POST['user_news'] );
}


add_action( 'personal_options_update', 'my_save_cv_fields' );
add_action( 'edit_user_profile_update', 'my_save_cv_fields' );

function my_save_cv_fields( $user_id ) {

	if ( !current_user_can( 'edit_user', $user_id ) )
		return false;

	/* Copy and paste this line for additional fields. Make sure to change 'twitter' to the field ID. */
	update_usermeta( $user_id, 'user_linkedin', $_POST['user_linkedin'] );
	update_usermeta( $user_id, 'user_facebook', $_POST['user_facebook'] );
	update_usermeta( $user_id, 'user_skype', $_POST['user_skype'] );
	update_usermeta( $user_id, 'user_publikcv', $_POST['user_publikcv'] );
	update_usermeta( $user_id, 'user_birthdate', $_POST['user_birthdate'] );
}

add_action( 'personal_options_update', 'my_save_tamara_fields' );
add_action( 'edit_user_profile_update', 'my_save_tamara_fields' );

function my_save_tamara_fields( $user_id ) {

	if ( !current_user_can( 'edit_user', $user_id ) )
		return false;

	/* Copy and paste this line for additional fields. Make sure to change 'twitter' to the field ID. */
	update_usermeta( $user_id, 'user_picture', $_POST['user_picture'] );
	update_usermeta( $user_id, 'user_pdf', $_POST['user_pdf'] );
	update_usermeta( $user_id, 'user_edu', $_POST['user_edu'] );
	update_usermeta( $user_id, 'user_work', $_POST['user_work'] );
	update_usermeta( $user_id, 'user_lang', $_POST['user_lang'] );
}

function wp_delete_user2( $id, $reassign = 'novalue' ) {
        global $wpdb;

        $id = (int) $id;
        $user = new WP_User( $id );

        if ( !$user->exists() )
                return false;

        // allow for transaction statement
        do_action('delete_user', $id);

        if ( 'novalue' === $reassign || null === $reassign ) {
                $post_types_to_delete = array();
                foreach ( get_post_types( array(), 'objects' ) as $post_type ) {
                        if ( $post_type->delete_with_user ) {
                                $post_types_to_delete[] = $post_type->name;
                        } elseif ( null === $post_type->delete_with_user && post_type_supports( $post_type->name, 'author' ) ) {
                                $post_types_to_delete[] = $post_type->name;
                        }
                }

                $post_types_to_delete = apply_filters( 'post_types_to_delete_with_user', $post_types_to_delete, $id );
                $post_types_to_delete = implode( "', '", $post_types_to_delete );
                $post_ids = $wpdb->get_col( $wpdb->prepare( "SELECT ID FROM $wpdb->posts WHERE post_author = %d AND post_type IN ('$post_types_to_delete')", $id ) );
                if ( $post_ids ) {
                        foreach ( $post_ids as $post_id )
                                wp_delete_post( $post_id );
                }

                // Clean links
                $link_ids = $wpdb->get_col( $wpdb->prepare("SELECT link_id FROM $wpdb->links WHERE link_owner = %d", $id) );

                if ( $link_ids ) {
                        foreach ( $link_ids as $link_id )
                                wp_delete_link($link_id);
                }
        } else {
                $reassign = (int) $reassign;
                $post_ids = $wpdb->get_col( $wpdb->prepare( "SELECT ID FROM $wpdb->posts WHERE post_author = %d", $id ) );
                $wpdb->update( $wpdb->posts, array('post_author' => $reassign), array('post_author' => $id) );
                if ( ! empty( $post_ids ) ) {
                        foreach ( $post_ids as $post_id )
                                clean_post_cache( $post_id );
                }
                $link_ids = $wpdb->get_col( $wpdb->prepare("SELECT link_id FROM $wpdb->links WHERE link_owner = %d", $id) );
                $wpdb->update( $wpdb->links, array('link_owner' => $reassign), array('link_owner' => $id) );
                if ( ! empty( $link_ids ) ) {
                        foreach ( $link_ids as $link_id )
                                clean_bookmark_cache( $link_id );
                }
        }

        // FINALLY, delete user
        if ( is_multisite() ) {
                remove_user_from_blog( $id, get_current_blog_id() );
        } else {
                $meta = $wpdb->get_col( $wpdb->prepare( "SELECT umeta_id FROM $wpdb->usermeta WHERE user_id = %d", $id ) );
                foreach ( $meta as $mid )
                        delete_metadata_by_mid( 'user', $mid );

                $wpdb->delete( $wpdb->users, array( 'ID' => $id ) );
        }

        clean_user_cache( $user );

        // allow for commit transaction
        do_action('deleted_user', $id);

        return true;
}




function GetPercentCv(){
	$percent=100;
	$user_info = get_userdata(get_current_user_id()); 
	if($user_info->user_login !=""){$mertek++;}
	if($user_info->user_email !=""){$mertek++;}
	if($user_info->user_pass !=""){$mertek++;}
	if($user_info->user_picture !=""){$mertek++;}
	if($user_info->user_pdf !=""){$mertek++;}
	if($user_info->user_edu !=""){$mertek++;}
	if($user_info->user_jobs !=""){$mertek++;}
	if($user_info->user_lang !=""){$mertek++;}
	if($user_info->user_nicename !=""){$mertek++;}
	if($user_info->user_phone !=""){$mertek++;}
	if($user_info->user_city !=""){$mertek++;}
	if($user_info->user_events !=""){$mertek++;}
	if($user_info->user_news !=""){$mertek++;}
	if($user_info->user_work !=""){$mertek++;}
	if($user_info->user_lastname !=""){$mertek++;}
	if($user_info->user_firstname !=""){$mertek++;}
	if($user_info->user_birthday !=""){$mertek++;}
	if($user_info->user_facebook !=""){$mertek++;}
	if($user_info->user_linkedin !=""){$mertek++;}
	if($user_info->user_skype !=""){$mertek++;}
	if($user_info->user_publikcv !=""){$mertek++;}
	return $mertek*5;}


function GetShowVar($cold,$place){
	switch($place){
		case "pidhu": $cold=$cold/10/10/10%10;break;
		case "secuhu":$cold=$cold/10/10%10; break;
		case "eramhu":$cold=$cold/10%10; break;
		case "ithu":$cold=$cold%10; break;
		}
	
	return $cold;}


function user_profile_error($str_error){
	echo '<div id="user_profile_error">';
	echo '<h2>Sajnos hiba történt</h2>';
	echo '<p>'.$str_error.'</p>';
	echo '</div>';
	}




function cleantohtml($s){
		// Restores the added slashes (ie.: " I\'m John " for security in output, and escapes them in htmlentities(ie.:  &quot; etc.)
		// It preserves any <html> tags in that they are encoded aswell (like &lt;html&gt;)
		// As an extra security, if people would try to inject tags that would become tags after stripping away bad characters,
		// we do still strip tags but only after htmlentities, so any genuine code examples will stay
		// Use: For input fields that may contain html, like a textarea
		return strip_tags(htmlentities(trim(stripslashes($s))));
}


function Banner($id){
	$connect=SqlFrameWork();
		$result = mysqli_query($connect,"SELECT * FROM ads WHERE ID=".$id."");
while($row = mysqli_fetch_array($result)){
	echo '<style>#banner{width:1200px; margin:0px auto 0px auto; padding:0px; height:150px; no-repeat; text-align:center; font-size:20px; z-index:-9999; overflow:hidden;}
#banner img{z-index:-9999; margin:0px auto 0px auto; float:none; position:relative;}
</style>
<div id="banner">'.$row['ad_blob'].'</div>';
}
	}
	
function bartag_func( $atts ) {
	extract( shortcode_atts( array('id' => '1',), $atts ) );
	$connect=SqlFrameWork();
		$result = mysqli_query($connect,"SELECT * FROM ads WHERE ID=".$id." AND ad_active=1 ");
while($row = mysqli_fetch_array($result)){
	$mark ='<style>#ad{width:800px; margin:15px; text-align:center;float:none;}
#ad img{float:none !important;}
</style>
<p><div id="ad">'.$row['ad_blob'].'</div></p>';
}
return $mark;
}
add_shortcode( 'ads', 'bartag_func' );


function urlencodeunicode($text) {  
   $unicodechars=array(  
    "u0151",   // ő  
    "u0150",   // Ő  
    "u0171",   // ű  
    "u0170",   // Ű  
    "u00e1",   // á  
    "u00c1",   // Á  
   );  
   $chars=array(  
    "ő",  
    "Ő",  
    "ű",  
    "Ű",  
    "á",  
    "Á",  
   );  
   $text=str_replace($unicodechars,$chars,$text);  
  return($text);  
}  


/** Step 2 (from text above). */
add_action( 'admin_menu', 'my_plugin_menu' );

/** Step 1. */
function my_plugin_menu() {
	add_menu_page( 'Reklámok', 'Reklámok', 'manage_options', 'reklamok', 'my_plugin_options1' );
	add_menu_page( 'Rendezvények', 'Rendezvények', 'manage_options', 'rendezvenyek', 'my_plugin_options2' );
	add_menu_page( 'Állások', 'Állások', 'manage_options', 'allasok', 'my_plugin_options3' );
}

/** Step 3. */

function my_plugin_options1() {
	if ( !current_user_can( 'manage_options' ) )  {	wp_die( __( 'You do not have sufficient permissions to access this page.'));}
	reklamok();	
}

function my_plugin_options2() {
	if ( !current_user_can( 'manage_options' ) )  {	wp_die( __( 'You do not have sufficient permissions to access this page.'));}
rendezvenyek();
}

function my_plugin_options3() {
	if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
	}
	allasok();
}








function SqlFrameWork(){
	$connect=mysqli_connect('localhost','root','','framework');
 	if (mysqli_connect_errno()){echo "Failed to connect to MySQL: " . mysqli_connect_error();}
	return $connect;
	}




function GetExt($name)
	{
	$ext=explode(".", $name);
	$ext=$ext[sizeof($ext)-1];
	$ext=strtolower($ext);
	return $ext;
	}
?>