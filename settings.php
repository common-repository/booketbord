<?php
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

?>
<div class="wrap">
<h1>BookEtBord indstillinger</h1>
<form method="post" action="options.php"> 
<?php settings_fields( 'booketbord_standard' );?>
<?php do_settings_sections( 'booketbord_standard' ); ?>
    <table class="form-table">
        <tr valign="top">
        <th scope="row">BookEtBord ID</th>
        <td><input type="number" id='booketbord_id' name="booketbord_id" value="<?php echo esc_attr( get_option('booketbord_id') ); ?>" /></td>
        </tr>
        <tr valign="top">
        <th scope="row">BookEtBord LD+JSON</th>
        <td>
		<i>Dette felt autoudfyldes med data fra din opsætning hos os på booketbord.dk<br>Det hjælper blandt andet google med at vise brugerne hvordan man booker bord direkte i søgemaskinen</i><br>
		<button href="#" onclick="booketbordLookupData();return false;">Udfyld SEO data</button> 
		<button href="#" onclick="booketbordValidateData();return false;">Check SEO data</button><br>
		<textarea id="booketbord_ldjson" name="booketbord_ldjson" style="display:none;"><?php echo esc_attr( get_option('booketbord_ldjson') ); ?></textarea>
		<p id="booketbord_ldjson_data_validate">Not checked</p>
		</td>
        </tr>
    </table>
<script type="text/javascript">
function booketbordValidateData(){
	if(jQuery('#booketbord_ldjson').val().length>100){
		jQuery("#booketbord_ldjson_data_validate").html('Data valideret. Husk at trykke GEM ÆNDRINGER');
		jQuery("#booketbord_ldjson_data_validate").css('color','white');
		jQuery("#booketbord_ldjson_data_validate").css('background-color','green');
	} else {
		jQuery("#booketbord_ldjson_data_validate").html('Ikke valideret data. Udfyld korrekt BookEtBord ID og tryk Udfyld data og derefter tryk GEM ÆNDRINGER. Såfremt du bliver ved med at få fejlen skal du kontakte supporten.');
		jQuery("#booketbord_ldjson_data_validate").css('color','white');
		jQuery("#booketbord_ldjson_data_validate").css('background-color','red');
	}
}
function booketbordLookupData(){
	booketbord_id = jQuery('#booketbord_id').val();
	if (booketbord_id.length != 5){
		alert('ikke gyldigt booketbord id');
	} else {
		jQuery.get('https://www.bord-booking.dk/get_schema_data.php?restaurant_id='+booketbord_id+'&type=ldjson').success(function(data){
			jQuery('#booketbord_ldjson').val(data);
		}).fail(function(){
			alert('Forkert Book Et Bord ID. Kontakt supporten');
		}).complete(function (){
			booketbordValidateData();
		});
	}
}
</script>
<?php submit_button(); ?>
</form>
<h2>Vejledning</h2>
<p>Herunder finder du en vejledning til hvordan du får booketbord ind på din hjemmeside, så dine gæster kan begynde at booke online.</p>
<h3>1. Indtast dit booketbord kunde nr.(også kaldet ID)</h3>
<p>Dit ID har du fået udleveret i forbindelse med din oprettelse hos BookEtBord.dk. Har du spørgsmål skal du kontakte vores support på <a href="mailto:info@booketbord.dk?subject=WPplugin">info@booketbord.dk</a><br>
Ønsker du at din hjemmeside fortæller google hvordan man booker kan du gøre det ved at trykke UDFYLD SEO DATA og hvis du får grønt lys kan du trykke GEM ÆNDRINGER
</p>
<h3>2. Link til din bookingfase</h3>
<?php if ((int)get_option('booketbord_id')>0){ ?>
<p>https://www.bord-booking.dk/online_booking/index.php?restaurantId=<?php echo get_option('booketbord_id') ;?></p>
<?php }else{ ?>
<p style="color: red;">Du skal indtaste et Booketbord kunde nr/ID før du kan få dannet et link</p>
<?php } ?>
<h3>3. Indsæt linket relevante steder</h3>
<?php if ((int)get_option('booketbord_id')>0){ ?>
<p>Du kan nu begynde at indsætte linket til bookingfasen de relevante steder på hjemmesiden. Typisk giver det mening at lave et menupunkt med et link til booking fasen, så dine gæster hurtigt kommer ind og booke.</p>
<p>Når du sætter linket ind er det vigtigt at du giver linket en CSS class der hedder <strong>book_et_bord_btn</strong></p>
<p>Denne CSS class vil hjælpe med at gøre linket til bookingfasen til en lightbox. Se herunder hvordan du aktiverer redigering af CSS class på menupunkter</p>
<iframe width="560" height="315" src="https://www.youtube.com/embed/7K4cp_g4V38?ecver=1" frameborder="0" allowfullscreen></iframe>
<?php }else{ ?>
<p style="color: red;">Du skal indtaste et Booketbord kunde nr/ID før du kan få dannet et link</p>
<?php } ?>
<h1>Spørgsmål?</h1>
<p>Tøv ikke med at kontakte os, så skal vi nok hjælpe dig videre.</p>
</div>

