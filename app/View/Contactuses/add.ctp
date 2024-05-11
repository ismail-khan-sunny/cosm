
<div class="row">
	<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12 bg-white">
		<h3 class="title titlestyle">Contact Us</h3>						
		<div class="row">
				<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
					<div class="contact-form">
						
						
						<?php 										  
							  	echo $this->Session->flash();
							  	echo $this->Form->create('Contactus',array('class'=>'form-horizontal','role'=>'form','id'=>'MessageContactUsForm'));
						  	?>
						<div style="display:none;">
						<input name="_method" value="POST" type="hidden"></div>	

						<div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label">Name</label>
						<div class="col-sm-10">
							<input name="name" required="required" class="form-control registration" id="MessageName" type="text">						</div>
						</div>
					<div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label">Email</label>
						<div class="col-sm-10">
							<input name="email" required="required" class="form-control registration" id="MessageEmail" type="email">						</div>
					</div>

					<div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label">Subject</label>
						<div class="col-sm-10">
							<input name="subject" required="required" class="form-control registration" id="MessageSubject" type="text">						</div>
					</div>

					<div class="form-group">
						<label for="inputEmail3" class="col-sm-2 control-label">Message</label>
						<div class="col-sm-10">
							<textarea name="message" required="required" class="form-control contact-message" cols="30" rows="6" id="MessageMessage"></textarea>						</div>
					</div>
					<div class="col-sm-2"></div>
					<div class="col-sm-4">
                    	<div class="submit-botton">
							<button type="submit" class="btn btn-success">Send</button>
										           
								<?php 
						  		echo $this->Form->end();
						  	?>
										         </div>
                    </div>
					</form>
					</div>
					</div>


						<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
						<div style="height:267px;border 2px solid #cfcfcf">

							<iframe src="https://www.google.com/maps/d/embed?mid=z0SKHp6SDFzM.kRzRDclIhEOM" width="100%" height="267"></iframe>
						</div>
						<div style="height:400px;">
						<?php 
						echo $contactuses[0]['Contactus']['description'];
						 ?>
						</div>				
						</div>



						</div>
						</div>
						</div>
