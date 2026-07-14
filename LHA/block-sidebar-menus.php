<div class="widget">
<?php 
if(is_tree('85')) { $menu_id = 35; } // alcohol
elseif(is_tree('213')) { $menu_id = 39; }
elseif(is_tree('155')) { $menu_id = 53; }
elseif(is_tree('177')) { $menu_id = 40; } //Child Abuse 
elseif(is_page('courts')) { $menu_id = 62; } //Courts - Brown County 
elseif(is_page('courts')) { $menu_id = 63; } //Courts - Butler County 
elseif(is_page('courts')) { $menu_id = 65; } //Courts - Campbell County 
elseif(is_page('courts')) { $menu_id = 64; } //Courts - Clermont County 
elseif(is_page('courts')) { $menu_id = 66; } //Courts - Greene County 
elseif(is_page('courts')) { $menu_id = 67; } //Courts - Hamilton County 
elseif(is_page('courts')) { $menu_id = 68; } //Courts - Montgomery County 
elseif(is_page('courts')) { $menu_id = 69; } //Courts - Warren County 
elseif(is_tree('2483')) { $menu_id = 41; } //Criminal Defense 
elseif(is_tree('2382')) { $menu_id = 70; } //Disorderly Conduct 
elseif(is_tree('165')) { $menu_id = 42; } //Domestic Violence 
elseif(is_tree('97')) { $menu_id = 43; } //Drug Crimes 
elseif(is_tree('213')) { $menu_id = 44; } //DUI / OVI 
elseif(is_tree('57')) { $menu_id = 77; } //DUI/OVI Topics 
elseif(is_tree('213')) { $menu_id = 32; } //Footer Menu 
elseif(is_tree('121')) { $menu_id = 47; } //Fraud 
elseif(is_tree('2095')) { $menu_id = 48; } //Juvenile Crimes 
elseif(is_tree('223')) { $menu_id = 49; } //Kidnapping and Abduction 
elseif(is_tree('233')) { $menu_id = 50; } //Manslaughter 
elseif(is_page('20') || is_page('169') || is_page('2217') || is_tree('2217') || is_page('3499') ) { $menu_id = 34; } //Practice Areas 
elseif(is_tree('2392')) { $menu_id = 52; } //Public Nuisances 
elseif(is_tree('201')) { $menu_id = 54; } //Sex Crimes 
elseif(is_tree('2045')) { $menu_id = 71; } //Street Racing 
elseif(is_tree('121')) { $menu_id = 55; } //Theft and Fraud Crimes 
elseif(is_tree('191')) { $menu_id = 56; } //Traffic Violations 
elseif(is_tree('2756')) { $menu_id = 60; } //Violent Crimes 
elseif(is_tree('183')) { $menu_id = 57; } //Weapons Crimes 
elseif(is_tree('1851')) { $menu_id = 58; } //White Collar Crimes 

else { $menu_id = 34; } //Default to practice areas

$menu_object = wp_get_nav_menu_object( $menu_id );
if ( $menu_object ) { ?>
    <h5><?php echo $menu_object->name; ?></h5>
<?php } 

wp_nav_menu( array( 'menu' => $menu_id ) );

?>

</div>