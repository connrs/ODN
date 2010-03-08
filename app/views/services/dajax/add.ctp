<h2>Add Service</h2>
<form action="<?php echo $html->url('/services/add')?>" method="post" accept-charset="UTF-8">
<fieldset>
<legend>Service Details</legend>
<?php echo $form->input('Service.title', array('options'=>am($service_titles,array('other'=>'Other')),'empty'=>true,'label'=>'Service Type','error'=>'Please choose a service type.'))?> 
<input type="text" name="data[Service][Title]">
<?php echo $form->input('Service.description', array('rows'=>20,'cols'=>70,'label'=>array('text'=>'Details','title'=>'Depending on the service (SEO, design, hosting) give specific details regarding keywords, design requirements, and anything else relating to the service.')))?> 
<?php echo $form->input('Service.user_id', array('options'=>$user,'empty'=>true,'label'=>'Technician','error'=>'Please select a technician for this service'))?> 
<?php echo $form->input('Service.website_id', array('options'=>$website,'empty'=>true,'label'=>'Website','error'=>'Please select a website for this service'))?> 
<?php echo $form->input('Service.status', array('options'=>$service_status,'selected'=>SERVICE_STATUS_ACTIVE))?>
<?php echo $form->input('Service.schedule', array('options'=>$service_schedule))?>
</fieldset>
<?php if(!empty($service['Services']['website_id'])) echo $form->hidden('Service.website_id',$service['Service']['website_id'])?>
<?php if(!empty($service['Service']['customer_id'])):?>
<?php echo $form->hidden('Service.customer_id',array('value'=>$service['Service']['customer_id']))?> 
<?php endif;?>
<?php echo $form->submit('Add')?> 
</form>