<main class="page-content">
  <div class="shell section-80 section-md-0">
    <div class="range section-md-top-78 section-md-bottom-35">
            <div class="col-md-12 col-sm-12 col-xs-12" style="margin-bottom:20px">
                <h3 class="text-primary" style="border-bottom: 1px groove ! important; padding-top: 8px;"><?php echo $product['Product']['title']; ?></h3>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12 center767 wow fadeInLeft">
                <?php  $image = $this->Custom->validImage($product['Product']['image'],'other'); ?>
                <div class="thumb">
                    <?php echo $this->Html->image($image,array('class'=>'img-responsive','style'=>'width:270px;height:211px','id'=>'myImg')); ?>
                    <span class="thumb_overlay"></span>
               </div>
            </div>
            <div id="myModal" class="modal">

              <!-- The Close Button -->
              <span class="close" onclick="document.getElementById('myModal').style.display='none'">&times;</span>

             
              <img class="modal-content" id="img01">
             
              <!-- Modal Caption (Image Text) -->
              <div id="caption"></div>
            </div>
            <div class="col-md-9 col-sm-6 col-xs-12 wow fadeInLeft">
              <?php echo $product['Product']['description'];?>
              
            </div>
        </div>
    </section>
</main>
<script type="text/javascript">
    // Get the modal
var modal = document.getElementById('myModal');

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById('myImg');
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img.onclick = function(){
    modal.style.display = "block";
    modalImg.src = this.src;
    captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}
</script>
<style type="text/css">
    #myImg {
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s;
}

#myImg:hover {opacity: 0.7;}

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (Image) */
.modal-content {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
}

/* Caption of Modal Image (Image Text) - Same Width as the Image */
#caption {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
    text-align: center;
    color: #ccc;
    padding: 10px 0;
    height: 150px;
}

/* Add Animation - Zoom in the Modal */
.modal-content, #caption {
    -webkit-animation-name: zoom;
    -webkit-animation-duration: 0.6s;
    animation-name: zoom;
    animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
    from {-webkit-transform:scale(0)}
    to {-webkit-transform:scale(1)}
}

@keyframes zoom {
    from {transform:scale(0)}
    to {transform:scale(1)}
}

/* The Close Button */
.close {
    position: absolute;
    top: 15px;
    right: 35px;
    color: #f1f1f1;
    font-size: 40px;
    font-weight: bold;
    transition: 0.3s;
}

.close:hover,
.close:focus {
    color: #bbb;
    text-decoration: none;
    cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
    .modal-content {
        width: 100%;
    }
}
</style>