<?=form_open('index.php/test/update');?>
<table border="0" cellpading="5" > 
<input type="hidden" name="id" value="<?php echo $kd?>">  
<tr><td>Name</td><td><input type="text" name="txtname" value="<?php echo $nm?>"></td></tr>          
<tr><td>Tel</td><td><input type="text" name="txttel" value="<?php echo $no?>"></td></tr>               
<tr><td>City</td><td><input type="text" name="txtcity" value="<?php echo $ct?>"></td></tr>              
<tr><td>State</td><td><input type="text" name="txtstate" value="<?php echo $st?>"></td></tr>           
</table>
<?=form_submit('btnsubmit','Save');?>
<?=form_close();?>