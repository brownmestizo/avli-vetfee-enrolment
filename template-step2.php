<?php
    echo (isset($zf_error) ? $zf_error : (isset($error) ? $error : ''));
?>

<!-- ######################## -->

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

<!-- ######################## -->

<!-- ######################## -->

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




<!-- the submit button goes in the last row; also, notice the "last" class which
removes the bottom border which is otherwise present for any row -->
<div class="row last"><?php echo $btnsubmit?></div>