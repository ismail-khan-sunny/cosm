<div class="wrapper modal-contents details_allpage">
    <div class="container content">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="eee">
            </style>
               
                <?php 

                if(!empty($category_parent)){
                  $this->Html->addCrumb($category_parent['Category']['title']);
                }
                $this->Html->addCrumb($product['Category']['title'], array('controller' => 'pages', 'action' => 'product',$product['Category']['slug'])); 
                $this->Html->addCrumb($product['Product']['slug']); 
                ?>
                <div class="deatil_content">
                    <?php echo $this->element('frontend/product_image');?>
                    <?php echo $this->element('frontend/product_details');?>
                </div>  
             </div>
        </div>
    </div>
</div>