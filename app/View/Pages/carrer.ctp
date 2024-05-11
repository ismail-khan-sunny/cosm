<style type="text/css">
    .elegant-aeroo {
        background: #d2e9ff none repeat scroll 0 0;
        color: #666;
        font: 15px Arial,Helvetica,sans-serif;
        margin-bottom: 40px;
        margin-left: auto;
        margin-right: auto;
        min-height: auto;
        padding: 20px;
        text-align: justify;
    }
    .margin-top{
        margin-top: 15px !important;
    }
    .margin-top-name{
        padding-left: 0px !important;padding-right: 5px !important;
    }
    .margin-top-names{
        padding-left: 0px !important;padding-right: 0px !important;
    }
    .width{height: 38px !important; font-size: 12px !important; padding-top: 5px !important; padding-bottom: 5px !important;}
    .pading-botton{padding-top: 5px; padding-bottom: 5px;}
</style>


<main class="page-content">
    <div class="shell section-80 section-md-0">
        <div class="range section-md-top-78 section-md-bottom-35">
             <div class="col-md-12 col-sm-12 col-xs-12" style="margin-bottom:20px">
                <h3 class="text-primary" style="border-bottom: 1px groove ! important; padding-top: 8px;">Career</h3>
            </div>
            <div class="clearfix"></div>

            <div class="col-md-6 col-sm-12 col-xs-12" style="padding-left: 0px;">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <h5><a href="#"><b><?php echo $career['Content']['title'];  ?></b></a></h3>
                        <?php echo $career['Content']['description'];  ?>
                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <?php  $image = $this->Custom->validImage($career['Content']['image'],'other'); ?>
                        <?php echo $this->Html->image($image,array('class'=>'img-add','alt'=>$career['Content']['title'])); ?>
                    </div>
                </div>                
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <?php                                         
                    echo $this->Session->flash();
                    echo $this->Form->create('Career',array('class'=>'form-horizontal','role'=>'form','class'=>'mailform','type' => 'file'));
                    ?>
                    <input name="form-type" value="contact" type="hidden">
                    <fieldset>
                        <div class="col-md-6 col-sm-12 col-xs-12 margin-top-name">
                            <label data-add-placeholder="">
                                <?php echo $this->Form->input('first_name',array('class'=>'form-control width','div'=>false,'type'=>'text','placeholder'=>'First Name','label'=>false,'required'=>true)); ?>
                            </label>
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12 margin-top-names">
                            <label data-add-placeholder="">
                                <?php echo $this->Form->input('last_name',array('class'=>'form-control width','div'=>false,'type'=>'text','placeholder'=>'Last Name','label'=>false,'required'=>true)); ?>
                            </label>
                        </div>

                        <label data-add-placeholder="" class="margin-top">
                            <?php echo $this->Form->input('email',array('class'=>'form-control width','div'=>false,'type'=>'email','placeholder'=>'Email','label'=>false,'required'=>true)); ?>
                        </label> 
                        <label data-add-placeholder="" class="margin-top">
                            <?php echo $this->Form->input('phone_no',array('class'=>'form-control width','div'=>false,'type'=>'text','placeholder'=>'Phone No','label'=>false,'required'=>true)); ?>
                        </label>                   
                        <label data-add-placeholder="" class="margin-top">
                            <?php echo $this->Form->input('subject',array('class'=>'form-control width','div'=>false,'type'=>'text','placeholder'=>'Subject','label'=>false,'required'=>true)); ?>
                        </label>

                        <div class="col-md-6 col-sm-12 col-xs-12 margin-top-name">
                            <label data-add-placeholder="" class="margin-top">
                                <?php
                                echo $this->Form->input('position_apply_id',array('class'=>'form-control width','div'=>false,'label'=>false,'empty'=>'Please Select Position Apply','required'=>true));
                                ?>
                            </label>  
                        </div> 

                        <div class="col-md-12 col-sm-12 col-xs-12 margin-top">
                            <?php echo $this->Form->input('file',array('div'=>false,'type'=>'file','label'=>false,'required'=>true)); ?>
                        </div>                                                                                      
                        <label class="textarea" data-add-placeholder="" class="margin-top">
                            <?php 
                            echo $this->Form->input('message',array('div'=>false,'type'=>'textarea','placeholder'=>'Descritpion','label'=>false,'required'=>true,'style'=>'height:76px;font-size:12px;'));
                            ?>
                        </label>

                        <div class="mfControls" class="margin-top">
                            <button class="btn btn-primary mfProgress pading-botton" type="submit">Apply</button>
                        </div>
                    </fieldset>
                </form>
            </div> 
        </div>
    </div>
