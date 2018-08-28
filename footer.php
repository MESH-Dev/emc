

<footer class="site-footer">
   <div class="nav-row">
      <div class="container">
         <div class="row">
            <div class="columns-10">
               <nav class="footer-nav">
                  <ul>
                     <?php if(has_nav_menu('footer_nav')){
                                    $defaults = array(
                                       'theme_location'  => 'footer_nav',
                                       'menu'            => 'footer_nav',
                                       'container'       => false,
                                       'container_class' => '',
                                       'container_id'    => '',
                                       'menu_class'      => 'menu',
                                       'menu_id'         => '',
                                       'echo'            => true,
                                       'fallback_cb'     => 'wp_page_menu',
                                       'before'          => '',
                                       'after'           => '',
                                       'link_before'     => '',
                                       'link_after'      => '',
                                       'items_wrap'      => '%3$s',
                                       'depth'           => 0,
                                       'walker'          => ''
                                    ); wp_nav_menu( $defaults );
                                 }else{
                                    echo "<p><em>main_nav</em> doesn't exist! Create it and it'll render here.</p>";
                                 } ?>
                     <li>
                     <a class="newsletter" href="">Sign Up For Our Newsletter!</a>
                     </li>
                  </ul>
               </nav>
            </div>
            <div class="columns-2">
               <div class="search-field">
                  <input class="" type="text" name="search" value="">
                  <a class="submit" href="#">
                     <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                         viewBox="0 0 100 100" style="enable-background:new 0 0 100 100;" xml:space="preserve">
                        <style type="text/css">
                           .st9{fill:#70594C;}
                        </style>
                        <polygon class="st9" points="71.9,50.7 71.9,50.7 65.6,44.4 65.6,44.4 34.1,12.9 28.3,18.8 59.7,50.2 28.1,81.8 34.4,88.2
                           39.3,83.3 66,56.5 71.9,50.7 "/>
                     </svg>
                  </a>
               </div>
               <svg id="search" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
               	 viewBox="0 0 100 100" style="enable-background:new 0 0 100 100;" xml:space="preserve">
                  <style type="text/css">
                  	.st0{fill:#EED9BD;}
                  	.st1{fill:#EC742E;}
                  	.st2{fill:none;}
                  	.st3{fill:#B46C4E;}
                  </style>
                  <path class="st3" d="M82.8,76.9L82.8,76.9L64.1,58.2C68.4,53,71,46.4,71,39.1C71,22.6,57.6,9.2,41.1,9.2S11.2,22.6,11.2,39.1
                  	S24.6,69,41.1,69c6.2,0,12.1-1.9,16.9-5.2l19,19l0,0l6.3,6.3l5.9-5.9l0,0L82.8,76.9z M18.3,39.1c0-12.5,10.2-22.7,22.7-22.7
                  	s22.7,10.2,22.7,22.7S53.6,61.8,41.1,61.8S18.3,51.6,18.3,39.1z"/>
               </svg>
            </div>
         </div>
      </div>
   </div>
   <div class="copy-row">
      <div class="container">
   		<div class="row">
            <div class="socials">
               <a href="#"><i class="fab fa-twitter"></i></a>
               <a href="#"><i class="fab fa-instagram"></i></a>
               <a href="#"><i class="fab fa-facebook"></i></a>
               <a href="#"><i class="fab fa-youtube"></i></a>
            </div>
            <p class="copy">&#169; Every Mother Counts 2018</p>
   				<!-- <nav class="main-navigation">
   					<//?php wp_nav_menu( array('menu_id' => 'footer-menu', 'theme_location' => 'footer-menu') ); ?>
   				</nav> -->
   			<p class="byline">Site by <a href="http://meshfresh.com" target="_blank">MESH</a></p>
   		</div>
   	</div>
   </div>

</footer><!-- End of Footer -->

<?php wp_footer(); ?>

</body>
</html>
