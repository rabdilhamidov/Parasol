<!DOCTYPE html>
<html>
  <head>
    <title><?php bloginfo( 'description' ); ?></title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <meta name="keywords" content="" />
    <meta name="description" content="<?php bloginfo( 'description' ); ?>" />

    <!--[if lt IE 8]>
    <div style='clear: both; text-align:center; background-color: #fff; position: absolute; width: 100%; height: 4000px; z-index: 9999' >
      <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie" style="padding-top:40px;">
        <br>Вы используете сильно устаревший браузер. Наш сайт в нем не поддерживается.<br>
        You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today.
      </a>
    </div>
    <![endif]-->    
    <!--[if lt IE 9]>
      <script src="<?php bloginfo('template_url');?>/vendor/html5.js" type="text/javascript"></script>
      <link rel="stylesheet" href="<?php bloginfo('template_url');?>/css/ie.css" type="text/css" media="screen, projection">
    <![endif]-->    

    <link rel="stylesheet" href="<?php bloginfo('template_url');?>/css/style.css" type="text/css" media="screen, projection">
    <script type="text/javascript" src="<?php bloginfo('template_url');?>/vendor/jquery.min.js"></script>
    <script src="<?php bloginfo('template_url');?>/vendor/jquery.color.min.js"></script>      
    <script src="<?php bloginfo('template_url');?>/vendor/jquery.bxslider.min.js"></script>
    <script src="<?php bloginfo('template_url');?>/vendor/baron.min.js"></script>    
    <script type="text/javascript" src="<?php bloginfo('template_url');?>/js/main_ra.js"></script>
</head>

