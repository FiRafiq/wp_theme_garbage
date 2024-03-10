<?php
get_header();
get_template_part("menu");
?>
<div class="container">
   <div class="row">
      <div class="col-8">
         <!-- left bar -->
         <?php
         if (have_posts()) :
            while (have_posts()) :
               the_post();
               global $post;

               global $authordata;
               /*  echo "<pre>"; 
var_dump($authordata);
echo "</pre>"; */
               //loop content (template tags, html, etc)
         ?>
               <h1><span class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></span></h1>
               <p><?php echo 'Author: ' . $authordata->display_name; ?> | <?php the_date()?> <?php the_time()?></p>
               <?php echo "<hr>";
               the_tags(); ?>
         <?php
               the_content();
            endwhile;
         endif;
// pagination
// Post Navigation Links
$prev_link = get_previous_posts_link( 'Previous ');
$next_link = get_next_posts_link( 'Next');

if ( $prev_link || $next_link ) : ?>
    <nav class="post-navigation">
        <div class="nav-links">
            <?php
            echo $prev_link;
            echo " | ";
            echo $next_link;
            ?>
        </div>
    </nav>
<?php endif;
// pagination end
         ?>
      </div>
      <!-- left bar -->
   
   <div class="col-4">
      <?php get_sidebar() ?>
   </div>
</div>
</div>

<pre>
<code>
<?php
/*  global $post; 
 print_r( $post ); */ //view all data stored in the $post arra
?>
   </code>
</pre>
<h1>you are using:</h1>
<?php
global $is_lynx, $is_edge, $is_gecko, $is_IE, $is_opera, $is_NS4, $is_safari, $is_chrome, $is_iphone;
if ($is_lynx) {
   echo "You are using Lynx";
} elseif ($is_gecko) {
   echo "You are using Firefox";
} elseif ($is_IE) {
} elseif ($is_edge) {
   echo "You are using Edge";
} elseif ($is_IE) {
   echo "You are using Internet Explorer";
} elseif ($is_opera) {
   echo "You are using Opera";
} elseif ($is_NS4) {
   echo "You are using Netscape";
} elseif ($is_safari) {
   echo "You are using Safari";
} elseif ($is_chrome) {
   echo "You are using Chrome";
} elseif ($is_iphone) {
   echo "You are using an iPhone";
}
echo "<hr>";
if (wp_is_mobile()) {
   echo "You are viewing this website on a mobile device";
} else {
   echo "You are not on a mobile device";
}
?>
<?php get_footer(); //will add footer.php
?>