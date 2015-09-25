<div id="contact">
    <?php
    echo $message;
    echo validation_errors();

    echo form_open("site/send_email");
    echo form_label("Name:", "fullName");

   
    echo form_input();
    echo form_label("Email:", "email");

   
    echo form_input();
    echo form_label("Message:", "message");

   

    echo form_textarea();
    echo form_submit("contactSubmit", "Send");

    echo form_close();
    ?>



</div>