</main>
<style type="text/css">

.img-add {
    margin-top: 8px;
}
img {
    height: auto;
    max-width: 100%;
    vertical-align: middle;
}
.mailform {
    margin-left: auto;
    margin-right: auto;
    position: relative;
    text-align: left;
}
@media (max-width: 991px) {
.mailform {
    margin-top: 40px;
}
}
.mailform fieldset {
    border: medium none;
    line-height: 0;
}
.mailform * {
    box-sizing: border-box;
}
.mailform label {
    display: inline-block;
    margin-bottom: 0;
    margin-top: 31px;
    position: relative;
    width: 100%;
}
.mailform label.textarea {
    margin-left: 0;
    margin-top: 30px;
    width: 100%;
}
.mailform label:first-child {
    margin-top: 0;
}
.mailform label input, .mailform label select, .mailform label textarea {
    background: #ffffff none repeat scroll 0 0;
    border: 1px solid #bcbdc0;
    border-radius: 0;
    color: #546e7a;
    display: block;
    font-family: "Roboto",sans-serif;
    font-size: 20px;
    font-weight: 300;
    line-height: 31px;
    margin: 0;
    outline: medium none;
    padding: 15px 20px 15px 15px;
    width: 100%;
}
.mailform label input:-moz-placeholder, .mailform label select:-moz-placeholder, .mailform label textarea:-moz-placeholder {
    color: #546e7a;
    opacity: 1;
}
.mailform label input::-moz-placeholder, .mailform label select::-moz-placeholder, .mailform label textarea::-moz-placeholder {
    color: #546e7a;
    opacity: 1;
}
.mailform label textarea {
    height: 179px;
    overflow: auto;
    resize: none;
}
@media (max-width: 1365px) {
.mailform label {
    margin-top: 30px;
}
}
@keyframes fout {
0% {
    transform: scale(1) translateX(0px);
}
100% {
    transform: scale(0) translateX(0px);
}
}
@keyframes fout {
0% {
    transform: scale(1) translateX(0px);
}
100% {
    transform: scale(0) translateX(0px);
}
}
@keyframes anim-1 {
0% {
    left: 50%;
}
100% {
    left: 90%;
}
}
@keyframes anim-2 {
0% {
    transform: rotate(-35deg);
}
25% {
    transform: rotate(-30deg);
}
50% {
    transform: rotate(-35deg);
}
75% {
    transform: rotate(-30deg);
}
100% {
    transform: rotate(-35deg);
}
}
@keyframes anim-3 {
0% {
    left: 50%;
    transform: rotate(150deg);
}
50% {
    left: 90%;
    transform: rotate(150deg);
}
100% {
    left: 50%;
    transform: rotate(150deg);
}
}
@keyframes zoom-out {
0% {
    transform: scale(1) rotate(-35deg);
}
100% {
    transform: scale(0) rotate(-180deg);
}
}
@keyframes zoom-in-state-1 {
0% {
    transform: scale(0) rotate(-180deg);
}
100% {
    transform: scale(1) rotate(-35deg);
}
}
@keyframes zoom-in-state-2 {
0% {
    transform: scale(0) rotate(-35deg);
}
100% {
    left: 50%;
    transform: scale(1) rotate(150deg);
}
}
@keyframes line {
0% {
    left: 40%;
}
100% {
    left: 40%;
    width: 40%;
}
}
@keyframes anim-1 {
0% {
    left: 50%;
}
100% {
    left: 90%;
}
}
@keyframes anim-2 {
0% {
    transform: rotate(-35deg);
}
25% {
    transform: rotate(-30deg);
}
50% {
    transform: rotate(-35deg);
}
75% {
    transform: rotate(-30deg);
}
100% {
    transform: rotate(-35deg);
}
}
@keyframes anim-3 {
0% {
    left: 50%;
    transform: rotate(150deg);
}
50% {
    left: 90%;
    transform: rotate(150deg);
}
100% {
    left: 50%;
    transform: rotate(150deg);
}
}
@keyframes zoom-out {
0% {
    transform: scale(1) rotate(-35deg);
}
100% {
    transform: scale(0) rotate(-180deg);
}
}
@keyframes zoom-in-state-1 {
0% {
    transform: scale(0) rotate(-180deg);
}
100% {
    transform: scale(1) rotate(-35deg);
}
}
@keyframes zoom-in-state-2 {
0% {
    transform: scale(0) rotate(-35deg);
}
100% {
    left: 50%;
    transform: scale(1) rotate(150deg);
}
}
@keyframes line {
0% {
    left: 40%;
}
100% {
    left: 40%;
    width: 40%;
}
}
.mfPlaceHolder {
    color: #546e7a;
    cursor: text;
    font-family: inherit;
    font-feature-settings: inherit;
    font-kerning: inherit;
    font-language-override: inherit;
    font-size: 20px;
    font-size-adjust: inherit;
    font-stretch: inherit;
    font-style: italic;
    font-synthesis: inherit;
    font-variant: inherit;
    font-weight: 300;
    left: 0;
    line-height: 31px;
    opacity: 1;
    padding: 15px 20px 15px 15px;
    position: absolute;
    top: 0;
    transition: all 0.3s ease 0s;
}
.mfPlaceHolder.state-1 {
    opacity: 0.5;
    transform: translateY(-30%) scale(0.6);
}
.mfValidation {
    animation: 0.4s cubic-bezier(0.55, 0, 0.1, 1) 0s normal forwards 1 running notifanim-fo;
    background: #111 none repeat scroll 0 0;
    border-radius: 5px;
    box-shadow: 2px 2px 2px 0 rgba(0, 0, 0, 0.5);
    color: #fff;
    cursor: pointer;
    font-size: 12px;
    font-weight: 300;
    height: 20px;
    line-height: 12px;
    margin-left: 10px;
    margin-top: -20px;
    opacity: 0;
    padding: 3px 7px;
    position: absolute;
    right: 10px;
    top: 0;
    transform-origin: 0 50% 0;
    transition: all 0.3s ease 0s;
    visibility: hidden;
    width: 167px;
    z-index: 998;
}
.mfValidation:hover {
    background: #231634 none repeat scroll 0 0;
}
.mfValidation::before {
    border-color: transparent #111111 transparent transparent;
    border-style: solid;
    border-width: 6px 12px 6px 0;
    content: "";
    height: 0;
    position: absolute;
    right: 161px;
    top: 12px;
    transform: rotate(-45deg);
    width: 0;
}
.mfValidation:hover::before {
    border-left-color: #231634;
}
.mfValidation.error {
    animation: 0.4s cubic-bezier(0.55, 0, 0.1, 1) 0s normal forwards 1 running notifanim;
    opacity: 1;
    transform: scale(1);
    visibility: visible;
}
@media (max-width: 767px) {
.mfValidation {
    background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
    bottom: 100%;
    box-shadow: none;
    color: #ff0000;
    left: auto;
    margin: 0 0 3px;
    min-height: 0;
    padding: 0;
    right: 15px;
    text-align: right;
    top: 2px;
}
.mfValidation::before {
    display: none;
}
.mfValidation:hover {
    background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
}
}
.rd-progress {
    background: #111 none repeat scroll 0 0;
    color: #fff;
}
.mfControls {
    margin-top: 31px;
    text-align: left;
    word-spacing: 10px;
}
@media (max-width: 991px) {
.mfControls {
    text-align: center;
}
}
.mfControls > * {
    margin-bottom: 5px;
    word-spacing: normal;
}
.mfProgress {
    display: block !important;
    font-size: 30px !important;
    font-weight: 300 !important;
    line-height: 1.2 !important;
    margin-left: auto !important;
    margin-right: auto !important;
    max-width: 570px !important;
    position: relative !important;
    text-transform: uppercase !important;
    width: 100% !important;
}
.mfProgress .loader {
    letter-spacing: 10px;
    opacity: 0;
    text-align: center;
    transform: scale(1.2);
    transition: all 0.2s ease-in-out 0s;
}
.mfProgress .loader, .mfProgress .loader::before, .mfProgress .loader::after {
    bottom: 0;
    left: 0;
    margin: auto;
    position: absolute;
    right: 0;
    top: 0;
}
.mfProgress .loader::before {
    background-color: #fff;
    border-radius: 50%;
    content: "";
    height: 20px;
    width: 20px;
}
.mfProgress .loader::after {
    color: #fff;
    content: "";
    font-family: "material-design";
    font-feature-settings: normal;
    font-kerning: auto;
    font-language-override: normal;
    font-size: 30px;
    font-size-adjust: none;
    font-stretch: normal;
    font-style: normal;
    font-synthesis: weight style;
    font-variant: normal;
    font-weight: 400;
    height: 30px;
    line-height: inherit;
    transform: scale(0) rotate(-60deg);
    transition: all 0.4s ease-in-out 0s;
    width: 30px;
}
.mfProgress.sending .cnt, .mfProgress.fail .cnt, .mfProgress.success .cnt {
    opacity: 1;
    transform: scale(1);
}
.mfProgress.sending .loader, .mfProgress.fail .loader, .mfProgress.success .loader {
    opacity: 0;
    transform: scale(1);
}
.mfProgress.fail .loader::before, .mfProgress.success .loader::before {
    animation: 0.4s ease-in-out 0s normal forwards 1 running fout;
}
.mfProgress.fail .loader::after, .mfProgress.success .loader::after {
    transform: scale(1) rotate(0deg);
}
.mfProgress.sending .loader::before {
    animation: 3s cubic-bezier(0.77, 0, 0.175, 1) 0s normal none infinite running motion;
}
.mfProgress.fail .loader::after {
    content: "";
}
.mfProgress.success .loader::after {
    content: "";
}
.mfProgress .msg {
    animation: 0.4s ease-in-out 0s normal forwards 1 running notifanim-fo;
    background: #111 none repeat scroll 0 0;
    border-radius: 0;
    box-shadow: 2px 2px 2px 0 rgba(0, 0, 0, 0.5);
    box-sizing: border-box;
    color: #fff;
    font-size: 20px;
    left: 50%;
    line-height: 20px;
    margin-left: -115px;
    margin-top: 10px;
    opacity: 0;
    padding: 10px;
    position: absolute;
    top: 100%;
    transform-origin: 50% 100% 0;
    transition: all 0.3s ease 0s;
    visibility: hidden;
    width: 230px;
}
.mfProgress .msg::before {
    border-color: transparent transparent #111111;
    border-style: solid;
    border-width: 0 6px 6px;
    bottom: 100%;
    content: "";
    height: 0;
    position: absolute;
    right: 50%;
    transform: translate(50%, 0%);
    transition: all 0.4s ease-in-out 0s;
    width: 0;
}
.mfProgress.fail .msg, .mfProgress.success .msg {
    animation: 0.4s ease-in-out 0s normal forwards 1 running notifanim;
    opacity: 1;
    transform: scale(1);
    visibility: visible;
}
.mfProgress.fail .msg {
    background: #f44336 none repeat scroll 0 0;
}
.mfProgress.fail .msg::before {
    border-color: transparent transparent #f44336;
    border-style: solid;
    border-width: 0 6px 6px;
    height: 0;
    width: 0;
}
.mfProgress.success .msg {
    background: #2e7d32 none repeat scroll 0 0;
}
.mfProgress.success .msg::before {
    border-color: transparent transparent #2e7d32;
    border-style: solid;
    border-width: 0 6px 6px;
    height: 0;
    width: 0;
}
@keyframes motion {
0% {
    transform: translateX(0px) scale(1);
}
25% {
    transform: translateX(-50px) scale(0.3);
}
50% {
    transform: translateX(0px) scale(1);
}
75% {
    transform: translateX(50px) scale(0.3);
}
100% {
    transform: translateX(0px) scale(1);
}
}
@keyframes motion {
0% {
    transform: translateX(0px) scale(1);
}
25% {
    transform: translateX(-50px) scale(0.3);
}
50% {
    transform: translateX(0px) scale(1);
}
75% {
    transform: translateX(50px) scale(0.3);
}
100% {
    transform: translateX(0px) scale(1);
}
}

</style>