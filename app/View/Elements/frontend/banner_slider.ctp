


<section>
   <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <?php
        $indicator = '';
        $count = 0;
        $status = 'active'; 
        if(!empty($hometopslider['SliderContent'])):
            $status = 'active'; 
        foreach($hometopslider['SliderContent'] as $val):
            ?>
        <div class="item <?php echo $status; ?>">
            <?php echo $this -> Html -> image($val['image'], array('class' => 'img-responsive','style'=>'')); ?>
            <div class="carousel-caption section-sm-top-262 section-sm-bottom-210">
                <div class="range">
                    <div class="cell-md-8 text-left inset-md-right-22">
                        <h1 class="text-white text-bold text-uppercase inset-md-left-70">
                          <?php echo $val['caption']; ?>         
                        </h1>
                    </div>
                </div>
            </div>     
        </div>
        <a class="left carousel-control " href="#myCarousel" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>  
        <?php
        $status = '';
        $count++;
        endforeach;
        endif;
        ?>  
    </div>
</div>
</section>
<style type="text/css">

.section-sm-bottom-210 {
    padding-bottom: 210px;
}
.carousel-caption {
 left: 10%;
 right: 20%;
}
@media (max-width:768px){
   .page-content{
      margin-top: 57px;
   }
   .section-sm-bottom-210{
      padding-bottom: 20px;
   }
   .text-white.text-bold.text-uppercase.inset-md-left-70 {
    color: #fff;
    font-size: 14px;
   }
}
</style>