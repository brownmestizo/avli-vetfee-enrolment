<?php 
/* AVLI VET-FEE Enrolment Form */
/* March 1, 2014 */
/* brownmestizo@gmail.com */

error_reporting(E_ERROR | E_PARSE);
//ini_set('display_errors', 1);
include_once ('vendor/stefangabos/zebra_form/Zebra_Form.php');
include_once ('avli_model.php');

// instantiate two objects
$form = new Zebra_Form('form', 'POST', 'avli_process.php', '');
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

            //***************************************************************
            //***************************************************************

            // What is your highest completed school level?
            $form->add('label', 'label_highestCompletedSchoolLevel', 'highestCompletedSchoolLevel', 'What is your highest completed school level?');            
            $obj = $form->add('select', 'highestCompletedSchoolLevel', '', '');
            $obj->add_options($enrolmentForm->highestCompletedSchoolLevel);            

            // In which year did you complete that school level?
            $form->add('label', 'label_yearOfCompletion', 'yearOfCompletion', 'In which year did you complete that school level?');
            $obj = $form->add('text', 'yearOfCompletion');

            // Are you still attending secondary school?
            $form->add('label', 'label_attendingSecondary', 'attendingSecondary', 'Are you still attending secondary school?');
            $obj = $form->add('radios', 'attendingSecondary', $enrolmentForm->secondarySchool);
            $obj->set_rule(array(
                'required' => array('error', 'Currently attending secondary school response is required.')
            ));


            // If student completed year 12 or equivalent

            // School student number
            $form->add('label', 'label_schoolSN', 'schoolSN', 'School student number');
            $obj = $form->add('text', 'schoolSN');
            $obj->set_rule(array(
                'dependencies'   =>  array(array(
                   'highestCompletedSchoolLevel' => '1',
                ), 'mycallback, 4'),
            ));

            // School Name
            $form->add('label', 'label_schoolName', 'schoolName', 'School name');
            $obj = $form->add('text', 'schoolName');
            $obj->set_rule(array(
                'required'  =>  array('error', 'School name is required.'),
                'dependencies'   =>  array(array(
                   'highestCompletedSchoolLevel' => '1',
                ), 'mycallback, 4'),
            ));
            
            // State
            $form->add('label', 'label_schoolState', 'schoolState', 'State');
            $obj = $form->add('select', 'schoolState', '', '');
            $obj->add_options($enrolmentForm->state);
            $obj->set_rule(array(
                'required' => array('error', 'School State is required.'),
                'dependencies'   =>  array(array(
                   'highestCompletedSchoolLevel' => '1',
                ), 'mycallback, 4'),                
            ));


            //***************************************************************
            //***************************************************************

            // Have you successfully completed any of the following qualifications?
            $form->add('label', 'label_compQuals', 'compQuals', 'Have you successfully completed any of the following qualifications?');
            $obj = $form->add('checkboxes', 'compQuals[]', $enrolmentForm->completedQualifications);

            //***************************************************************
            //***************************************************************


            // Of the following categories, which BEST describes your current employment status?
            $form->add('label', 'label_employmentStatus', 'employmentStatus', 'Of the following categories, which BEST describes your current employment status?');
            $obj = $form->add('select', 'employmentStatus', '', '');
            $obj->add_options($enrolmentForm->employmentStatus);
            $obj->set_rule(array(
                'required' => array('error', 'Employment status is required.'),
            ));


            //***************************************************************
            //***************************************************************


            // Of the following categories, which BEST describes your main reason for undertaking this course / traineeship / apprenticeship
            $form->add('label', 'label_studyReason', 'studyReason', 'Of the following categories, which BEST describes your main reason for undertaking this course / traineeship / apprenticeship');
            $obj = $form->add('select', 'studyReason', '', '');
            $obj->add_options($enrolmentForm->studyReason);
            $obj->set_rule(array(
                'required' => array('error', 'Study reason is required.'),
            ));


            //***************************************************************
            //***************************************************************

            // Application ID
            $form->add('label', 'label_applicationID', 'applicationID', 'Application ID');
            $obj = $form->add('text', 'applicationID');


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
                $form->render('template-step3.php');

        ?>

    </body>

</html>