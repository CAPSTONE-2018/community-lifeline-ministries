var itemID = 1;
function NewStudentMed()
{
	var html = '<div class="blue-line-color"></div>';
	    html = html + '<div class="form-group"><div class="col-sm-6">';
            html = html + '<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">';
            html = html + '<input id="medicalConcernType" class="mdl-textfield__input" name="medicalConcernType" type="text"/>';
            html = html + '<label class="mdl-textfield__label" for="medicalConcernType">Name</label>';
            html = html + '</div></div><div class="col-sm-6"><label for="sort">Type</label><br>';
	    html = html + '<select id="sort" name="sort" class="pretty"><option value="position">';

	    html = html + '<?php while ($medicalConcernTypeRow = mysqli_fetch_assoc($medicalConcernTypesResult))';
            html = html + '{echo "<option name=\'medicalConcernType\' value=" . $medicalConcernTypeRow[\'Id\'] . ">" . $medicalConcernTypeRow[\'Type\'] . "</option>";}?>';

	    html = html + '<option name="Mental Health" value="Mental Health">Mental Health</option>';
	    html = html + '<option name="Medical Concern" value="Medical Concern">Medical Concern</option>';

	    html = html + '</option></selection>';
	    html = html + '</div><div class="col-sm-10"><div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">';
	    html = html + '<textarea id="medicalConcernNote" class="mdl-textfield__input" name="medicalConcernNote" type="text">';
	    html = html + '</textarea><label class="mdl-textfield__label" for="medicalConcernNote">Note</label>';
	    html = html + '<div><button type="button" id="remove">Remove</button></div>';
	    html = html + '</div></div></div></div>';

	var newDiv;
	newDiv = document.createElement("DIV");
	newDiv.innerHTML=html;
	newDiv.id="field";

	document.getElementById('newLayer').insertBefore(newDiv,null);
}
