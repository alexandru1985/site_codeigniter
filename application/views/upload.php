<!DOCTYPE html5>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Home page</title>

    </head>
    <body>


        <div id="gallery">


        </div>
        <div id="upload">
            <?php
            echo form_open_multipart('gallery');
            echo form_upload('userfile')."<br>";
            echo form_submit('upload', 'Upload');
            echo form_close();
            ?>
        </div>




    </body>
</html>