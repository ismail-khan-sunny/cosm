<div class="footer">
	
	<div class="bg-white" style="">
    		<h3 class="title" style=" text-decoration:underline;font-weight:bold">All Notices</h3>						
		<div class="deatil_content">
			<div class="panel-body">
				<table class="table table-hover">
					<tr><th width='3%'>S/N</th><th width='87%'>Title</th><th width='10%'>Action</th></tr>
					<?php
					$i=0;
					if(!empty($data)):
						foreach ($data as $key => $value) :
							$i++;
					?>
					<tr><td><?php echo $i;?></td><td><?php echo $value['Seminar']['title'];?></td><td><a href='<?php echo $this->base.'/pages/view_full_seminar/'.$value['Seminar']['slug'];?>' class="btn btn-info btn-sm"><i class="fa fa-eye"></i> View</a></td></tr>
					<?php
					endforeach;
					endif;
					?>
				</table>
			</div>
		</div>
	</div>
</div>