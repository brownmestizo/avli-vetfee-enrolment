<?php 
/* AVLI VET-FEE Enrolment Form */
/* March 1, 2014 */
/* brownmestizo@gmail.com */

//error_reporting(E_ALL);
//ini_set('display_errors', 1);
include_once ('vendor/stefangabos/zebra_form/Zebra_Form.php');
include_once ('avli_model.php');

// instantiate two objects
$form = new Zebra_Form('form');
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
            $date->direction(-6000);

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

            // Do you have a different postal address?
            $form->add('label', 'label_postalAddressQuestion', 'postalAddressQuestion', 'Do you have a different postal address?');
            $obj = $form->add('radios', 'postalAddressQuestion', $enrolmentForm->postalAddressQuestion);
            $obj->set_rule(array(
                'required' => array('error', 'Previous name response is required.')
            ));            


            //***************************************************************
            //***************************************************************            

            // Postal Address

            // Address
            $form->add('label', 'label_postalAddress', 'postalAddress', 'Address');
            $obj = $form->add('text', 'postalAddress');
            $obj->set_rule(array('required' => array('error', 'Address is required.')));
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


            //***************************************************************
            //***************************************************************            


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

            // Have you successfully completed any of the following qualifications?
            $form->add('label', 'label_compQuals', 'compQuals', 'Have you successfully completed any of the following qualifications?');
            $obj = $form->add('checkboxes', 'compQuals[]', $enrolmentForm->completedQualifications);

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