<!DOCTYPE html5>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Home page</title>

    </head>
    <body>


        <div id="gallery">
            <?php if(isset($images)&&count($images)):
            
             foreach ($images as $image):?> 
             <div id="thumb">
                 <a href="<?php echo $image['url'];?>">
                 <img src ="<?php echo $image['thumb_url'];?>"/>
                 
                 
                 
                 </a>
             </div>
            <?php endforeach;
             else: ?>
            <div id="blank_gallery">Please upload an image.</div>
            <?php endif; ?>

        </div>
        <div id="upload">
            <?php
            echo form_open_multipart('gallery');
            echo form_upload('userfile') . "<br>";
            echo form_submit('upload', 'Upload');
            echo form_close();
            ?>
        </div>




    </body>
</html>