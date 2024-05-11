<div class="title"><span>Products</span></div>
 <?php if(!empty($datas)):
     foreach ($datas as $highlighted_products):
  ?>
    <div class="row-shadow">
        <?php  
        
            $i=0;foreach ($highlighted_products['Item'] as $highlighted_product):
            $prouct_image='no-image.png';
            if(!empty($highlighted_product['ProductImage'][0]['image'])){
                $highlighted_product_image=$highlighted_product['ProductImage'][0]['image'];   
            }
            $image = $this->Custom->validImage($highlighted_product_image,'other');
        ?>
        <div class="col-sm-4 col-md-3 box-product-outer with-height">
            <div class="box-product">
                <div class="img-wrapper img-fixes">
                   <a href="<?php echo $this->Html->url(array('controller'=>'products','action'=>'details',$highlighted_product['Product']['slug'])) ?>">
                     <img class="lazyOwl" src="<?php echo $this->base.$image; ?>" alt="">
                </a>
                </div>
                <h6 class="text-center"><a href="<?php echo $this->Html->url(array('controller'=>'products','action'=>'details',$highlighted_product['Product']['slug'])) ?>"><?php echo $highlighted_product['Product']['title']; ?></a></h6>
                <h5 class="text-center"><?php if(!empty($highlighted_product['Product']['model'])){echo "Model: ".$highlighted_product['Product']['model'];} ?></h5>
            </div>
        </div>
        <?php $i++;endforeach; ?>

    </div>
 <?php endforeach; ?>
<?php else: ?>
    <div class="col-lg-12">
        There are no Products found
    </div>
<?php endif; ?>  