<?php include('../../view_header.php')?>
<?php include('../menu.php')?>
<div class="container">
	<h1 class="text-center">Lineas Navieras</h1>
	<form class="" action="index.php" method="POST">
		<input type="hidden" name='action' value='<?php if(isset($values['action']))echo $values['action'];?>'>
	  <div class="form-group">
		<label for="">Id</label>
		<input autocomplete="off" readonly="readonly" type="text" class="form-control input-sm" id="" placeholder="" name="id_shipping_lines" value="<?php if(isset($values['id_shipping_lines'])) echo $values['id_shipping_lines']?>">
	  </div>
	  <div class="form-group">
		<label for="">name</label>
		<input autocomplete="off" type="text" class="form-control input-sm" id="" placeholder="" name="name" value="<?php if(isset($values['name'])) echo $values['name']?>">
	  </div>
	  <div class="form-group">
		<label for="">abr</label>
		<input autocomplete="off" type="text" class="form-control input-sm" id="" placeholder="" name="abr" value="<?php if(isset($values['abr'])) echo $values['abr']?>">
	  </div>
	  <div class="form-group">
		<label for="">address</label>
		<input autocomplete="off" type="text" class="form-control input-sm" id="" placeholder="" name="address" value="<?php if(isset($values['address'])) echo $values['address']?>">
	  </div>
	  <div class="form-group">
		<label for="">phone1</label>
		<input autocomplete="off" type="text" class="form-control input-sm" id="" placeholder="" name="phone1" value="<?php if(isset($values['phone1'])) echo $values['phone1']?>">
	  </div>
	  <div class="form-group">
		<label for="">phone2</label>
		<input autocomplete="off" type="text" class="form-control input-sm" id="" placeholder="" name="phone2" value="<?php if(isset($values['phone2'])) echo $values['phone2']?>">
	  </div>
	  <div class="form-group">
		<label for="">email1</label>
		<input autocomplete="off" type="text" class="form-control input-sm" id="" placeholder="" name="email1" value="<?php if(isset($values['email1'])) echo $values['email1']?>">
	  </div>
	  <div class="form-group">
		<label for="">email2</label>
		<input autocomplete="off" type="text" class="form-control input-sm" id="" placeholder="" name="email2" value="<?php if(isset($values['email2'])) echo $values['email2']?>">
	  </div>
	  <div class="form-group">
		<label for="">contact1</label>
		<input autocomplete="off" type="text" class="form-control input-sm" id="" placeholder="" name="contact1" value="<?php if(isset($values['contact1'])) echo $values['contact1']?>">
	  </div>
	  <div class="form-group">
		<label for="">phone_contact1</label>
		<input autocomplete="off" type="text" class="form-control input-sm" id="" placeholder="" name="phone_contact1" value="<?php if(isset($values['phone_contact1'])) echo $values['phone_contact1']?>">
	  </div>
	  <div class="form-group">
		<label for="">email_contact1</label>
		<input autocomplete="off" type="text" class="form-control input-sm" id="" placeholder="" name="email_contact1" value="<?php if(isset($values['email_contact1'])) echo $values['email_contact1']?>">
	  </div>
	  <div class="form-group">
		<label for="">contact2</label>
		<input autocomplete="off" type="text" class="form-control input-sm" id="" placeholder="" name="contact2" value="<?php if(isset($values['contact2'])) echo $values['contact2']?>">
	  </div>
	  <div class="form-group">
		<label for="">phone_contact2</label>
		<input autocomplete="off" type="text" class="form-control input-sm" id="" placeholder="" name="phone_contact2" value="<?php if(isset($values['phone_contact2'])) echo $values['phone_contact2']?>">
	  </div>
	  <div class="form-group">
		<label for="">email_contact2</label>
		<input autocomplete="off" type="text" class="form-control input-sm" id="" placeholder="" name="email_contact2" value="<?php if(isset($values['email_contact2'])) echo $values['email_contact2']?>">
	  </div>
		<div class="form-group">
		  <label class="label label-danger">
			<input type="radio" name="status" id="status" value="0" <?php if(isset($values['status']) and $values['status'] =='0' ) echo "checked=checked"?>>
			Desactivar
		  </label>
		</div>
		<div class="form-group">
		  <label class="label label-success">
			<input type="radio" name="status" id="status" value="1" <?php if(isset($values['status']) and $values['status'] =='1' ) echo "checked=checked"?>>
			Activar
		  </label>
		</div>	
	  <div class="form-group">
		<label autocomplete="off" for="">Fecha creado</label>
		<input autocomplete="off"  type="text" readonly="readonly" class="form-control input-sm" id="" placeholder="" name="date_created" value="<?php if(isset($values['date_created'])) echo $values['date_created']?>">
	  </div>
	  <div class="form-group">
		<label for="">Fecha modificado</label>
		<input autocomplete="off" readonly="readonly" type="text" class="form-control input-sm" id="" placeholder="" name="date_updated" value="<?php if(isset($values['date_updated'])) echo $values['date_updated']?>">
	  </div>

		<a class="btn btn-default"  href="<?php echo full_url."/adm/shipping_lines/index.php"?>"><i class="fa fa-arrow-left  fa-pull-left fa-border"></i> Regresar</a>
		<button type="submit" class="btn btn-default"><i class="fa fa-save fa-pull-left fa-border"></i> Guardar</button>
    <?php if(isset($values['msg']) and $values['msg']!=''):?>
        <div class="alert alert-success" role="alert"><?php echo $values['msg'];?></div>
    <?php endif;?>
	</form>
</div>
<?php include('../../view_footer.php')?>