<body>
  <div id="page" class="site hfeed">
    
    <header id="masthead" class="site-header" role="banner">
      <div class="content-block">
        <a class="home-link" href="http://parasol.local/" title="Parasol" rel="home">
          <h1 class="site-title"></h1>
        </a>
        <nav id="site-navigation" class="navigation main-navigation" role="navigation">
          <a href="#" id="where-buy" class="menu-item">Где купить <br><span>044·290·911·1</span></a>
          <a href="#" id="all-ukraine" class="menu-item">Вся&nbsp;Украина</a>
          <a href="#" id="how-works" class="menu-item">Работаем&nbsp;24/7</a>
          <a href="#" id="callback" class="menu-item red-button">Купить</a>
        </nav>
      </div>
    </header> <!-- #masthead -->

    <div id="main" class="site-main">

      <?php 
        //'slider' post
        $slides = get_posts(array(
          'category_name'        => 'slider',
          'orderby'         => 'name',
          'order'           => 'ASC',
          'post_status'     => 'publish'
        ));
      ?> 
      <section id="slider">
        <div class="red200grn">
          <img src="<?php bloginfo('template_url');?>/images/200grn.png">
        </div>
        <ul class="bxslider">
          <?php 
          foreach($slides as $post): setup_postdata($post);
          ?>
          <li>
            <div class="slogan">
              <h2>
                <?php echo the_content(); ?>
              </h2>
              <?php edit_post_link( __( 'Edit')); ?>
            </div>            
            <div class="slide">
              <div class="img-cont">
                <?php 
                $img_id = get_post_thumbnail_id( $post->ID );
                $ar_img = wp_get_attachment_image_src($img_id, 'large');
                ?>
                <img src="<?php echo $ar_img[0]; ?>" alt="">
              </div>
            </div>
          </li>
          <?
          endforeach;
          wp_reset_postdata();
          ?>
        </ul>
        <div class="controls">
          <a href="#" class="prev"></a>
          <a href="#" class="next"></a>
        </div>  
      </section>
      
      <section id="buy-card" class="type-1 dark">
        <div class="title">
          <h2>Вы можете купить карту уже сейчас</h2>
        </div>
        <div class="content-block">
          <img src="<?php bloginfo('template_url');?>/images/parasol-card.png" alt="" />
          <p class="price">Стоимость карты <span>200</span> грн</p>
          <p class="rules">
            <input id="rules" type="checkbox" name="rules" value="y">
            <label for="rules" class="checkbox">с правилами предоставления услуг ознакомлен</label>
          </p>       
          <a href="#" id="buy-card" class="red-button">Купить</a>
        </div>
      </section>
      
      <?php $post = get_post_slug('tasks'); setup_postdata($post);?>
      <section id="tasks" class="type-2">
        <div class="red200grn"><img src="<?php bloginfo('template_url');?>/images/200grn.png"></div> 
        <div class="title">
          <h2>Мы решим Ваши задачи</h2>
          <div class="triangle"></div>
        </div>
        <div class="content-block">
          <table>
            <tr>
              <td>
                <div class="photo"><img src="<?php echo get("tasks_photo", 1, 1); ?>" alt=""></div>
                <div class="text"><?php echo get("tasks_text", 1, 1); ?></div>
              </td>
              <td>
                <div class="photo"><img src="<?php echo get("tasks_photo", 1, 2); ?>" alt=""></div>
                <div class="text"><?php echo get("tasks_text", 1, 2); ?></div>            
              </td>              
            </tr>
            <tr>
              <td>
                <div class="text t-right"><?php echo get("tasks_text", 1, 3); ?></div>              
                <div class="photo"><img src="<?php echo get("tasks_photo", 1, 3); ?>" alt=""></div>
              </td>
              <td>
                <div class="text t-right"><?php echo get("tasks_text", 1, 4); ?></div>              
                <div class="photo"><img src="<?php echo get("tasks_photo", 1, 4); ?>" alt=""></div>
              </td>              
            </tr>            
          </table>
          <?php edit_post_link( __( 'Edit')); ?>
        </div>
      </section>  

      <?php $post = get_post_slug('trust'); setup_postdata($post);?>
      <section id="trust" class="type-1 light">
        <div class="title">
          <h2><?php the_title(); ?></h2>
        </div>
        <div class="content-block">
          <ul>
            <li><?php echo get("trust_1"); ?></li>
            <li><?php echo get("trust_2"); ?></li>
            <li><?php echo get("trust_3"); ?></li>
            <li><?php echo get("trust_4"); ?></li>                                    
          </ul>
          <?php edit_post_link( __( 'Edit')); ?>
        </div>
      </section> 

      <?php $post = get_post_slug('how-it-works'); setup_postdata($post);?>
      <section id="how-works" class="type-1 dark">
        <div class="red200grn"><img src="<?php bloginfo('template_url');?>/images/200grn.png"></div>        
        <div class="title">
          <h2><?php the_title();?></h2>
          <p><?php the_content();?></p>
        </div>
        <div class="content-block">
          <img src="<?php bloginfo('template_url');?>/images/how-works.png" alt="" />
          <ul>
            <li>
              <p class="number">1</p>
              <p class="text"><?php echo get("howitworks_1"); ?>
              </p> 
            </li>
            <li>
              <p class="number">2</p>
              <p class="text"><?php echo get("howitworks_2"); ?></p>
            </li>
            <li>
              <p class="number">3</p>
              <p class="text"><?php echo get("howitworks_3"); ?></p>
            </li>                        
          </ul>
          <?php edit_post_link( __( 'Edit')); ?>
        </div>
      </section>

      <?php 
      $post = get_post_slug('questions'); setup_postdata($post);
      $content = get_the_content();
      $ar_questions = explode("\r\n", $content);
      ?>
      <section id="questions">
        <div class="title">
          <h2><?php the_title();?></h2>
          <div class="triangle"></div>
        </div>
        <div class="content-block">
          <ul>
            <?php 
            $cols = 5; 
            $col_number = 0;
            foreach ($ar_questions as $key => $question): 
              if ($col_number < $cols){
                $col_number++;
              }else{
                $col_number = 1;
              }
            ?>
              <li class="col-<?php echo $col_number; ?>"><p><?php echo $question; ?></p></li>
            <?php endforeach ?>
          </ul>
          <?php edit_post_link( __( 'Edit')); ?>
        </div>
      </section> 

      <?php $post = get_post_slug('differents'); setup_postdata($post);?>
      <section id="differents" class="type-1 dark">
        <div class="red200grn"><img src="<?php bloginfo('template_url');?>/images/200grn.png"></div>        
        <div class="title">
          <h2><?php the_title();?></h2>
        </div>
        <div class="content-block">
          <div class="text t-shadow">
            <?php echo the_content(); ?> 
          </div> 
          <?php edit_post_link( __( 'Edit')); ?>      
        </div>
      </section>

      <?php $post = get_post_slug('contacts'); setup_postdata($post);?>
      <section id="contacts" class="contacts">
        <div class="content-block">
          <div class="phone">
            <a href="#" class="where-buy"></a>
            <?php echo the_content(); ?>
          </div> 
          <ul class="buttons">
            <li>
              <a href="#" id="callback" class="button red">Обратная связь</a>
            </li>
            <li>  
              <div class="rules-popup box-shadow">


                <div class="text-container wrapper_1">
                    <div class="scroller">
                        <div class="container">
                          <?php readfile ( get_bloginfo('template_url')."/rules.html"); ?>
                        </div>
                    </div>
                    <div class="scroller__bar-wrapper">
                        <div class="scroller__bar"></div>
                    </div>
                </div>


                <div class="overtext"></div>
                <div class="control">
                  <a href="#" class="x-close"></a>
                </div>   
                <div class="triangle"></div>          
              </div>
              <a href="#" id="rules" class="button black">Правила<br>предоставления услуг</a>
            </li>
            <li><a href="#" id="passport911" class="button grey">Паспорт 911</a></li>
            <li><a href="#" id="buy" class="button red">Купить</a></li>
          </ul>
          <ul class="logos">
            <li><a href="#"><img src="<?php bloginfo('template_url');?>/images/contacts-parasol-logo.png"></a></li>
            <li><a href="#"><img src="<?php bloginfo('template_url');?>/images/contacts-hkc-logo.png"></a></li>
          </ul>
          <a href ="#" class="top-arr"></a>
          <?php edit_post_link( __( 'Edit')); ?>
        </div>
      </section> 

      <footer class="site-footer">
        <p class="copyright">© PARASOL Social Project. 2014</p>
      </footer>

    </div><!-- #main -->
      <!-- <div class="push"></div> -->  
  </div><!-- #page -->

  <!-- Contact Form 7 Popup-->
  <?php $post = get_post_slug('callback'); setup_postdata($post); ?>
  <!-- <div class="overlay"></div> -->
  <div class="callback-popup" style="display: <?php echo ($_POST[_wpcf7] == 150) ? block : none; ?>"> <!-- 150 - id формы -->
    <div class="container">
      <?php the_content(); ?>
    </div>          
    <div class="control">
      <a href="#" class="x-close"></a>
    </div> 
  </div> 

  <script type="text/javascript">
  (function(){
    land_handler();
  }());
  </script>

</body>
</html>
