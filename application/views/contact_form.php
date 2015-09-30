<div id="login_form">
    <h1>Contact us</h1>
    <?php
    echo form_open('contact_form/submit');
    echo form_input('name', 'Name', "id='name'");
    echo form_input('email', 'Email', "id='email'");
    $data = array('name' => 'message', 'cols' => 30, 'rows' => 10);
    echo form_textarea($data, 'Message', "id='message'");
    echo form_submit('submit', 'Submit', "id='submit'");
    echo form_close();
    ?>
</div>
<script type= "text/javascript" charset= "utf-8">
    $('#submit').click(function() {
        var form_data = {
            name: $('#name').val(),
            email: $('#email').val(),
            message: $('#message').val(),
            ajax: "1"
        };

        $.ajax({
            url: "<?php echo site_url('contact_form/submit') ?>",
            type: "POST",
            data: form_data,
            success: function(msg) {
                $('body').html(msg);
            }

        });
        return false;

    });

</script>