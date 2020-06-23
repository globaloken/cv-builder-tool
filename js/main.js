function validateForm(){

var error = 0;
			
  if($('#full_name').val() == '' ){
	$('#full_name').focus();
	error = 1;
}
			
  if($('#location').val() == ''){
	$('#location').focus();
	error = 1;
}

  if($('#salary_expectationid').val() == ''){
	$('#salary_expectationid').focus();
	error = 1;
}

  if($('#position').val() == ''){
	$('#position').focus();
	error = 1;
}

  if($('#candidate_availability').val() == ''){
	$('#candidate_availability').focus();
	error = 1;
}

  if($('#skills_competences').val() == ''){
	$('#skills_competences').focus();
	error = 1;
}


return error;
}
