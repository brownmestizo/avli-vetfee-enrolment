<?php 
/* AVLI VET-FEE Enrolment Form */
/* March 1, 2014 */
/* brownmestizo@gmail.com */
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
        <script src="js/form.js"></script>
    </head>

    <body>
        
        <?php 
            function show_results() {

                echo '<table class="results"><thead><tr><td colspan="2">Submitted values</td></tr></thead>';
                foreach ($_POST as $key => $value) {
                    if (strpos($key, 'name_') !== 0 && strpos($key, 'timer_') !== 0 && strpos($key, 'response_') !== 0)
                        echo '<tr><th>' . $key . '</th><td>' . (is_array($value) ? '<pre>' . print_r($value, true) . '</pre>' : $value) . '</td></tr>';
                }

                echo '</table>';
            }

            show_results();
        ?>

    </body>

</html>