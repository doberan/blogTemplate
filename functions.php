<?php
//レスポンシブなページネーションを作成する
function responsive_pagination($pages = '', $range = 4){
  $showitems = ($range * 2)+1;
 
  global $paged;
  if(empty($paged)) $paged = 1;
 
  //ページ情報の取得
  if($pages == '') {
    global $wp_query;
    $pages = $wp_query->max_num_pages;
    if(!$pages){
      $pages = 1;
    }
  }
 if ( (strpos($agent,'iPhone')!==false) || (strpos($agent,'Android')!==false) ) {
    $device = 'smart';
} else {
    $device = 'PC';
}
 
  if(1 != $pages) {
    echo '<ul class="pageNation clearfix" role="menubar" aria-label="Pagination">';
    //先頭へ
    echo '<li class="first"><a href="'.get_pagenum_link(1).'"><span>first</span></a></li>';
    //1つ戻る//Pagenation
function pagination($pages = '', $range = 2)
{
     $showitems = ($range * 2)+1;//表示するページ数（５ページを表示）

     global $paged;//現在のページ値
     if(empty($paged)) $paged = 1;//デフォルトのページ

     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;//全ページ数を取得
         if(!$pages)//全ページ数が空の場合は、１とする
         {
             $pages = 1;
         }
     }

     if(1 != $pages)//全ページが１でない場合はページネーションを表示する
     {
		 echo "<div class=\"pagenation\">\n";
		 echo "<ul>\n";
		 //Prev：現在のページ値が１より大きい場合は表示
         if($paged > 1) echo "<li class=\"prev\"><a href='".get_pagenum_link($paged - 1)."'>Prev</a></li>\n";

         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                //三項演算子での条件分岐
                echo ($paged == $i)? "<li class=\"active\">".$i."</li>\n":"<li><a href='".get_pagenum_link($i)."'>".$i."</a></li>\n";
             }
         }
		//Next：総ページ数より現在のページ値が小さい場合は表示
		if ($paged < $pages) echo "<li class=\"next\"><a href=\"".get_pagenum_link($paged + 1)."\">Next</a></li>\n";
		echo "</ul>\n";
		echo "</div>\n";
     }
}
    echo '<li class="first"><a href="'.get_pagenum_link($paged - 1).'"><span>prev</span></a></li>';
    //番号つきページ送りボタン
    
    // if ( $device == 'PC' && $requestedURL ==  $lacationSmt ) {
    //     for ($i=1; $i <= $pages; $i++)     {
    //         if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))       {
    //             echo ($paged == $i)? '<li class="current"><a>'.$i.'</a></li>':'<li><a href="'.get_pagenum_link($i).'" class="inactive" >'.$i.'</a></li>';
    //         }
    //     }
    // }
    //1つ進む
    echo '<li class="last"><a href="'.get_pagenum_link($paged + 1).'"><span>next</span></a></li>';
    //最後尾へ
    echo '<li class="last"><a href="'.get_pagenum_link($pages).'"><span>last</span></a></li>';
    echo '</ul>';
  }
}
 ?>
<?php
add_theme_support('post-thumbnails');


function most_viewed_posts() {
  ob_start(); // Buffer output
?>

  <?php
    // 以下のWP_Queryで表示回数上位５件の記事を取得
    $query = new WP_Query(array(
      'meta_key' => 'views',
      'orderby' => 'meta_value_num',
      'order' => 'DESC',
      'posts_per_page' => 10
    ));
    $x = 1;
    // 以下のwhileループで上記で取得した人気上位５件の記事をhtml含めて出力
    if(have_posts()): while ($query->have_posts()) : $query->the_post();
  ?>
                <dl>
                    <dt class="popular-rank"><?php echo $x; ?></dt>
                    <dd class="popular-image"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a></dd>  
                    <dd class="popular-title"><a href="<?php the_permalink(); ?>"><?php the_title();?></a></dd>
                </dl>
          <?php
          $x++;
    endwhile;endif;
          ?>

<?php
$output = ob_get_clean(); // clear buffer
return $output;
}
 
// most_viewd_posts()のショートコードを作成
add_shortcode('most_viewed', 'most_viewed_posts');
 
// ショートコードをテキストウィジェットで使用できるようにするためのフィルタ
add_filter('widget_text', 'do_shortcode');


function give_linked_images_class( $html, $id, $caption, $title, $align, $url, $size ) {
  $str_a = '<img src';
  if(strstr($html, $str_a)){
    $str_a_class = '<img class="media-image" src';
    $html = str_replace($str_a, $str_a_class, $html);
    $str_img = '" /></a>';
    $str_img_class = ' media-image" /></a>';
    $html = str_replace($str_img, $str_img_class, $html);
  }
return $html; 
} 
  
add_action( 'image_send_to_editor', 'give_linked_images_class', 10 ,8);

?>
