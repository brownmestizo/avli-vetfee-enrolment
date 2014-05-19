<?php 
/* AVLI VET-FEE Enrolment Form */
/* March 1, 2014 */
/* brownmestizo@gmail.com */

error_reporting(E_ERROR | E_PARSE);
//ini_set('display_errors', 1);
include_once ('vendor/stefangabos/zebra_form/Zebra_Form.php');
include_once ('avli_model.php');

// instantiate two objects
$form = new Zebra_Form('form', 'POST', 'step2.php', '');
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
        <script src="js/form.js"></script>
        <script src="components/jquery/jquery.min.js"></script>
        <script src="vendor/stefangabos/zebra_form/public/javascript/zebra_form.js"></script>
    </head>

    <body>
        
        <?php 
            // Title
            $form->add('label', 'label_title', 'title', 'Title');
            $obj = $form->add('select', 'title', '', '');
            $obj->add_options($enrolmentForm->title);
            $obj->set_rule(array(
                'required' => array('error', 'Title is required!')
            ));

            // First Name
            $form->add('label', 'label_firstName', 'firstName', 'First Name');
            $obj = $form->add('text', 'firstName');
            $obj->set_rule(array('required' => array('error', 'First Name is required.')));

            // Last Name
            $form->add('label', 'label_lastName', 'lastName', 'Last Name');
            $obj = $form->add('text', 'lastName');
            $obj->set_rule(array('required' => array('error', 'Last Name is required.')));            

            //***************************************************************
            //***************************************************************

            // Gender
            $form->add('label', 'label_gender', 'gender', 'Gender');
            $obj = $form->add('select', 'gender', '', '');
            $obj->add_options($enrolmentForm->gender);
            $obj->set_rule(array(
                'required' => array('error', 'Gender is required!')
            ));        

            // Birthday
            $form->add('label', 'label_birthday', 'birthday', 'Birthday');
            $date = $form->add('date', 'birthday');
            $date->set_rule(array(
                'required'      =>  array('error', 'Birthday is required!'),
                'date'          =>  array('error', 'Birthday is invalid!'),
            ));

            // date format
            // don't forget to use $date->get_date() if the form is valid to get the date in YYYY-MM-DD format ready to be used
            // in a database or with PHP's strtotime function!
            //$date->format('M d, Y');

            // selectable dates are starting with the current day
            $date->direction(array('1914-01-01', '2004-12-12'));

            // Email Address
            $form->add('note', 'note_emailAddress', 'emailAddress', 'Your email address will not be published.');
            $form->add('label', 'label_emailAddress', 'emailAddress', 'Email address');
            $obj = $form->add('text', 'emailAddress');
            $obj->set_rule(array(
                'required'  =>  array('error', 'Email is required!'),
                'email'     =>  array('error', 'Email address seems to be invalid!'),
            ));

            //***************************************************************
            //***************************************************************

            // Contact Number
            $form->add('label', 'label_contactNumber', 'contactNumber', 'Contact Number');
            $obj = $form->add('text', 'contactNumber','', array('data-prefix' => '(+61)'));
            $obj->set_rule(array(
                'required'  => array('error', 'Contact number is required.'),
                'length'    => array(8, 10, 'error', 'Must contain between 8 and 10 digits!'),
                'digits'    => array('', 'error', 'Should only include numbers and no special characters.')
            ));
            $form->add('note', 'note_contactNumber', 'contactNumber', 'Accepts only numbers and no special characters.');


            //***************************************************************
            //***************************************************************

            // Vet Course Study
            $form->add('label', 'label_vetCourse', 'vetCourse', 'VET FEE Course');
            $obj = $form->add('select', 'vetCourse', '', '');
            $obj->add_options($enrolmentForm->vetFeeCourses);
            $obj->set_rule(array(
                'required' => array('error', 'VET FEE Course is required.')
            ));        

            //***************************************************************
            //***************************************************************            

            // Do you have a previous name?
            $form->add('label', 'label_previousName', 'previousName', 'Do you have a previous name?');
            $obj = $form->add('radios', 'previousName', $enrolmentForm->previousName);
            $obj->set_rule(array(
                'required' => array('error', 'Previous name response is required.')
            ));

            
            // Previous First Name
            $form->add('label', 'label_previousFirstName', 'previousFirstName', 'First Name');
            $obj = $form->add('text', 'previousFirstName');
            $obj->set_rule(array(
                'required'  =>  array('error', 'Previous first name is required.'),
                'dependencies'   =>  array(array(
                   'previousName' => '1',
                ), 'mycallback, 1'),
            ));
            
            // Previous Last Name
            $form->add('label', 'label_previousLastName', 'previousLastName', 'Last Name');
            $obj = $form->add('text', 'previousLastName');
            $obj->set_rule(array(
                'required'  =>  array('error', 'Previous last name is required.'),
                'dependencies'   =>  array(array(
                   'previousName' => '1',
                ), 'mycallback, 1'),
            ));

            // Previous Other Name
            $form->add('label', 'label_previousOtherName', 'previousOtherName', 'Other Name');
            $obj = $form->add('text', 'previousOtherName');
            $obj->set_rule(array(
                'dependencies'   =>  array(array(
                   'previousName' => '1',
                ), 'mycallback, 1'),
            ));

            //***************************************************************
            //***************************************************************            

            // Home Address

            // Building/Property Name
            $form->add('label', 'label_homeBuildingPropertyName', 'homeBuildingPropertyName', 'Building/Property name');
            $obj = $form->add('text', 'homeBuildingPropertyName');
            //$obj->set_rule(array('required' => array('error', 'Building/Property name is required.')));

            // Flat/Unit
            $form->add('label', 'label_homeFlatUnitNumber', 'homeFlatUnitNumber', 'Flat/Unit number');
            $obj = $form->add('text', 'homeFlatUnitNumber');
            //$obj->set_rule(array('required' => array('error', 'Building/Property name is required.')));            

            // Street/Lot Number
            $form->add('label', 'label_homeStreetLotNumber', 'homeStreetLotNumber', 'Street/Lot number (e.g. 205 or Lot 118)');
            $obj = $form->add('text', 'homeStreetLotNumber');
            $obj->set_rule(array('required' => array('error', 'Street/Lot number is required.')));                        

            // Suburb/Town
            $form->add('label', 'label_homeSuburb', 'homeSuburb', 'Suburb/Town');
            $obj = $form->add('text', 'homeSuburb');
            $obj->set_rule(array('required' => array('error', 'Suburb/Town is required.')));

            // City
            $form->add('label', 'label_homeCity', 'homeCity', 'City');
            $obj = $form->add('text', 'homeCity');
            $obj->set_rule(array('required' => array('error', 'City is required.')));

            // State
            $form->add('label', 'label_homeState', 'homeState', 'State');
            $obj = $form->add('select', 'homeState', '', '');
            $obj->add_options($enrolmentForm->state);
            $obj->set_rule(array(
                'required' => array('error', 'State is required.')
            ));

            // Country
            $form->add('label', 'label_homeCountry', 'homeCountry', 'Country');
            $obj = $form->add('select', 'homeCountry', '', '');
            $obj->add_options($enrolmentForm->country);
            $obj->set_rule(array(
                'required' => array('error', 'Country is required.')
            ));

            // Do you have a different postal address?
            $form->add('label', 'label_postalAddressQuestion', 'postalAddressQuestion', 'Do you have a different postal address?');
            $obj = $form->add('radios', 'postalAddressQuestion', $enrolmentForm->postalAddressQuestion);
            $obj->set_rule(array(
                'required' => array('error', 'Previous name response is required.')
            ));            


            //***************************************************************
            //***************************************************************            

            // Postal Address

            // Building/Property Name
            $form->add('label', 'label_postalBuildingPropertyName', 'postalBuildingPropertyName', 'Building/Property name');
            $obj = $form->add('text', 'postalBuildingPropertyName');
            $obj->set_rule(array(
                'dependencies'   =>  array(array(
                   'postalAddressQuestion' => '1',
                ), 'mycallback, 11'),
            ));            


            // Flat/Unit
            $form->add('label', 'label_postalFlatUnitNumber', 'postalFlatUnitNumber', 'Flat/Unit number');
            $obj = $form->add('text', 'postalFlatUnitNumber');
            $obj->set_rule(array(
                'dependencies'   =>  array(array(
                   'postalAddressQuestion' => '1',
                ), 'mycallback, 11'),
            ));            

            // Street/Lot Number
            $form->add('label', 'label_postalStreetLotNumber', 'postalStreetLotNumber', 'Street/Lot number (e.g. 205 or Lot 118)');
            $obj = $form->add('text', 'postalStreetLotNumber');
            $obj->set_rule(array('required' => array('error', 'Street/Lot number is required.')));                        
            $obj->set_rule(array(
                'dependencies'   =>  array(array(
                   'postalAddressQuestion' => '1',
                ), 'mycallback, 11'),
            ));            


            // Suburb/Town
            $form->add('label', 'label_postalSuburb', 'postalSuburb', 'Suburb/Town');
            $obj = $form->add('text', 'postalSuburb');
            $obj->set_rule(array('required' => array('error', 'Suburb/Town is required.')));
            $obj->set_rule(array(
                'dependencies'   =>  array(array(
                   'postalAddressQuestion' => '1',
                ), 'mycallback, 11'),
            ));                        

            // City
            $form->add('label', 'label_postalCity', 'postalCity', 'City');
            $obj = $form->add('text', 'postalCity');
            $obj->set_rule(array('required' => array('error', 'City is required.')));
            $obj->set_rule(array(
                'dependencies'   =>  array(array(
                   'postalAddressQuestion' => '1',
                ), 'mycallback, 11'),
            ));                        

            // State
            $form->add('label', 'label_postalState', 'postalState', 'State');
            $obj = $form->add('select', 'postalState', '', '');
            $obj->add_options($enrolmentForm->state);
            $obj->set_rule(array(
                'required' => array('error', 'State is required.')
            ));
            $obj->set_rule(array(
                'dependencies'   =>  array(array(
                   'postalAddressQuestion' => '1',
                ), 'mycallback, 11'),
            ));                        

            // Country
            $form->add('label', 'label_postalCountry', 'postalCountry', 'Country');
            $obj = $form->add('select', 'postalCountry', '', '');
            $obj->add_options($enrolmentForm->country);
            $obj->set_rule(array(
                'required' => array('error', 'Country is required.')
            ));
            $obj->set_rule(array(
                'dependencies'   =>  array(array(
                   'postalAddressQuestion' => '1',
                ), 'mycallback, 11'),
            ));                        



            // Submit button
            $form->add('submit', 'btnsubmit', 'Submit');

            // Validate the form
            /*
            if ($form->validate()) {
                show_results();
            } else
            */
                $form->render('template-step1.php');

        ?>

    </body>

</html>