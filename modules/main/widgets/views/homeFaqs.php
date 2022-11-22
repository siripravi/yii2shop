<div class="container ">
         <div class="row  my-4">
		<div class="col-lg-6 offset-lg-3">
		<div class="section_title text-center">FAQ</div>
		</div>
		</div>   

<div class="row panel-group accordion accordion-flush" id="FaqAccordion1" role="tablist" aria-multiselectable="true">
<?php foreach ($question as $i => $q) :?>
   <div class="col-lg-6">
   <?php if ($q->answer): ?>
		<div class="panel panel-default">
		    <div class="panel-heading" id="headingOne" role="tab">
          				<h5 class="panel-title" id="flush-heading-<?= $i ;?>">
					<a editable="rich" class="accordion-button collapsed" type="button" data-toggle="collapse" data-target="#flush-collapse-<?= $i ;?>" aria-expanded="false" aria-controls="flush-collapse-<?= $i ;?>">
						<?= nl2br($q->question);?>?		
				</a></h5>
            </div>
		   
			<div id="flush-collapse-<?= $i ;?>" class="panel-collapse collapse" aria-labelledby="flush-heading-<?= $i ;?>" data-bs-parent="#FaqAccordion1" style="">
					<div editable="rich" class="panel-body"><?php echo $q->answer; ?></div>
			</div>
			
		</div>
		<?php endif;  ?>
	</div>
<?php endforeach;  ?>		
	</div>
	
</div>
