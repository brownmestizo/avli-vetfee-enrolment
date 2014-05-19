<?php
    echo (isset($zf_error) ? $zf_error : (isset($error) ? $error : ''));
?>



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

    <!-- ######################## -->

    <div class="row"> 
        <h3>Home Address</h3> 
        <p>Please provide the physical address (street number and name NOT post office box) where you usually reside rather than any temporary address at which you reside for training, work or other purposes before returning to your home.
    If you are from a rural area use the address from your state’s or territory’s ‘rural property addressing’ or
    ‘numbering’ system as your residential street address.</p>
    </div>


    <div class="row even">    
        <div class="cell"><?php echo $label_homeBuildingPropertyName . $homeBuildingPropertyName; ?> </div>
        <div class="cell"><?php echo $label_homeFlatUnitNumber . $homeFlatUnitNumber; ?> </div>
        <div class="cell"><?php echo $label_homeStreetLotNumber . $homeStreetLotNumber; ?> </div>
        <div class="clear"></div> 

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
        <div class="cell"><?php echo $label_postalBuildingPropertyName . $postalBuildingPropertyName; ?> </div>
        <div class="cell"><?php echo $label_postalFlatUnitNumber . $postalFlatUnitNumber; ?> </div>
        <div class="cell"><?php echo $label_postalStreetLotNumber . $postalStreetLotNumber; ?> </div>
        <div class="clear"></div> 
        
        <div class="cell"><?php echo $label_postalSuburb . $postalSuburb; ?></div>
        <div class="cell"><?php echo $label_postalCity . $postalCity; ?></div>
        
        <div class="clear"></div>    

        <div class="cell"><?php echo $label_postalState . $postalState; ?></div>
        <div class="cell"><?php echo $label_postalCountry . $postalCountry; ?></div>
    </div>


    <!-- the submit button goes in the last row; also, notice the "last" class which
    removes the bottom border which is otherwise present for any row -->
    <div class="row last"><?php echo $btnsubmit?></div>