<?php

function warning_class_if_invalid ($field, $validation_error_array) {
    if (in_array($field, $validation_error_array)) {
        return "donatoren-warning";
    }
}

function value_if_post ($field) {
    if (isset($_POST[$field])){
        return $_POST[$field];
    }
}

function checked ($field, $value){
    if (value_if_post ($field) == $value) {
        return "checked";
    }
}

if ($_POST) {

    include('post.php');

}

?>


<!DOCTYPE html>
<html lang="de">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Donatoren</title>

        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
        <!-- Custom styles for this template -->
        <style>

        </style> 
        <!-- <link href="navbar-top.css" rel="stylesheet"> -->

        <link rel="stylesheet" href="css/donatoren.css" type="text/css">

    </head>

    <body>
        <div class="container" style="max-width: 640px; padding-top: 30px; margin-bottom: 100px;">

            <?php 

            if(isset($status)) {

                if ($status == "invalid" || $status == "error") {
                    $alert_type = "alert-danger";
                } else {
                    $alert_type = "alert-success";
                }

                $error_div = '<div class="row">';
                $error_div .= '<div class="col-1"></div>';
                $error_div .= "<div class='col-10 alert $alert_type'>";
                $error_div .= $status_message;    
                $error_div .= '</div>';
                $error_div .= '<div class="col-1"></div>';
                $error_div .= '</div>';

                echo $error_div;

                if ($status=="success") {
                    exit;
                }
            } 

            ?>


            <div class="row">
                <div class="col-1"></div>
                <div class="col-10">
                    <h2>Donatoren-Formular</h2>
                    <p>Wenn Sie bzw. ihre Firma/Organisation Donator der Solothurner Filmtage werden möchten, 
                        füllen Sie bitte das untenstehende Formular aus. Bei Fragen stehen wir Ihnen gerne zur Verfügung. 
                    </p>
                    <p>Felder mit einem * sind Pflichtangaben.
                    </p>
                    <form id="donatoren-form" action="donatoren.php" method="post">
                        <div class="form-group">
                            <label for="firma">Firma/Organisation*</label>
                            <input type="text" class="form-control <?php echo warning_class_if_invalid('Firma', $validation_error_array); ?>" name="Firma" id="firma" placeholder="Firma/Organisation" value="<?php echo value_if_post('Firma');?>" required>
                        </div>
                        <div class="form-group">
                            <label for="strasse">Adresse</label>
                            <input type="text" class="form-control top-in-group" name="Strasse_1" id="strasse" placeholder="Strasse" value="<?php echo value_if_post('Strasse_1');?>">
                            <input type="text" class="form-control middle-in-group" name="PLZ" id="plz" placeholder="PLZ" value="<?php echo value_if_post('PLZ');?>">
                            <input type="text" class="form-control bottom-in-group" name="Ort" id="ort" placeholder="Ort" value="<?php echo value_if_post('Ort');?>">
                        </div>
                        <div class="form-group">
                            <label for="vorname">Ansprechperson*</label>
                            <input type="text" class="form-control top-in-group <?php echo warning_class_if_invalid('Vorname', $validation_error_array); ?>" name="Vorname" id="vorname" placeholder="Vorname" value="<?php echo value_if_post('Vorname');?>" required>
                            <input type="text" class="form-control bottom-in-group <?php echo warning_class_if_invalid('Name', $validation_error_array); ?>" name="Name" id="name" placeholder="Nachname" value="<?php echo value_if_post('Name');?>" required>
                        </div>
                        <div class="form-group">
                            <label for="vorname">Kontakt*</label>
                            <input type="tel" class="form-control top-in-group" name="Tel" id="telefon" placeholder="Telefon" value="<?php echo value_if_post('Tel');?>">
                            <input type="email" class="form-control bottom-in-group <?php echo warning_class_if_invalid('Mail', $validation_error_array); ?>" name="Mail" id="email" placeholder="Email" value="<?php echo value_if_post('Mail');?>" required>                            
                        </div>

                        <hr>

                        <div class="form-group donatoren-group">
                            <label>Wir möchten die 53. Solothurner Filmtage als Donator unterstützen.</label>
                            <div class="radiogroup <?php echo warning_class_if_invalid('Donatoren_Ja_Nein', $validation_error_array); ?>">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" name="Donatoren_Ja_Nein" id="donator1" class="form-check-input" value="Ja" <?php echo checked("Donatoren_Ja_Nein", "Ja"); ?> required checked>
                                        Ja
                                    </label>
                                </div>
                                <div>
                                    <label class="form-check-label">
                                        <input type="radio" name="Donatoren_Ja_Nein" id="donator2" class="form-check-input" value="Nein" <?php echo checked("Donatoren_Ja_Nein", "Nein"); ?>>
                                        Nein
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group betrag-group">
                            <div class="radiogroup <?php echo warning_class_if_invalid('Donatoren_Betrag', $validation_error_array); ?>">
                                <label>Betrag (min. CHF 500.-)</label>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" name="Donatoren_Betrag" id="betrag-500" class="form-check-input" value="500" <?php echo checked("Donatoren_Betrag", "500"); ?> required>
                                        CHF 500.-
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" name="Donatoren_Betrag" id="betrag-1000" class="form-check-input" value="1000" <?php echo checked("Donatoren_Betrag", "1000"); ?>>
                                        CHF 1'000.-
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" name="Donatoren_Betrag" id="betrag-2000" class="form-check-input" value="2000" <?php echo checked("Donatoren_Betrag", "2000"); ?>>
                                        CHF 2'000.-
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="radio" name="Donatoren_Betrag" id="betrag-custom" class="form-check-input">
                                        <div class="input-group">
                                            <span class="input-group-addon">CHF</span>
                                            <input type="number" name="Donatoren_Betrag" id="betrag-custom-input" class="form-control" value="<?php echo value_if_post('Donatoren_Betrag');?>" disabled>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group publi-group">
                            <label>Der Name unserer Firma/Instutition darf publiziert und verdankt werden.</label>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="Donatoren_Verdankung" value="Ja" <?php echo checked("Donatoren_Verdankung", "Ja"); ?> checked>
                                    Ja
                                </label>
                            </div>
                            <div>
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="Donatoren_Verdankung" value="Nein" <?php echo checked("Donatoren_Verdankung", "Nein"); ?>>
                                    Nein
                                </label>
                            </div>
                        </div>                    

                        <hr>

                        <div class="form-group restaurant-group">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" id="restOptions" class="form-check-input" name="Donatoren_Restaurants_Flag" value="1" <?php echo checked("Donatoren_Restaurants_Flag", "1"); ?>>
                                    Optionen für Restaurants anzeigen
                                </label>
                            </div>
                        </div>

                        <div class="form-group restaurant-options" style="display: none;">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="Donatoren_Restaurants_Stadtplan_Flag" value="1" <?php echo checked("Donatoren_Restaurants_Stadtplan_Flag", "1"); ?>>
                                    Wir möchten unser Restaurant im Stadtplan eintragen lassen (Programmheft, Webseite, Festival-App).
                                </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" id="zuckersachets" name="Donatoren_Restaurants_Zuckersachets_Flag" value="1" <?php echo checked("Donatoren_Restaurants_Zuckersachets_Flag", "1"); ?>>
                                    Wir möchten Zuckersachets erhalten (kostenlos)
                                </label>
                                <div class="input-group" style="padding-left: 5%;">
                                    <span class="input-group-addon">Anzahl</span>
                                    <input type="number" class="form-control" id="zuckersachets-anzahl" name="Donatoren_Restaurants_Zuckersachets_Anzahl" value ='<?php echo value_if_post("Donatoren_Restaurants_Zuckersachets_Anzahl"); ?>' disabled>
                                </div>

                            </div>

                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" id="plakate-programmhefte" class="form-check-input" name="Donatoren_Restaurants_Plakate_Flag" value="1" <?php echo checked("Donatoren_Restaurants_Plakate_Flag", "1"); ?>>
                                    Wir möchten Plakate und Programmhefte erhalten.
                                </label>
                                <div class="input-group" style="padding-left: 5%;">
                                    <span class="input-group-addon top-in-group">Anzahl Plakate</span>
                                    <input type="number" id="plakate-anzahl" class="form-control top-in-group" name="Donatoren_Restaurants_Plakate_Anzahl" value='<?php echo value_if_post("Donatoren_Restaurants_Plakate_Anzahl"); ?>' disabled>
                                </div>
                                <div class="input-group" style="padding-left: 5%;">
                                    <span class="input-group-addon bottom-in-group">Anzahl Programmhefte</span>
                                    <input type="number" id="programmhefte-anzahl" class="form-control bottom-in-group" name="Donatoren_Restaurants_Programmhefte_Anzahl" value='<?php echo value_if_post("Donatoren_Restaurants_Programmhefte_Anzahl"); ?>' disabled>
                                </div>  

                            </div>

                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="Donatoren_Restaurants_Freinaechte_Flag" value="1" <?php echo checked("Donatoren_Restaurants_Freinaechte_Flag", "1"); ?>>
                                    Wir möchten Freinächte während den Filmtagen beantragen.
                                </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" name="Donatoren_Restaurants_Schaufenster_Flag" value="1" <?php echo checked("Donatoren_Restaurants_Schaufenster_Flag", "1"); ?>>
                                    Wir möchten unser Schaufenster im Auftritt der Solothurner Filmtage gestalten lassen (kostenlos). 
                                </label>
                            </div>                            
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" id="bier" class="form-check-input" name="Donatoren_Restaurants_AbspannBier_Flag" value="1" <?php echo checked("Donatoren_Restaurants_AbspannBier_Flag", "1"); ?>>
                                    Wir möchten während den Filmtagen das Filmtage-Bier «Abspann» (Öufi Brauerei) ausschenken (auf eigene Rechnung). 
                                </label>
                            </div>
                            <div class="bier-optionen" style="display: none;">
                                <div class="form-check push-right">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="Donatoren_Restaurants_AbspannBier_Flaschen_Flag" value="1" <?php echo checked("Donatoren_Restaurants_AbspannBier_Flaschen_Flag", "1"); ?>>
                                        33 cl Flaschen 
                                    </label>
                                </div>
                                <div class="form-check push-right">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="Donatoren_Restaurants_AbspannBier_Offenausschank_Flag" value="1" <?php echo checked("Donatoren_Restaurants_AbspannBier_Offenausschank_Flag", "1"); ?>>
                                        Offenausschank 
                                    </label>
                                </div>                                                          
                            </div>
                        </div>                        

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>  
                <div class="col-1"></div>                  


            </div> <!-- row end -->

        </div> <!-- container end -->



        <!-- Bootstrap core JavaScript ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
        <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

        <script>
            /* Check, ob Werte vorhanden sind. Dann nicht disablen.. */
            $(document).ready(function() {


                /*  */
                if ($('#restOptions').is(':checked')) {
                    $('.restaurant-options').show();
                }

                $('input[type=number]').each(function(){
                    if ($(this).val()) {
                        $(this).attr('disabled', false);
                    }
                });
                
                if ($('#bier').is(':checked')) {
                    $('.bier-optionen').show();
                }
            }) 


            /* Betrag und Publizierung verbergen und disablen, wenn nicht Donator */
            $('.donatoren-group').on('click', function() {
                if ($('#donator2').is(':checked')) {
                    $('#betrag-500').attr('disabled',true);
                    $('#betrag-1000').attr('disabled',true);
                    $('#betrag-2000').attr('disabled',true);
                    $('#betrag-custom').attr('disabled',true);                
                    $('.betrag-group').hide();
                    $('.publi-group').hide();
                    $('.restaurant-group').hide();
                } else {
                    $('.betrag-group').show();
                    $('#betrag-500').attr('disabled',false);
                    $('#betrag-1000').attr('disabled',false);
                    $('#betrag-2000').attr('disabled',false);
                    $('#betrag-custom').attr('disabled',false);                
                    $('.publi-group').show();
                    $('.restaurant-group').show();
                }

            })

            /* Custom-Betrag aktivieren, wenn ausgewählt */

            $('.betrag-group').on('click', function() {
                if ($('#betrag-custom').is(':checked')) {
                    $('#betrag-custom-input').attr('disabled',false);
                    $('#betrag-custom-input').attr('required',true);                    
                } else {
                    $('#betrag-custom-input').attr('disabled',true);
                }
            })


            /* Optionen für Restaurants anzeigen */
            $('#restOptions').on('click', function() {
                if ($(this).is(':checked')){
                    $('.restaurant-options').show();
                } else {
                    $('.restaurant-options').hide();
                }
            })

            /* Restaurant Optionen fine-tuning */

            $('.restaurant-options').on('click', function() {


                /* Zuckersachets */
                if ($('#zuckersachets').is(':checked')) {
                    $('#zuckersachets-anzahl').attr('disabled', false);
                } else {
                    $('#zuckersachets-anzahl').attr('disabled', true);                        
                }

                /* Plakate / Programmhefte */
                if ($('#plakate-programmhefte').is(':checked')) {
                    $('#plakate-anzahl').attr('disabled', false);
                    $('#programmhefte-anzahl').attr('disabled', false);                        
                } else {
                    $('#plakate-anzahl').attr('disabled', true);
                    $('#programmhefte-anzahl').attr('disabled', true);
                }

                /* Bier */
                if ($('#bier').is(':checked')) {
                    $('.bier-optionen').show();
                } else {
                    $('.bier-optionen').hide();
                }

            })



        </script>

    </body>
</html>
