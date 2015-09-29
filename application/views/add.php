<?=form_open('index.php/test/submit');?>
<table border="0" cellpading="5" > 
            <tr>
                <td>Name</td>
                <td><?=form_input('txtname', set_value('txtname'));?></td>
            </tr>
             <tr>
                <td>Tel</td>
                <td><?=form_input('txttel');?></td>
            </tr>
             <tr>
                <td>City</td>
                <td><?=form_input('txtcity');?></td>
            </tr>
             <tr>
                <td>State</td>
                <td><?=form_input('txtstate');?></td>
            </tr>
               <tr>
                <td></td>
                <td><?=form_submit('btnsubmit','Save');?></td>
            </tr>
</table>
<?=form_close();?>

