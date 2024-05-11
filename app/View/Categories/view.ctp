<main class="page-content">
  <div class="shell section-80 section-md-0">
    <div class="range section-md-top-78 section-md-bottom-35">
      <div class="col-md-12 col-sm-12 col-xs-12" style="margin-bottom: 20px; padding-left: 30px;">
        <h3 class="text-primary" style="border-bottom: 1px groove ! important; padding-top: 8px;">
          <?php
          if($this->params['controller']=='categories' & $this->params['action']=='view'){
            $active_menu = $this->Custom->getCustomFunctionSlug('producrgroup');
          }
          echo $active_menu; ?></h3>
        </div>
        <div class="clearfix"></div>
        <div class="col-md-12 col-sm-12 col-xs-12">
          <?php echo $this->element('frontend/right_menu'); ?>
          <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
            <?php 
            if(!empty($datas)):
              $i=0; 
            foreach($datas as $key=>$value):
              $offset="";
            if(!($i==0)){
              $offset="offset"; 
            }
            ?>                       
            <div class="row <?php echo $offset;?>">
              <?php foreach($value['Item'] as $key1=>$value1):?>
                <?php  $image = $this->Custom->validImage($value1['Product']['image'],'other'); ?>
                <div class="col-md-4 col-sm-12 col-xs-12">
                  <div class="box2">
                    <a href="<?php echo $this->base.'/Products/view/'.$value1['Product']['id'].'/'.$value1['Product']['category_id'];?>" >
                      <?php echo $this->Html->image($image,array('class'=>'img-responsive','style'=>'width:270px;height:211px','alt'=>$value1['Product']['title'])); ?>
                    </a>
                    <div class="box2_cnt">
                      <h5 class="strong">
                        <?php echo String::truncate(strip_tags($value1['Product']['title']),30,array('ellipsis' => ' ...','exact' => false,'html'=>false)); ?>
                      </h5>

                      <p class="big">
                        <?php echo String::truncate(strip_tags($value1['Product']['description']),110,array('ellipsis' => ' ...','exact' => false,'html'=>false)); ?>  
                      </p>
                      <a href="<?php echo $this->base.'/Products/view/'.$value1['Product']['id'].'/'.$value1['Product']['category_id'];?>" class="link pull-right link--effect-12">read more</a>
                    </div>
                  </div>
                </div>
              <?php endforeach; ?>   
            </div><!--row ends-->
            <?php $i++; endforeach; ?>  
          <?php else: ?>
            <h3 class="text-primary" style="color:red;padding-top: 8px;">There is No Directory Found</h3>
          <?php endif; ?>
          <?php if($this->Paginator->counter('{:pages}') > 1) : ?>
            <div class="panel-footer">
              <div class="row">
                <span class="col-md-5"> 
                  <?php echo $this->Paginator->counter('page {:page} of pages {:pages}');?>
                </span>
                <span class="col-md-7 text-right">
                  <ul class="pagination">
                    <?php
                    echo $this->Paginator->prev('&laquo;', array('tag'=>'li','escape'=>false,'class' => 'ajax_page'), null, array('class' => 'disabled','tag'=>'li','disabledTag'=>'a','escape'=>false));
                    echo $this->Paginator->numbers(array('separator' => '','tag'=>'li','currentTag'=>'a','currentClass'=>'active','class' => 'ajax_page'));
                    echo $this->Paginator->next('&raquo;', array('tag'=>'li','escape'=>false,'class' => 'ajax_page'), null, array('class' => 'disabled','tag'=>'li','escape'=>false,'disabledTag'=>'a'));
                    ?>
                  </ul>
                </span>
              </div>
            </div>
          <?php endif; ?>
        </div><!--col-9 ends-->
      </div>
    </h3>
  </section>
</main>
<style type="text/css">
  .pagination {
    border-radius: 4px;
    display: inline-block;
    margin: 0px 0;
    padding-left: 0;
}
.pagination > li > a {
  background: #fafafa;
  color: #666;
  -webkit-box-shadow: inset 0px -2px 0px 0px rgba(0, 0, 0, 0.09);
  -moz-box-shadow: inset 0px -2px 0px 0px rgba(0, 0, 0, 0.09);
  box-shadow: inset 0px -1px 0px 0px rgba(0, 0, 0, 0.09);
}
.pagination > li:first-of-type a,
.pagination > li:last-of-type a {
  -webkit-border-radius: 0;
  -moz-border-radius: 0;
  border-radius: 0;
}
.pagination > li > a, .pagination > li > span {
    background-color: #fff;
    border: 1px solid #ddd;
    color: #076eba;
    float: left;
    line-height: 1.71429;
    margin-left: -1px;
    padding: 2px 10px;
    position: relative;
    text-decoration: none;
}
.panel-footer {
    background-color: #fff;
    border-top: 1px solid #ddd;
    padding: 10px 15px;
    margin-top: 20px;
}
</style>