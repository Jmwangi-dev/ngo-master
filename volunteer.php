<?php
@session_start();
$uid = $_SESSION['uid'];
echo '<div id="campaign_div" style="padding-bottom:40px;"> 
	<section>
		<div class="container">
			<div class="row justify-content-center section-title-wrap">
				<div class="col-lg-12" style="padding-top:30px;">
					<h2 style="color:#EA2C58;">Please Select the Programme You would like to volunteer For</h2>
					<p>Volunteers don’t necessarily have time, but they have heart. As Volunteer, you will learn not just more about the needs of others, you will also learn more about your own needs and you will discover that in helping other, you help yourself most of all.</p>
				</div>
			</div>
			
			<div class="row">
					<div class="col-md-3 card">
						<div class="card-body">
							<figure>
								<img class="card-img-top img-fluid" src="img/donation/d1.jpg" alt="Card image cap">
							</figure>
							<div class="progress">
								<div class="progress-bar" role="progressbar" aria-valuenow="48" aria-valuemin="0" aria-valuemax="100" style="width: 48%;">
									<span>Funded 48%</span>
								</div>
							</div>
							<div class="card_inner_body">
								<div class="card-body-top">
									<span>Raised: 48,000 </span> / 1,00,000
								</div>
								<h4 class="card-title">NonViolent Peaceforce</h4>
								<p class="card-text">Nonviolent Peaceforce is to promote and develop unarmed civilian peacekeeping to reduce violence.
								</p>
										
							</div>
						</div>
					</div>

					<div class="col-md-3 card">
						<div class="card-body">
							<figure>
								<img class="card-img-top img-fluid" src="img/donation/d2.jpg" alt="Card image cap">
							</figure>
							<div class="progress">
								<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
									<span>Funded 60%</span>
								</div>
							</div>
							<div class="card_inner_body">
								<div class="card-body-top">
									<span>Raised: 60,000</span> / 1,00,000
								</div>
								<h4 class="card-title">Girls Education</h4>
								<p class="card-text">It takes care of girls education, gender discrimination, health and nourishment, girls rights, etc. 
								</p>
								
							</div>
						</div>
					</div>

					<div class="col-md-3 card">
						<div class="card-body">
							<figure>
								<img class="card-img-top img-fluid" src="img/donation/d3.jpg" alt="Card image cap">
							</figure>
							<div class="progress">
								<div class="progress-bar" role="progressbar" aria-valuenow="29" aria-valuemin="0" aria-valuemax="100" style="width: 29%;">
									<span>Funded 29%</span>
								</div>
							</div>
							<div class="card_inner_body">
								<div class="card-body-top">
									<span>Raised: 29,000</span> / 1,00,000
								</div>
								<h4 class="card-title">Child Nutrition</h4>
								<p class="card-text">They work to end and eradicate child hunger, and also check if malnutrition still exists.
								</p>
								
							</div>
						</div>
					</div>

					<div class="col-md-3 card">
						<div class="card-body">
							<figure>
								<img class="card-img-top img-fluid" src="img/donation/d2.jpg" alt="Card image cap">
							</figure>
							<div class="progress">
								<div class="progress-bar" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%;">
									<span>Funded 70%</span>
								</div>
							</div>
							<div class="card_inner_body">
								<div class="card-body-top">
									<span>Raised: 70,000</span> / 1,00,000
								</div>
								<h4 class="card-title">Enable the Disable</h4>
								<p class="card-text">Through this campaign one who reach out and rehabilitate under privileged people with disabilities.
								</p>
								
							</div>
						</div>
					</div>

					
				</div>
		</div>
	</section>
	</div>
	
<div class="modal fade" id="volunterr_1" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title" style="text-align:center;">Edit Job Details</h4>
        </div>
        <div class="modal-body col-md-12">
			<div id="edit_jobposts_body" class="col-md-12"></div>
        </div>
        <div class="modal-footer">
          <!--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
        </div>
      </div>
    </div>
  </div>';
  
 echo "<script>
 function activity1()
 {
	$.ajax({
	  type: 'GET',
	  url:'activity1.php',
	  async:true,
	  cache:false,
	  success:function(result){
		$('#volunteer_body').html(result);
	  }
	});
 }
 </script>";
?>