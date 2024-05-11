<div class="container m-t-2">
    <div class="row">   
        <div class="col-md-12 min_height_fixed">
              <?php if(!empty($datas)){ ?>
                <div class="search" style="font-weight:bold;font-size:14px">Search Match For: <span style="font-weight:bold;font-size:16px;color:green"><?Php  echo $search_match['Search']['search']; ?></span> are given Bellow: </div>
                  <br/>
                 <?php echo $this->element('frontend/right_side_product');?> 
                <?php } else{?>
                  <div class="search">Search For: <span style="font-weight:bold;font-size:14px"><?Php  echo $search_match['Search']['search']; ?></span> Not Found !</div> 

                  <?php }?>
                  
        </div>
    </div>
</div>