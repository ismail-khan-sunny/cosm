<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
       
        <div class="eee">
		<h3 class="title titlestyle">All Download</h3>						
		<div class="deatil_content">
			<div class="panel-body" style="padding-bottom: 0px;">
			
					<table class="table table-hover">
						<tr><th width='3%'>S/N</th><th width='87%'>Title</th><th width='10%'>Action</th></tr>
						<?php
						$i=0;
						if(!empty($download)):
							foreach ($download as $key => $value) :
								$file =$this->base.$value['Download']['file'];	
								$i++;
						?>
						<tr>
							<td><?php echo $i;?></td><td><?php echo $value['Download']['title'];?></td>
							<td>
								<a href="<?php echo $file; ?>">Download</a>
							</td>
						</tr>
						<?php
						endforeach;
						endif;
						?>
					</table>
			</div>
		</div>

		
	</div>
</div>