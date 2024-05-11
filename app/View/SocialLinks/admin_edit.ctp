<!-- Actions -->

<script type="text/javascript">
$(document).ready(function(){
	$( ".sortable" ).sortable();
	 $('.datepicker').datepicker();
})

$(document).ready(function () {
		
		var adtype = $('#SocialLinkSocialType').val();
		
		 if(adtype=='image'){
        	 $('#SocialLinkIcon').parent('div').hide();
        }
        
        if(adtype=='icon'){
    		$('#SocialLinkImage').parent('div').hide();
    		$( "#SocialLinkImage" ).hide();
    	}
    	
        $('#SocialLinkImage').show();
        
        $('#SocialLinkSocialType').change(function () {        	
            $('.ad-manage').hide();
            var sval = $(this).val();
           
            if(sval == 'image'){            	 
            	 $('#SocialLinkImage').parent('div').show();
            	  $('#SocialLinkIcon').parent('div').hide();
            }else{
            	
				 $('#SocialLinkIcon').parent('div').show();
            	
            }
        });
    })
		

</script>
<div class="row">
	<div class="col-lg-12 col-xs-12 col-md-12 col-sm-12 margin-bottom-10">
		<div class="box-tools pull-right">
			<div class="btn-group">
				<div class="btn btn-sm btn-default btn-icon">
					<i class="fa fa-list-alt"></i>
				</div>
				<div class="btn-group hidden-nav-xs">
					<?php echo $this->Html->link(__('Social Link List'), array('action' => 'index'),array('class' => 'btn btn-sm btn-default ajax_page')); ?>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Panel -->
<div class="row">
	<div class="col-lg-12 col-xs-12 col-md-12 col-sm-12">
		<div class="box box-solid box-primary">
			<div class="box-header">
				<h3 class="box-title"><?php echo __('Social Links'); ?></h3>
				<div class="box-tools pull-right">
                    <button class="btn btn-primary btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button class="btn btn-primary btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
				</div>
			</div>
			<div class="box-body">
				<div class="row">
					<?php echo $this->Form->create('SocialLink',array('type'=>'file','role'=>'form','class'=>'')); ?>
					
					<?php
					echo $this->Form->input('id',array('type'=>'hidden'));
					echo $this->Form->input('type',array('options'=>$menuPosition,'div'=>'form-group col-md-4','required'=>true,'empty'=>'Select Social Type','class'=>'form-control'));
					echo $this->Form->input('icon',array('class'=>'form-control','div'=>'form-group col-md-4'));	
					echo $this->Form->input('title',array('class'=>'form-control','div'=>'form-group col-md-4'));
					echo $this->Form->input('url',array('class'=>'form-control','div'=>'form-group col-md-6'));
					echo $this->Form->input('order',array('class'=>'form-control','div'=>'form-group col-md-6'));
					
					?>
					<div class="form-group col-md-12">
						<?php
							echo $this->Form->submit('Submit',array('class'=>'btn btn-success','label'=>false,'div'=>false)).'&nbsp;';
							echo $this->Form->input('Cancel',array('type'=>'reset','class'=>'btn btn-warning left-shift-reset','label'=>false,'div'=>false));
						?>
					</div>
					<?php echo $this->Form->end(); ?>
				</div>
			</div>
		</div>
	</div>
</div>
