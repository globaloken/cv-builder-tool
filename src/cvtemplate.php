<?php
/*
***************CV template file**********************
This file is updated by a remote ajax call from index.php
*/
if(confirm_ajax()){
 $fname = $_POST['fname'];
 $locn = $_POST['locn'];
 $sxpectn = $_POST['sxpectn'];
 $postn = $_POST['postn'];
 $candavail = $_POST['candavail'];
 $skillcomp = $_POST['skillcomp'];
 $alltechskill= $_POST['alltechskill'];
 $comts = $_POST['comts'];
 
 echo'
<table class="table" id="tabletemplate">
  <thead class="thead-dark">
    <td>
      <h4>Candidate CV</h4>
    </td>
  </thead>
  <tbody>
    <tr>
      <th scope="row">Full Name</th>
      <td>'.$fname.'</td>
    </tr>
    <tr>
      <th scope="row">Location</th>
      <td>'.$locn.'</td>
    </tr>
    <tr>
      <th scope="row">Expected Salary</th>
      <td>$ '.$sxpectn.'</td>
    </tr>
    <tr>
      <th scope="row">Position</th>
      <td>'.$postn.'</td>
    </tr>
	<tr>
      <th scope="row">Availability</th>
      <td>'.$candavail.'</td>
    </tr>
	<tr>
      <th scope="row">Skills and Competences</th>
      <td>'.$skillcomp.'</td>
    </tr>
	<tr>
      <th scope="row">Technical Skills</th>
      <td>'.$alltechskill.'</td>
    </tr>
	<tr>
      <th scope="row">Comments</th>
      <td>'.$comts.'</td>
    </tr>
  </tbody>
</table>';
}
// functions authenticates an ajax call
function confirm_ajax() {
  return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
}
?>