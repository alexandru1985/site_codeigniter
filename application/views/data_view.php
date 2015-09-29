<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Data</title>
<link href="<?php echo base_url(); ?>styles/style.css" type="text/css"  rel="stylesheet"  />

    </head>
    <body>

        <div id="ajax">
            <p><a href="<?php  echo base_url()?>test/add">Add new</a></p>
           
                <table border ="1">
                    <tr><td>Id</td><td>Name</td><td>Tel</td><td>City</td><td>State</td><td>Edit</td><td>Delete</td></tr>
                        <?php foreach ($dt as $rows) {
                ?>  
                    
                    <tr>
                        <td><?php echo $rows->id ?></td>
                        <td><?php echo $rows->name ?></td>
                        <td><?php echo $rows->tel ?></td>
                        <td><?php echo $rows->city ?></td>
                        <td><?php echo $rows->state ?></td>
                        <td><a href="<?php  echo site_url('test/edit/'.$rows->id)?>">Edit</a></td>
                        <td><a onclick="return confirm('Vreti sa stergeti?')"href="<?php  echo site_url('test/del/'.$rows->id)?>">Delete</a></td>
                    </tr>
                    <?php
                }
                ?>
            </table>


        </div>

    </body>
</html>