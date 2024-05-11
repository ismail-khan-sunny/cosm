<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
       
        <div class="eee">
		<h3 class="title titlestyle">All Admission</h3>						
		<div class="deatil_content">
			<div class="panel-body" style="padding-bottom: 0px;">
			
				<table class="table table-hover">
					<tr><th width='3%'>S/N</th><th width='87%'>Title</th><th width='10%'>Action</th></tr>
					<?php
					$i=0;
					if(!empty($admission)):
						foreach ($admission as $key => $value) :
							$i++;
					?>
					<tr><td><?php echo $i;?></td><td><?php echo $value['Notice']['title'];?></td><td><a href='<?php echo $this->base.'/pages/view_full_notice/'.$value['Notice']['slug'];?>' class="btn btn-info btn-sm"><i class="fa fa-eye"></i> View</a></td></tr>
					<?php
					endforeach;
					endif;
					?>
				</table>
			</div>
		</div>

		
	</div>
</div>