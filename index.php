<html>

    <head>

        <title>AVLI VET FEE ENROLMENT FORM</title>

        <meta charset="utf-8">

        <!-- load Zebra_Form's stylesheet file -->
        <link rel="stylesheet" href="vendor/stefangabos/zebra_form/public/css/zebra_form.css">

        <!-- load jQuery -->
        <script src="components/jquery/jquery.min.js"></script>

        <!-- load Zebra_Form's JavaScript file -->
        <script src="vendor/stefangabos/zebra_form/public/css/zebra_form.js"></script>

    </head>

    <body>

        <?php 

            require 'vendor/stefangabos/zebra_form/Zebra_Form.php';

            $form = new Zebra_Form('form');

            // the label for the "email" field
            $form->add('label', 'label_email', 'email', 'Email');

            // add the "email" field
            $obj = $form->add('text', 'email', '', array('autocomplete' => 'off'));

            // set rules
            $obj->set_rule(array(

                // error messages will be sent to a variable called "error", usable in custom templates
                'required'  =>  array('error', 'Email is required!'),
                'email'     =>  array('error', 'Email address seems to be invalid!'),

            ));

            // "password"
            $form->add('label', 'label_password', 'password', 'Password');

            $obj = $form->add('password', 'password', '', array('autocomplete' => 'off'));

            $obj->set_rule(array(

                'required'  => array('error', 'Password is required!'),
                'length'    => array(6, 10, 'error', 'The password must have between 6 and 10 characters'),

            ));

            // "remember me"
            $form->add('checkbox', 'remember_me', 'yes');

            $form->add('label', 'label_remember_me_yes', 'remember_me_yes', 'Remember me');

            // "submit"
            $form->add('submit', 'btnsubmit', 'Submit');

            // validate the form
            if ($form->validate()) {

                // do stuff here

            }

            // auto generate output, labels above form elements
            $form->render();

        ?>

    </body>

</html>