

var username =   /(?=^.{4,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/;
var password =   /(?=^.{10,50}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/;                   
 
function validate(login){


var userName = login.username.value;
var passWord = login.password.value;
var errors = [];
 
 
if (!password.test(passWord)) {
  errors[errors.length] = "You must enter a valid Password.";
 }
 if (!username.test(userName)) {
  errors[errors.length] = "You valid name has no special char.";
 }
 if (errors.length > 0) {

  reportErrors(errors);
  return false;
 }
  return true;
}
function reportErrors(errors){
 var msg = "Please Enter Valide Data...\n";
 for (var i = 0; i<errors.length; i++) {
 var numError = i + 1;
  msg += "\n" + numError + ". " + errors[i];
}
 alert(msg);
}