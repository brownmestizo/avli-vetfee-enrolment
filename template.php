<?php
    // don't forget about this for custom templates, or errors will not show for server-side validation
    // $zf_error is automatically created by the library and it holds messages about SPAM or CSRF errors
    // $error is the name of the variable used with the set_rule method
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

<div class="row even">    
    <div class="cell"><?php echo $label_previousName . $previousName . $previousName_previousFirstName; ?> </div>
</div>


<!-- ######################## -->




<div class="row even">
    <?php echo $label_department . $department . $department_other?>
</div>

<div class="row">

    <div class="cell">

        <?php echo $label_room?>

        <!-- this is the preffered way of displaying checkboxes and
        radio buttons and their associated label -->
        <div class="cell"><?php echo $room_A?></div>
        <div class="cell"><?php echo $label_room_A?></div>
        <div class="clear"></div>

        <div class="cell"><?php echo $room_B?></div>
        <div class="cell"><?php echo $label_room_B?></div>
        <div class="clear"></div>

        <div class="cell"><?php echo $room_C?></div>
        <div class="cell"><?php echo $label_room_C?></div>
        <div class="clear"></div>

    </div>

    <div class="cell" style="margin-left: 20px">

        <?php echo $label_extra?>

        <div class="cell"><?php echo $extra_flipchard?></div>
        <div class="cell"><?php echo $label_extra_flipchard?></div>
        <div class="clear"></div>

        <div class="cell"><?php echo $extra_plasma?></div>
        <div class="cell"><?php echo $label_extra_plasma?></div>
        <div class="clear"></div>

        <div class="cell"><?php echo $extra_beverages?></div>
        <div class="cell"><?php echo $label_extra_beverages?></div>
        <div class="clear"></div>

    </div>

</div>

<div class="row even">
    <div class="cell"><?php echo $label_date . $date?></div>
    <div class="cell" style="margin-left: 10px"><?php echo $label_time . $time?></div>
</div>

<!-- the submit button goes in the last row; also, notice the "last" class which
removes the bottom border which is otherwise present for any row -->
<div class="row last"><?php echo $btnsubmit?></div>