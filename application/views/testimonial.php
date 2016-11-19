

        <section id="page-title">

            <div class="container clearfix">
                <h1 class="white-color">Testimonials</h1>
                
            </div>

        </section><!-- #page-title end -->

        <!-- Content
        ============================================= -->
        <section id="content" >

            <div class="content-wrap" style="padding:40px 0px;">

                <div class="container clearfix">
				<ul class="testimonials-grid clearfix">
				<?php foreach($get_testimonials as $val){

							?>
                        <li style="height: 147px;">
                            <div class="testimonial">
                              
                                 <div class="testi-content">
                                       <p><?php echo $val['description'];?></p>
                                        <div class="testi-meta">
                                            <?php echo $val['name'];?>
                                            <span><?php echo $val['location'];?></span>
                                        </div>
                                    </div>
                            </div>
                        </li>
                     <?php } ?>
                    </ul>
				
				</div>

            </div>

        </section><!-- #content end -->
