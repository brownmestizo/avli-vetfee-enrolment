<style type="text/css">
    .Zebra_Form .optional { display: none }
</style>

<script type="text/javascript">
    var mycallback = function(value, segment) {
        $segment = $('.optional' + segment);
        if (value) $segment.show();
        else $segment.hide();
    }
</script>

<script>
    $("#wizard").steps();
</script>

<?php
    echo (isset($zf_error) ? $zf_error : (isset($error) ? $error : ''));
?>

<div id="wizard">

    <h1>First Step</h1>
    <div>
        <div class="row">
            <div class="cell"><?php echo $label_title . $title; ?> </div>
            <div class="cell"><?php echo $label_firstName . $firstName?></div>
            <div class="cell"><?php echo $label_lastName . $lastName?></div>
        </div>

        <div class="row even">    
            <div class="cell"><?php echo $label_gender . $gender; ?> </div>
            <div class="cell"><?php echo $label_birthday . $birthday; ?></div>
            <div class="cell"><?php echo $label_emailAddress . $emailAddress . $note_emailAddress; ?></div>
        </div>

        <div class="row">
            <div class="cell"><?php echo $label_contactNumber . $contactNumber . $note_contactNumber; ?></div>
        </div>

        <div class="row">
            <div class="cell"><?php echo $label_email . $email?></div>
        </div>

        <div class="row even">    
            <div class="cell"><?php echo $label_vetCourse . $vetCourse; ?> </div>
        </div>

        <div class="row">    
            <div class="cell">
                <div class="cell"><?php echo $label_previousName; ?></div>

                <div class="cell"><?php echo $previousName_1; ?></div>
                <div class="cell"><?php echo $label_previousName_1; ?></div>

                <div class="cell"><?php echo $previousName_2; ?></div>
                <div class="cell"><?php echo $label_previousName_2; ?></div>
            </div>

            <div class="clear"></div>

                <div class="optional optional1">
                    <div class="cell"><?php echo $label_previousFirstName . $previousFirstName?></div>
                    <div class="cell"><?php echo $label_previousLastName . $previousLastName?></div>
                    <div class="cell"><?php echo $label_previousOtherName . $previousOtherName?></div>
                </div>
        </div>
    </div>


    <!-- ######################## -->

    <h1>Second Step</h1>
    <div>
        <div class="row"> <h3>Home Address</h3> </div>

        <div class="row even">    
            <div class="cell"><?php echo $label_homeAddress . $homeAddress; ?> </div>
            <div class="cell"><?php echo $label_homeSuburb . $homeSuburb; ?></div>
            <div class="cell"><?php echo $label_homeCity . $homeCity; ?></div>
            
            <div class="clear"></div>    

            <div class="cell"><?php echo $label_homeState . $homeState; ?></div>
            <div class="cell"><?php echo $label_homeCountry . $homeCountry; ?></div>

            <div class="clear"></div>

        </div>


        <div class="row">    
            <div class="cell">
                <div class="cell"><?php echo $label_postalAddressQuestion; ?></div>

                <div class="cell"><?php echo $postalAddressQuestion_1; ?></div>
                <div class="cell"><?php echo $label_postalAddressQuestion_1; ?></div>

                <div class="cell"><?php echo $postalAddressQuestion_2; ?></div>
                <div class="cell"><?php echo $label_postalAddressQuestion_2; ?></div>
                <div class="clear"></div>    
            </div>    
        </div>

        <div class="row optional optional11">

            <div class="clear"></div>    

            <div class="cell"><?php echo $label_postalAddress . $postalAddress; ?> </div>
            <div class="cell"><?php echo $label_postalSuburb . $postalSuburb; ?></div>
            <div class="cell"><?php echo $label_postalCity . $postalCity; ?></div>

            <div class="clear"></div>    

            <div class="cell"><?php echo $label_postalState . $postalState; ?></div>
            <div class="cell"><?php echo $label_postalCountry . $postalCountry; ?></div>

        </div>
    </div>
    <!-- ######################## -->


    <h1>Third Step</h1>
    <div>
        <div class="row"> <h3>Language and Cultural Diversity </h3> </div>
        <div class="row even">    
            <div class="cell"><?php echo $label_birthCountry . $birthCountry; ?> </div>
        </div>

        <div class="row">    
            <div class="cell">
                <div class="cell"><?php echo $label_languageOtherThanEnglish; ?></div>

                <div class="cell"><?php echo $languageOtherThanEnglish_1; ?></div>
                <div class="cell"><?php echo $label_languageOtherThanEnglish_1; ?></div>

                <div class="cell"><?php echo $languageOtherThanEnglish_2; ?></div>
                <div class="cell"><?php echo $label_languageOtherThanEnglish_2; ?></div>
            </div>

            <div class="clear"></div>

                <div class="optional optional2">
                    <div class="cell"><?php echo $label_language . $language?></div>
                    <div class="clear"></div>
                    <div class="cell"><?php echo $label_englishAbility . $englishAbility; ?> </div>
                </div>
        </div>

        <div class="row even">
            <div class="cell"><?php echo $label_aboriginalStatus. $aboriginalStatus; ?></div>
        </div>
    </div>
    <!-- ######################## -->

    <h1>Fourth Step</h1>
    <div>
        <div class="row"> <h3>Previous Qualifications Achieved</h3> </div>
        <div class="row even">
            <div class="cell">
                <?php echo $label_compQuals; ?>

                <div class="cell"><?php echo $compQuals_ask_qualbachelordegreeorhigherdegree?></div>
                <div class="cell"><?php echo $label_compQuals_ask_qualbachelordegreeorhigherdegree; ?></div>
                <div class="clear"></div>

                <div class="cell"><?php echo $compQuals_ask_qualadvanceddiplomaorassociatede; ?></div>
                <div class="cell"><?php echo $label_compQuals_ask_qualadvanceddiplomaorassociatede; ?></div>
                <div class="clear"></div>

                <div class="cell"><?php echo $compQuals_ask_qualdiploma; ?></div>
                <div class="cell"><?php echo $label_compQuals_ask_qualdiploma; ?></div>
                <div class="clear"></div>

                <div class="cell"><?php echo $compQuals_ask_qualadvanceddiplomaorassociatede; ?></div>
                <div class="cell"><?php echo $label_compQuals_ask_qualadvanceddiplomaorassociatede; ?></div>
                <div class="clear"></div>

                <div class="cell"><?php echo $compQuals_ask_qualcertificateiv; ?></div>
                <div class="cell"><?php echo $label_compQuals_ask_qualcertificateiv; ?></div>
                <div class="clear"></div>

                <div class="cell"><?php echo $compQuals_ask_qualcertificateiii; ?></div>
                <div class="cell"><?php echo $label_compQuals_ask_qualcertificateiii; ?></div>
                <div class="clear"></div>

                <div class="cell"><?php echo $compQuals_ask_qualcertificateii; ?></div>
                <div class="cell"><?php echo $label_compQuals_ask_qualcertificateii; ?></div>
                <div class="clear"></div>

                <div class="cell"><?php echo $compQuals_ask_qualcertificatei; ?></div>
                <div class="cell"><?php echo $label_compQuals_ask_qualcertificatei; ?></div>
                <div class="clear"></div>

                <div class="cell"><?php echo $compQuals_ask_qualothers; ?></div>
                <div class="cell"><?php echo $label_compQuals_ask_qualothers; ?></div>
                <div class="clear"></div>                                                        

                <div class="cell"><?php echo $compQuals_ask_qualnoneoftheabove; ?></div>
                <div class="cell"><?php echo $label_compQuals_ask_qualnoneoftheabove; ?></div>
                <div class="clear"></div>                        

            </div>
        </div>
    </div>
    <!-- ######################## -->

    <h1>Fifth Step</h1>
    <div>
        <div class="row"> <h3>Disability</h3> </div>
        <div class="row even">    

            <div class="cell">
                <div class="cell"><?php echo $label_disabilityStatus; ?></div>

                <div class="cell"><?php echo $disabilityStatus_1; ?></div>
                <div class="cell"><?php echo $label_disabilityStatus_1; ?></div>

                <div class="cell"><?php echo $disabilityStatus_2; ?></div>
                <div class="cell"><?php echo $label_disabilityStatus_2; ?></div>
                <div class="clear"></div>
            </div>


            <div class="clear"></div>

                <div class="optional optional3">
                        <?php echo $label_disabilityAreas; ?>

                        <div class="cell"><?php echo $disabilityAreas_ask_disabilityhearingdeaf; ?></div>
                        <div class="cell"><?php echo $label_disabilityAreas_ask_disabilityhearingdeaf; ?></div>
                        <div class="clear"></div>            

                        <div class="cell"><?php echo $disabilityAreas_ask_disabilityphysical; ?></div>
                        <div class="cell"><?php echo $label_disabilityAreas_ask_disabilityphysical; ?></div>
                        <div class="clear"></div>            

                        <div class="cell"><?php echo $disabilityAreas_ask_disabilityintellectual; ?></div>
                        <div class="cell"><?php echo $label_disabilityAreas_ask_disabilityintellectual; ?></div>
                        <div class="clear"></div>            

                        <div class="cell"><?php echo $disabilityAreas_ask_disabilitylearning; ?></div>
                        <div class="cell"><?php echo $label_disabilityAreas_ask_disabilitylearning; ?></div>
                        <div class="clear"></div>            

                        <div class="cell"><?php echo $disabilityAreas_ask_disabilitymentalillness; ?></div>
                        <div class="cell"><?php echo $label_disabilityAreas_ask_disabilitymentalillness; ?></div>
                        <div class="clear"></div>            

                        <div class="cell"><?php echo $disabilityAreas_ask_disabilityacquiredbraininjury; ?></div>
                        <div class="cell"><?php echo $label_disabilityAreas_ask_disabilityacquiredbraininjury; ?></div>
                        <div class="clear"></div>            

                        <div class="cell"><?php echo $disabilityAreas_ask_disabilityvision; ?></div>
                        <div class="cell"><?php echo $label_disabilityAreas_ask_disabilityvision; ?></div>
                        <div class="clear"></div>            

                        <div class="cell"><?php echo $disabilityAreas_ask_disabilitymedicalcondition; ?></div>
                        <div class="cell"><?php echo $label_disabilityAreas_ask_disabilitymedicalcondition; ?></div>
                        <div class="clear"></div>

                        <div class="cell"><?php echo $disabilityAreas_ask_disabilityother; ?></div>
                        <div class="cell"><?php echo $label_disabilityAreas_ask_disabilityother; ?></div>
                        <div class="clear"></div>                
                </div>
        </div>
    </div>

    <!-- ######################## -->

    <h1>Fifth Step</h1>
    <div>
        <div class="row"> <h3>Schooling</h3> </div>

        <div class="row even">    
            <div class="cell"><?php echo $label_highestCompletedSchoolLevel . $highestCompletedSchoolLevel; ?> </div>
            <div class="clear"></div>

                <div class="optional optional4">
                    <div class="cell"><?php echo $label_schoolSN . $schoolSN; ?></div>
                    <div class="cell"><?php echo $label_schoolName . $schoolName; ?></div>
                    <div class="cell"><?php echo $label_schoolState . $schoolState; ?></div>
                </div>

        </div>

        <div class="row">
            <div class="cell"><?php echo $label_yearOfCompletion . $yearOfCompletion; ?></div>
        </div>

        <div class="row even">
            <div class="cell">
                <div class="cell"><?php echo $label_attendingSecondary; ?></div>

                <div class="cell"><?php echo $attendingSecondary_1; ?></div>
                <div class="cell"><?php echo $label_attendingSecondary_1; ?></div>

                <div class="cell"><?php echo $attendingSecondary_2; ?></div>
                <div class="cell"><?php echo $label_attendingSecondary_2; ?></div>
                <div class="clear"></div>
            </div>
        </div>
    </div>
    <!-- ######################## -->

    <h1>Fifth Step</h1>
    <div>
        <div class="row"> <h3>Employment</h3> </div>
        <div class="row even">
            <div class="cell"><?php echo $label_employmentStatus . $employmentStatus; ?></div>
        </div>
    </div>

    <!-- ######################## -->

    <h1>Fifth Step</h1>
    <div>
        <div class="row"> <h3>Study Reason</h3> </div>
        <div class="row even">
            <div class="cell"><?php echo $label_studyReason . $studyReason; ?></div>
        </div>
    </div>

    <!-- ######################## -->

    <h1>Fifth Step</h1>
    <div>
        <div class="row"> <h3>Studying in an Electronic Environment</h3> </div>
        <div class="row even">
            <div class="cell">
                <p>
                    For your study in the AVLI online  environment, it is important for you to understand the legislation that governs  
                    electronic communications in the context of the Vocational Educational Training  sector:
                </p>

                    <ul type="disc">
                      <li>Electronic Transactions Act 1999</li>
                      <li>Higher Education Support Act 2003</li>
                      <li>VET Guidelines</li>
                    </ul>

                <p>
                    Wherever  permitted by law, AVLI will send and receive communication through electronic  means that are accessible 
                    and authorised for students to use.
                </p>

                <p>
                    In applying for admission, during enrolment and while studying in an AVLI course,  the following applies to each individual:
                </p>

                    <ul type="disc">
                      <li>All applicants seeking to enrol into a course with AVLI consent to giving and being given information by way of <strong>electronic communication</strong>.</li>
                      <li>All applicants seeking to enrol into a course with AVLI consent to fulfilling the <strong>electronic signature </strong>requirements during the application, enrolment and study, by:</li>
                          <ul type="circle">
                            <li>providing AVLI with means of personal identification as requested at the time, this may be in the form of a photo ID or through provision of a unique applicant identification number as instructed by AVLI. </li>
                          </ul>
                    </ul>

                    <ul type="disc">
                        <li>All applicants consent to AVLI’s use of the personal identification for the purpose it was collected at the time.</li>
                    </ul>

                    <ul type="disc">
                      <li>All applicants seeking to enrol into a course with AVLI consent to AVLI producing <strong>electronic documents</strong>, where and in the form permitted by Commonwealth law. </li>
                      <li>All applicants will be required to provide AVLI with a current copy of their photo ID, which also displays current address and date of birth, to complete the enrolment process.  </li>
                    </ul>
            </div>
        </div>

        <!-- ######################## -->

        <div class="row"> <h3>Applicant Declaration</h3> </div>

        <div class="row even">
            <div class="cell">
                <p>By submitting this  form, I acknowledge and accept the following declaration: </p>
                <ul>
                  <li>The  information provided by me in this form is complete, true and correct and that  my submitting this electronic form constitutes a legal electronic signature on  this enrolment form under current Australian law; </li>
                  <li>I have  read, understood and agree to the information contained in the Student Handbook  as published on the AVLI website; </li>
                  <li>I have  read, understood and agree to the terms and conditions contained in the terms  and conditions published on the AVLI website; </li>
                  <li>I am an  Australian citizen, or the holder of a permanent humanitarian visa who will be  resident in Australia for the duration of the VET unit of study;</li>
                  <li>I will  provide AVLI with the required documentation as proof of being an Australian  citizen or permanent humanitarian visa holder; and</li>
                  <li>I will  provide AVLI with current Photo ID which depicts me and is a valid document for  which I give permission to AVLI to use to verify my identity for the purpose of  course eligibility and visual identification during my course enrolment. </li>
                </ul>
                <table width="100%" border="0">
                  <tbody><tr>
                    <th style="text-align:left">Applicant ID
                        Applicant ID is created by you, using your details: <br>
                        First 3 letters of SURNAME<br>
                        First 3 letters for FIRST NAME <br>
                        Month and Year of birth - MMYY <br>
                        <b>Eg: SMIJOH0165 (John Smith born January 1965)</b> <br>
                        Surname and/or First Name with less than 3 letters – substitute an X <br>
                        <b>Eg: QIXLUX0383 (Lu Qi born March 1983)</b> 
                    </th></tr>
                </tbody></table>
            </div>
            <div class="clear"></div>
            <div class="cell">
                <div class="cell"><?php echo $label_applicationID . $applicationID?></div>
            </div>
        </div>
    </div>


    <!-- the submit button goes in the last row; also, notice the "last" class which
    removes the bottom border which is otherwise present for any row -->
    <div class="row last"><?php echo $btnsubmit?></div>

</div>