<!--
****************CV Builder by Okiria Paul Oken 6/22/2020*******************************************************
****************Care of bothofus.se****************************************************************************
----------------Credit https://github.com/DoersGuild/jQuery.print----------------------------------------------
----------------Project Source Code https://github.com/globaloken/cv-builder-tool------------------------------
-->
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>CV Builder Pro</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/main.css">
    </head>
	
<body>
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">CV Builder Pro</a>
        </div>
      </div>
    </nav>

<div class="jumbotron" id="formjumbotronid">
<div class="container">
    <div class="rendered-form">
        <div class="formbuilder-text form-group field-full_name">
            <label for="full_name" class="formbuilder-text-label">Your Full Name<span class="formbuilder-required"> *</span></label>
            <input type="text" class="form-control" name="full_name" id="full_name" required="required" aria-required="true" />
        </div>
        <div class="formbuilder-text form-group field-location"><label for="location" class="formbuilder-text-label">Your Location<span class="formbuilder-required"> *</span></label><input type="text" class="form-control" name="location" id="location" /></div>
        <div class="formbuilder-number form-group field-number-1592829609455">
            <label for="number-1592829609455" class="formbuilder-number-label">Salary Expectation ($)<span class="formbuilder-required"> *</span></label>
            <input type="number" class="salary_expectation" name="number-1592829609455" id="salary_expectationid" required="required" aria-required="true"/>
        </div>
        <div class="formbuilder-text form-group field-position">
            <label for="position" class="formbuilder-text-label">Position Applied For<span class="formbuilder-required"> *</span></label>
            <input type="text" class="form-control" name="position" id="position" required="required" aria-required="true" />
        </div>
        <div class="formbuilder-text form-group field-candidate_availability">
            <label for="candidate_availability" class="formbuilder-text-label">When Are You Available?<span class="formbuilder-required"> *</span></label>
            <input type="text" class="form-control" name="candidate_availability" placeholder="Example: 1 month" id="candidate_availability" required="required" aria-required="true" />
        </div>
        <div class="formbuilder-textarea form-group field-skills_competences">
            <label for="skills_competences" class="formbuilder-textarea-label">Summarize Your Skills and Competences<span class="formbuilder-required"> *</span></label>
            <textarea type="textarea" rows="8" cols="50" class="form-control" name="skills_competences" id="skills_competences" required="required" aria-required="true"></textarea>
        </div>
        <div class="formbuilder-checkbox-group form-group field-technical_skills">
            <label for="technical_skills" class="formbuilder-checkbox-group-label">Technical Skills <span class="tooltip-element" tooltip="Tick all that apply">?</span></label>
            <div class="checkbox-group">
                <div class="formbuilder-checkbox-inline">
                    <input name="technical_skills" required="required" aria-required="true" value="Java" type="checkbox" /><label>&nbsp; Java</label>
                </div>
                <div class="formbuilder-checkbox-inline">
                    <input name="technical_skills" required="required" aria-required="true" value="Python" type="checkbox" /><label>&nbsp; Python</label>
                </div>
                <div class="formbuilder-checkbox-inline">
                    <input name="technical_skills" required="required" aria-required="true" value="PHP" type="checkbox" /><label>&nbsp; PHP</label>
                </div>
                <div class="formbuilder-checkbox-inline">
                    <input name="technical_skills" required="required" aria-required="true" value="React" type="checkbox" /><label>&nbsp; React</label>
                </div>
            </div>
        </div>
        <div class="formbuilder-text form-group field-comment"><label for="comment" class="formbuilder-text-label">Any Comment?</label><input type="text" class="form-control"  placeholder="Comments and Reactions" name="comment" id="comments" /></div>
		<center><input type="submit" class="btn-primary" name="submit" value="Preview" id="submitbtn" /></center>
    </div>
</div>
</div>

<div class="container" id="cvpreview">
<span id="cvtemplatebtns"><center>
 <button class="btn-danger templatebtn" id="closepreviewbtn" hidden>Close Preview</button>
 <button class="btn-success templatebtn" id="printpdfbtn" hidden>Save PDF</button>
</center></span>
</div>

<div class="container">
 <hr>
  <footer>
   <center><p>&copy; CV Builder Pro 2020</p></center>
  </footer>
</div>
	
  <script src="js/vendor/jquery-1.11.2.min.js"></script>
  <script src="js/vendor/jQuery.print.js"></script>
  <script src="js/vendor/bootstrap.min.js"></script>
  <script src="js/main.js"></script>
  <script>
  $(document).ready(function () {
    $("#submitbtn").on('click', function () {
	  if(validateForm() != 1){
	//Retrieve all the candidates technical skills
	    var techskill = [];
            $.each($("input[name='technical_skills']:checked"), function(){
                techskill.push($(this).val());
            });
        var alltechskill = techskill.join(", ");
	//Variables from Form inputs	
        var fname = $('#full_name').val();
		var locn = $('#location').val();
		var sxpectn = $('#salary_expectationid').val();
		var postn = $('#position').val();
		var candavail = $('#candidate_availability').val();
		var skillcomp = $('#skills_competences').val();
		var comts = $('#comments').val();
	//Aggregating entries from the candidate
		var cvdata = 'fname=' + fname + '&locn=' + locn + '&sxpectn=' + sxpectn + '&postn=' + postn + '&candavail=' + candavail + '&skillcomp=' + skillcomp + '&alltechskill=' + alltechskill + '&comts=' + comts;
        $.ajax({
            type: "POST",
			url: "src/cvtemplate.php",
            data: cvdata
        })
        .done(function (successResult) {
			$('#closepreviewbtn').show();
	        $('#printpdfbtn').show();
			$('#cvpreview').prepend(successResult);
			$('#formjumbotronid').hide();
        })
		.fail(function(errorResult){
			alert('An Error Occured');
	    });
	   }
    });
	
	$('#closepreviewbtn').on('click', function () {
			$('#closepreviewbtn').hide();
	        $('#printpdfbtn').hide();
			$('#formjumbotronid').show();
			$('#tabletemplate').hide();
	});
	$('#printpdfbtn').click(function () {
		$(".tabletemplate").print({
        	globalStyles: true,
        	mediaPrint: false,
        	noPrintSelector: "#cvtemplatebtns",
        	iframe: true,
        	manuallyCopyFormValues: true,
        	deferred: $.Deferred(),
        	timeout: 750,
        	title: 'Online CV Builder PRO',
        	doctype: '<!doctype html>'
		});
     });
});
  </script>
 </body>
</html>
