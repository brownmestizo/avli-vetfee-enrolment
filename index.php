<?php 
//error_reporting(E_ALL);
//ini_set('display_errors', 1);
include_once ('vendor/stefangabos/zebra_form/Zebra_Form.php');
include_once ('avli_model.php');

// instantiate two objects
$form = new Zebra_Form('form');
$enrolmentForm = new VetfeeEnrolment();
?>

<html>
    <head>
        <title>AVLI VET FEE ENROLMENT FORM</title>
        <meta charset="utf-8">
        <!-- load Zebra_Form's stylesheet file -->
        <link rel="stylesheet" href="vendor/stefangabos/zebra_form/public/css/zebra_form.css">
        <link rel="stylesheet" href="css/reset.css">
        <link rel="stylesheet" href="css/style.css">
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
            $date->format('M d, Y');

            // selectable dates are starting with the current day
            $date->direction(1);

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
            $obj = $form->add('text', 'contactNumber');
            $obj->set_rule(array(
                'required'  => array('error', 'Contact number is required.'),
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
            $obj = $form->add('select', 'previousName', '', '');
            $obj->add_options($enrolmentForm->previousName);
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

            // Previous Last Name
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

            // Address
            $form->add('label', 'label_homeAddress', 'homeAddress', 'Address');
            $obj = $form->add('text', 'homeAddress');
            $obj->set_rule(array('required' => array('error', 'Address is required.')));

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


            //***************************************************************
            //***************************************************************            


            // Postal Address

            // Address
            $form->add('label', 'label_postalAddress', 'postalAddress', 'Address');
            $obj = $form->add('text', 'postalAddress');
            $obj->set_rule(array('required' => array('error', 'Address is required.')));

            // Suburb/Town
            $form->add('label', 'label_postalSuburb', 'postalSuburb', 'Suburb/Town');
            $obj = $form->add('text', 'postalSuburb');
            $obj->set_rule(array('required' => array('error', 'Suburb/Town is required.')));

            // City
            $form->add('label', 'label_postalCity', 'postalCity', 'City');
            $obj = $form->add('text', 'postalCity');
            $obj->set_rule(array('required' => array('error', 'City is required.')));

            // State
            $form->add('label', 'label_postalState', 'postalState', 'State');
            $obj = $form->add('select', 'postalState', '', '');
            $obj->add_options($enrolmentForm->state);
            $obj->set_rule(array(
                'required' => array('error', 'State is required.')
            ));

            // Country
            $form->add('label', 'label_postalCountry', 'postalCountry', 'Country');
            $obj = $form->add('select', 'postalCountry', '', '');
            $obj->add_options($enrolmentForm->country);
            $obj->set_rule(array(
                'required' => array('error', 'Country is required.')
            ));


            //***************************************************************
            //***************************************************************            


            // Country
            $form->add('label', 'label_birthCountry', 'birthCountry', 'In which country were you born?');
            $obj = $form->add('select', 'birthCountry', '', '');
            $obj->add_options($enrolmentForm->country);
            $obj->set_rule(array(
                'required' => array('error', 'Country is required.')
            ));

            //***************************************************************
            //***************************************************************            


            $form->add('label', 'label_department', 'department', 'Department:');
            $obj = $form->add('select', 'department', '', array('other' => true));
            $obj->add_options(array(
                'Marketing',
                'Operations',
                'Customer Service',
                'Human Resources',
                'Sales Department',
                'Accounting Department',
                'Legal Department',
            ));
            $obj->set_rule(array(
                'required' => array('error', 'Department is required!')
            ));

            // "room"
            $form->add('label', 'label_room', 'room', 'Which room would you like to reserve:');
            $obj = $form->add('radios', 'room', array(
                'A' =>  'Room A',
                'B' =>  'Room B',
                'C' =>  'Room C',
            ));
            $obj->set_rule(array(
                'required' => array('error', 'Room selection is required!')
            ));

            // "extra"
            $form->add('label', 'label_extra', 'extra', 'Extra requirements:');
            $obj = $form->add('checkboxes', 'extra[]', array(
                'flipchard'     =>  'Flipchard and pens',
                'plasma'        =>  'Plasma TV screen',
                'beverages'     =>  'Coffee, tea and mineral water',
            ));

            // "date"
            $form->add('label', 'label_date', 'date', 'Reservation date');
            $date = $form->add('date', 'date');
            $date->set_rule(array(
                'required'      =>  array('error', 'Date is required!'),
                'date'          =>  array('error', 'Date is invalid!'),
            ));

            // date format
            // don't forget to use $date->get_date() if the form is valid to get the date in YYYY-MM-DD format ready to be used
            // in a database or with PHP's strtotime function!
            $date->format('M d, Y');

            // selectable dates are starting with the current day
            $date->direction(1);

            $form->add('note', 'note_date', 'date', 'Date format is M d, Y');

            // "time"
            $form->add('label', 'label_time', 'time', 'Reservation time :');
            $form->add('time', 'time', '', array(
                'hours'     =>  array(9, 10, 11, 12, 13, 14, 15, 16, 17),
                'minutes'   =>  array(0, 30),
            ));


            //***************************************************************
            //***************************************************************

            // Submit button
            $form->add('submit', 'btnsubmit', 'Submit');

            // Validate the form
            if ($form->validate()) {
                show_results();
            } else
                $form->render('template.php');



        ?>

    </body>

</html>