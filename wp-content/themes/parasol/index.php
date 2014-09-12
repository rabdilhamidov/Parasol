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
    <script src="<?php bloginfo('template_url');?>/vendor/jquery.liMarquee.js"></script>           
    <script type="text/javascript" src="<?php bloginfo('template_url');?>/js/main_ra.js"></script>
    <script type="text/javascript" src="<?php bloginfo('template_url');?>/js/order_form.js"></script>
    <link rel="shortcut icon" href="<?php bloginfo('template_url');?>/favicon.ico">
</head>

<body>
  <div id="page" class="site hfeed">
    
    <header id="masthead" class="site-header" role="banner">
      <div class="content-block">
        <a class="home-link" href="http://my-parasol.com/" title="Parasol" rel="home">
          <h1 class="site-title"></h1>
        </a>
        <?php $post = get_post_slug('contacts'); setup_postdata($post);?>
        <nav id="site-navigation" class="navigation main-navigation" role="navigation">
          <ul>
            <li id="where-buy" class="menu-item">Где купить <br>
                <?php the_content();?>
            </li>
            <li id="all-ukraine" class="menu-item">Вся&nbsp;Украина</li>
            <li id="how-works" class="menu-item">Работаем&nbsp;24/7</li>
            <li id="buy-card" class="menu-item"><a href="#" class="button red header buy-card">Купить</a></li>
          </ul>
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
          <?php
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
          <a href="#" id="buy-card" class="red-button buy-card">Купить</a>


          <!-- ================  Monexy ================== -->
          <?php
          $params = array();
          $params["myMonexyMerchantCurrency"] = "UAH";
          $params["myMonexyMerchantFailUrl"] = "http://911help.cards/?pay=fail";
          $params["myMonexyMerchantID"] = 104277569;
          $params["myMonexyMerchantOrderDesc"] = "Карта 911help";
          $params["myMonexyMerchantOrderId"] = rand(0, 9999);
          $params["myMonexyMerchantResultUrl"] = "http://911help.cards/?pay=result";
          $params["myMonexyMerchantShopName"] = "911help.cards";
          $params["myMonexyMerchantSuccessUrl"] = "http://911help.cards/?pay=success";
          $params["myMonexyMerchantSum"] = "200";
          $params["myMonexyMerchantExpTime"] = "168";

          ksort($params);
          $req_str = ''; // первоначальное значение строки данных для подписи
          foreach($params AS $pkey => $pval) $req_str.=($pkey.'='.$pval);
          $params["myMonexyMerchantHash"] = md5($req_str); 
          ?>

          <form id="payment " method="POST" action="https://www.monexy.ua/merchant/merchant.php">
              <input type="hidden" name="myMonexyMerchantCurrency" value="<?php echo $params["myMonexyMerchantCurrency"] ?>">
              <input type="hidden" name="myMonexyMerchantFailUrl" value="<?php echo $params["myMonexyMerchantFailUrl"] ?>">
              <input type="hidden" name="myMonexyMerchantID" value="<?php echo $params["myMonexyMerchantID"] ?>">
              <input type="hidden" name="myMonexyMerchantOrderDesc" value="<?php echo $params["myMonexyMerchantOrderDesc"] ?>">
              <input type="hidden" name="myMonexyMerchantOrderId" value="<?php echo $params["myMonexyMerchantOrderId"] ?>">
              <input type="hidden" name="myMonexyMerchantResultUrl" value="<?php echo $params["myMonexyMerchantResultUrl"] ?>">
              <input type="hidden" name="myMonexyMerchantShopName" value="<?php echo $params["myMonexyMerchantShopName"] ?>">
              <input type="hidden" name="myMonexyMerchantSuccessUrl" value="<?php echo $params["myMonexyMerchantSuccessUrl"] ?>">
              <input type="hidden" name="myMonexyMerchantSum" value="<?php echo $params["myMonexyMerchantSum"] ?>">
              <input type="hidden" name="myMonexyMerchantExpTime" value="<?php echo $params["myMonexyMerchantExpTime"] ?>">
              <input type="hidden" name="myMonexyMerchantHash" value="<?php echo $params["myMonexyMerchantHash"] ?>">
              <input type="submit" class="buy-card-online" value="Купить онлайн" />
          </form>
          <!-- ================  /Monexy ================== -->



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
          <div class="run-str-1 str_wrap">
            <ul>
              <?php 
              $cols = 5; 
              $col_number = 0;
              foreach ($ar_questions as $key => $question): 
              ?>
                <li class="col-<?php echo $col_number; ?>"><p><?php echo $question; ?></p></li>
              <?php endforeach ?>
            </ul>
          </div>
          <div class="run-str-2 str_wrap">
            <ul>
              <?php 
              $cols = 5; 
              $col_number = 0;
              foreach ($ar_questions as $key => $question): 
              ?>
                <li class="col-<?php echo $col_number; ?>"><p><?php echo $question; ?></p></li>
              <?php endforeach ?>
            </ul>
          </div>
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
            <a href="javascript: void(0);" class="where-buy"></a>
            <?php echo the_content(); ?>
          </div> 
          <ul class="buttons">
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
            <?php  
              $post = get_post_slug('pasport911');
              if($post->ID){
                $args = array(
                  'post_parent' => $post->ID, 
                  'post_type' => 'attachment',
                  'orderby' => 'date',
                  'order' => 'DESC',
                  'numberposts' => 1
                );
                $attachments = get_posts($args);
              }
            ?>
            <li><a href="<?php echo $attachments[0]->guid; ?>" id="passport911" class="button grey">Как это работает</a></li>
            <li><a href="#" id="buy" class="button red buy-card">Купить</a></li>
          </ul>
          <ul class="logos">
            <li><a href="http://my-parasol.com/"><img src="<?php bloginfo('template_url');?>/images/contacts-parasol-logo.png"></a></li>
            <li><a href="http://nks-service.com/"><img src="<?php bloginfo('template_url');?>/images/contacts-hkc-logo.png"></a></li>
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

  <!-- Тут будет форма заказа -->
  <div class="popup-order-form">
    <form name="order" id="order" action="" method="post">
      <div class="head-block">
        <div class="steps">
          <a href="#step-1" class="steps step-1 active">Шаг 1</a>
          <a href="#step-2" class="steps step-2">Шаг 2</a>
          <a href="#step-3" class="steps step-3">Шаг 3</a>
        </div>
        <div class="control">
          <a href="#" class="x-close"></a>
        </div> 
        <div class="form-content" id="step-1">
          <h3>Выберите способ доставки</h3>
          <span class="err">Нужно выбрать способ доставки</span>
          <div class="delivery">
            <input name="delivery" id="nova-poshta" type="radio" value="Доставка по Украине «Новая почта»">
            <label for="nova-poshta">Доставка по Украине</label>
            <p>
              <img src="<?php bloginfo('template_url');?>/images/nova-poshta.png">
              Оплата доставки согласно тарифам Новой Почты на момент получения
            </p>        
          </div>
          <div class="delivery">
            <input name="delivery" id="carrier" type="radio" value="Доставка курьером по Киеву">
            <label for="carrier">Доставка курьером по&nbsp;Киеву</label>
            <p>
              Оплата наличными на момент получения. <br>
              Стоимость доставки:<br>
              <strong>35</strong> грн - при заказе 1-ой карты<br>
              <strong>15-20</strong> грн - при оптовом заказе (свыше 10 карт)
            </p>      
          </div>        
          <div class="control">
            <a href="#step-2" class="steps step-2 button red">Далее</a>
          </div>
        </div>

        <div class="form-content" id="step-2">
          <h3>Контакты и адрес доставки:</h3>
          <ul class="col-1">
            <li>
              <label for="username">Имя <span class="err">Ошибка ввода</span></label> 
              <input name="username" id="username" type="text" placeholder="Имя" value="">
            </li>
            <li>
              <label for="email">E-Mail <span class="err">Ошибка ввода</span></label> 
              <input name="email" id="email" type="text" placeholder="E-Mail" value="">
            </li>
            <li>
              <label for="city">Город <span class="err">Ошибка ввода</span></label> 
              <input name="city" id="city" type="text" placeholder="Город" value="">
            </li>
            <li class="house">
              <label for="house">Дом <br><span class="err">Ошибка ввода</span></label> 
              <input name="house" id="house" type="text" placeholder="Дом" value="">
            </li>
            <li class="flat">
              <label for="flat">Квартира <br><span class="err">Ошибка ввода</span></label> 
              <input name="flat" id="flat" type="text" placeholder="Квартира" value="">
            </li>
          </ul>
          <ul class="col-2"> 
            <li>
              <label for="surname">Фамилия <span class="err">Ошибка ввода</span></label> 
              <input name="surname" id="surname" type="text" placeholder="Фамилия" value="">
            </li>            
            <li>
              <label for="phone">Телефон <span class="err">Ошибка ввода</span></label> 
              <input name="phone" id="phone" type="text" placeholder="Телефон" value="">
            </li>
            <li>
              <label for="street">Улица <span class="err">Ошибка ввода</span></label> 
              <input name="street" id="street" type="text" placeholder="Улица" value="">
            </li>
            <li>
              <div class="req-memo">Все поля обязательны для заполнения</div>
            </li>
          </ul>
          <div class="cfx"></div>
          <div class="control">
            <a href="#step-3" class="steps step-3 button red">Далее</a>
          </div>
        </div>

        <div class="form-content" id="step-3">
          <ul>
            <li>
              <label for="quantity">Кол-во карт:</label>
                <div class="drop-down" id="quantity">
                  <input name="quantity" type="text" placeholder="1" value="1">
                  <ul>
                    <?php for ($i=1; $i <= 20; $i++) :?>
                        <li><?php echo $i; ?></li>
                      <?php endfor; ?>
                  </ul>
                </div>             
            </li>
            <li>
              <label for="payment">Оплата:</label>
                <div class="drop-down" id="payment">
                  <input name="payment" type="text" placeholder="Онлайн (Monexy)" readonly="readonly" value="Онлайн (Monexy)">
                  <ul>
                    <li>Онлайн (Monexy)</li>
                    <li>Наличными курьеру</li>
                    <li title="Наличными в отделении Новой Почты">Наличными в отделении Новой Почты</li>
                  </ul>
                </div>             
            </li>
          </ul>
          <div class="summa"><strong>Сумма:</strong> 200 грн</div>
          <div class="delivery-memo">Доставка оплачивается отдельно от суммы заказа</div>
          <div class="control">
            <a href="#submit" class="steps submit button red">Подтвердить</a>
          </div>
        </div>
      </div> 
    </form>         
  </div>  

</body>
</html>
