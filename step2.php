<?php 
/* AVLI VET-FEE Enrolment Form */
/* March 1, 2014 */
/* brownmestizo@gmail.com */

error_reporting(E_ERROR | E_PARSE);
//ini_set('display_errors', 1);
include_once ('vendor/stefangabos/zebra_form/Zebra_Form.php');
include_once ('avli_model.php');

// instantiate two objects
$form = new Zebra_Form('form', 'POST', 'step3.php', '');
$enrolmentForm = new VetfeeEnrolment();
$form->show_all_error_messages(true);
$form->clientside_validation(true);
$form->clientside_validation(array(
    'close_tips'                =>  false,      //  don't show a "close" button on tips with error messages
    'on_ready'                  =>  false,      //  no function to be executed when the form is ready
    'disable_upload_validation' =>  true,       //  using a custom plugin for managing file uploads
    'scroll_to_error'           =>  true,      //  don't scroll the browser window to the error message
    'tips_position'             =>  'right',    //  position tips with error messages to the right of the controls
    'validate_on_the_fly'       =>  true,       //  don't validate controls on the fly
    'validate_all'              =>  false,      //  show error messages one by one upon trying to submit an invalid form
));
?>

<html>
    <head>
        <title>AVLI VET FEE ENROLMENT FORM</title>
        <meta charset="utf-8">
        <!-- load Zebra_Form's stylesheet file -->
        <link rel="stylesheet" href="vendor/stefangabos/zebra_form/public/css/zebra_form.css">
        <link rel="stylesheet" href="css/reset.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/custom.css">        
        <link rel="stylesheet" href="framework_style/stylesheets/app.css" />
        <script src="components/jquery/jquery.min.js"></script>
        <script src="framework_style/bower_components/modernizr/modernizr.js"></script>        
        <script src="js/build/form.min.js"></script>
    </head>

    <body>
        
        <?php 

            // Country
            $form->add('label', 'label_birthCountry', 'birthCountry', 'In which country were you born?');
            $obj = $form->add('select', 'birthCountry', '', '');
            $obj->add_options($enrolmentForm->country);
            $obj->set_rule(array(
                'required' => array('error', 'Country is required.')
            ));

            // Do you speak a language other than English at home?
            $form->add('label', 'label_languageOtherThanEnglish', 'languageOtherThanEnglish', 'Do you speak a language other than English at home?');
            $obj = $form->add('radios', 'languageOtherThanEnglish', $enrolmentForm->previousName);
            $obj->set_rule(array(
                'required' => array('error', 'Language response is required.')
            ));

            
            // What language is it?
            $form->add('label', 'label_language', 'language', 'Please specify what language it is');
            $obj = $form->add('text', 'language');
            $obj->set_rule(array(
                'required'  =>  array('error', 'Specific language is required.'),
                'dependencies'   =>  array(array(
                   'languageOtherThanEnglish' => '1',
                ), 'mycallback, 2'),
            ));

            // English ability
            $form->add('label', 'label_englishAbility', 'englishAbility', 'How well do you speak English?');
            $obj = $form->add('select', 'englishAbility', '', '');
            $obj->add_options($enrolmentForm->englishAbility);
            $obj->set_rule(array(
                'required' => array('error', 'English level of comprehension is required.'),
                'dependencies'   =>  array(array(
                   'languageOtherThanEnglish' => '1',
                ), 'mycallback, 2'),
            ));

            // Aboriginal/Torres Strait Islander status
            $form->add('label', 'label_aboriginalStatus', 'aboriginalStatus', 'Are you of Aboriginal or Torres Strait Islander origin?');
            $obj = $form->add('select', 'aboriginalStatus', '', '');
            $obj->add_options($enrolmentForm->aboriginalStatus);
            $obj->set_rule(array(
                'required' => array('error', 'Your Aboriginal/Torres Strait Islander origin response is required.'),
            ));            


            //***************************************************************
            //***************************************************************            

            // Disability status
            $form->add('label', 'label_disabilityStatus', 'disabilityStatus', 'Do you consider yourself to have a disability, impairment or long-term condition?');
            $obj = $form->add('radios', 'disabilityStatus', $enrolmentForm->disabilityStatus);            
            $obj->set_rule(array(
                'required' => array('error', 'Disability status response is required.')
            ));


            // Please indicate the area/s of disability, impairment or long-term condition that you have
            $form->add('label', 'label_disabilityAreas', 'disabilityAreas', 'Please indicate the area/s of disability, impairment or long-term condition that you have');
            $obj = $form->add('checkboxes', 'disabilityAreas[]', $enrolmentForm->disabilityAreas);
            $obj->set_rule(array(
                'required' => array('error', 'Disability, impairment, or long-term conditions response is required.'),
                'dependencies'   =>  array(array(
                   'disabilityStatus' => '1',
                ), 'mycallback, 3'),
            ));



            //***************************************************************
            //***************************************************************
            foreach ($_POST as $key => $value) {
                if (strpos($key, 'name_') !== 0 && strpos($key, 'timer_') !== 0 && strpos($key, 'response_') !== 0)                        
                    $obj = $form->add('hidden', $key, $value);

            }

            // Submit button
            $form->add('submit', 'btnsubmit', 'Submit');

            // Validate the form
            /*
            if ($form->validate()) {
                show_results();
            } else 
            */
            
            $form->render('template-step2.php');

        ?>

    </body>

</html>