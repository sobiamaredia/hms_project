/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


jQuery.fn.validate = function(rules){
    var rules_array = rules.split("|");
    
    for(var i in rules_array){
        func = funcname = rules_array[i];
        param = null;
        if(func.indexOf('[') > 0){
            start_index = func.indexOf('[');
            end_index = func.indexOf(']');
            
            funcname = func.substr(0,start_index);
            
            param = func.substr(start_index+1,end_index-start_index-1);
        }
        if(!$(this)[funcname](param)){
            return false;
        }
    }
    return true;
}

jQuery.fn.required = function(){
    if($(this).val().length == 0){
        $(this)["ErrorMessage"]($(this).attr('name'), ' field is required.');
    //    alert('The ' + $(this).attr('name') + ' field is required.');
        return false;
    }
    return true;
}
jQuery.fn.checked = function(){
    if(!getCheckedValue(this)){
        $(this)["ErrorMessage"]($(this).attr('name'), ' field is required to be checked');
    //    alert('The ' + $(this).attr('name') + 'field is required to be checked');
        return false;
    }
    return true;
}
jQuery.fn.matches = function(element){
    if($(this).val() != "" && $(this).val() != $("[name="+element+"]").val()){
        $(this)["ErrorMessage"]($(this).attr('name'), ' field does not match the ' + element + ' field.');
    //    alert('The ' + $(this).attr('name') + ' field does not match the ' + element + ' field.');
        return false;
    }
    return true;
}
jQuery.fn.not_matches = function(element){
    if($(this).val() != "" && $(this).val() == $("[name="+element+"]").val()){
        $(this)["ErrorMessage"]($(this).attr('name'), ' field matches the ' + element + ' field.');
    //    alert('The ' + $(this).attr('name') + ' field does not match the ' + element + ' field.');
        return false;
    }
    return true;
}
jQuery.fn.regex_match = function(regexp){
    alert($(this).val());
    if($(this).val() != "" && !$(this).val().match(regexp)){
        $(this)["ErrorMessage"]($(this).attr('name'), ' field must contain a valid input.');
        return false;
    }
    return true;
}
jQuery.fn.min_length = function(length){
    if($(this).val() != "" &&  $(this).val().length < length){
        $(this)["ErrorMessage"]($(this).attr('name'), ' field must be at least ' + length + ' characters in length.');
    //    alert('The ' + $(this).attr('name') + ' field must be at least ' + length + ' characters in length.');
        return false;
    }
    return true;
}
jQuery.fn.max_length = function(length){
    if($(this).val() != "" && $(this).val().length > length){
        $(this)["ErrorMessage"]($(this).attr('name'), ' field can not exceed ' + length + ' characters in length.');
    //    alert('The ' + $(this).attr('name') + ' field can not exceed ' + length + ' characters in length.');
        return false;
    }
    return true;
}
jQuery.fn.exact_length = function(length){
    if($(this).val() != "" &&  $(this).val().length != length){
        $(this)["ErrorMessage"]($(this).attr('name'), ' field must be exactly %s characters in length.');
    //  alert('The ' + $(this).attr('name') + ' field must be exactly %s characters in length.');
        return false;
    }
    return true;
}

jQuery.fn.greater_than = function(value){
    if($(this).val() != "" && !numeric(this) || $(this).val() > value){
        $(this)["ErrorMessage"]($(this).attr('name'), ' field must contain a number greater than ' + value + '.');
    //    alert('The ' + $(this).attr('name') + ' field must contain a number greater than %s.');
        return false;
    }
    return true;
}
jQuery.fn.less_than = function(value){
    if($(this).val() != "" && !numeric(this) || $(this).val() < value){
        $(this)["ErrorMessage"]($(this).attr('name'), ' field must contain a number less than ' + value + '.');
    //    alert('The ' + $(this).attr('name') + ' field must contain a number less than %s.');
        return false;
    }
    return true;
}

jQuery.fn.alpha = function(){
    regexp = /^([a-z])+$/i;
    if($(this).val() != "" && !$(this).val().match(regexp)){
        $(this)["ErrorMessage"]($(this).attr('name'), ' field may only contain alphabetical characters.');
    //    alert('The ' + $(this).attr('name') + ' field may only contain alphabetical characters.');
        return false;
    }
    return true;
}
jQuery.fn.alpha_dash = function(){
    regexp = /^([-a-z_-])+$/i;
    if($(this).val() != "" && !$(this).val().match(regexp)){
        $(this)["ErrorMessage"]($(this).attr('name'), ' field may only contain alphabetical characters, dash and underscore.');
    //    alert('The ' + $(this).attr('name') + ' field may only contain alphabetical characters, dash and underscore');
        return false;
    }
    return true;
}
jQuery.fn.alpha_space = function(){
    regexp = /^([a-z\s])+$/i;
    if($(this).val() != "" && !$(this).val().match(regexp)){
        $(this)["ErrorMessage"]($(this).attr('name'), ' field may only contain alphabetical characters and spaces.');
    //    alert('The ' + $(this).attr('name') + ' field may only contain alphabetical characters and spaces');
        return false;
    }
    return true;
}
jQuery.fn.alpha_dash_space = function(){
    regexp = /^([a-z\s_-])+$/i;
    if($(this).val() != "" && !$(this).val().match(regexp)){
        $(this)["ErrorMessage"]($(this).attr('name'), ' field may only contain alphabetical characters, dash, underscore and spaces.');
    //    alert('The ' + $(this).attr('name') + ' field may only contain alphabetical characters, dash, underscore and spaces');
        return false;
    }
    return true;
}

jQuery.fn.alpha_numeric = function(){
    regexp = /^([a-z0-9])+$/i;
    if($(this).val() != "" &&  !$(this).val().match(regexp)){
        $(this)["ErrorMessage"]($(this).attr('name'), ' field may only contain alpha-numeric characters.');
    //    alert('The ' + $(this).attr('name') + ' field may only contain alpha-numeric characters.');
        return false;
    }
    return true;
}
jQuery.fn.alpha_numeric_dash = function(){
    regexp = /^([a-z0-9_-])+$/i;
    if($(this).val() != "" && $(this).val() != "" && !$(this).val().match(regexp)){
        $(this)["ErrorMessage"]($(this).attr('name'), ' field may only contain alpha-numeric characters, dash and underscore.');
    //    alert('The ' + $(this).attr('name') + ' field may only contain alpha-numeric characters, dash and underscore');
        return false;
    }
    return true;
}
jQuery.fn.alpha_numeric_space = function(){
    regexp = /^([a-z0-9\s])+$/i;
    if($(this).val() != "" && !$(this).val().match(regexp)){
        $(this)["ErrorMessage"]($(this).attr('name'), ' field may only contain alpha-numeric characters and spaces.');
    //    alert('The ' + $(this).attr('name') + ' field may only contain alpha-numeric characters and spaces');
        return false;
    }
    return true;
}
jQuery.fn.alpha_numeric_dash_space = function(){
    regexp = /^([a-z0-9\s_-])+$/i;
    if($(this).val() != "" && !$(this).val().match(regexp)){
        $(this)["ErrorMessage"]($(this).attr('name'), ' field may only contain alpha-numeric characters, dash, underscore and spaces.');
    //    alert('The ' + $(this).attr('name') + ' field may only contain alpha-numeric characters, dash, underscore and spaces');
        return false;
    }
    return true;  
}
jQuery.fn.alpha_first = function(){
    regexp = /^([a-z])+/i;
    if($(this).val() != "" && !$(this).val().match(regexp)){
        $(this)["ErrorMessage"]($(this).attr('name'), ' field may only starts with alphabetical character.');
    //    alert('The ' + $(this).attr('name') + ' field may only starts with alphabetical character');
        return false;
    }
    return true;
}
jQuery.fn.equal = function(value){
    if($(this).val() != "" && $(this).val().toLowerCase() != value.toLowerCase()){
        $(this)["ErrorMessage"]($(this).attr('name'), ' field may only be \'' + value + '\'.');
    //    alert('The ' + $(this).attr('name') + ' field may only be \'' + value + '\'');
        return false;
    }
    return true;
}
jQuery.fn.iequal = function(value){
    if($(this).val() != "" && $(this).val() != value){
        $(this)["ErrorMessage"]($(this).attr('name'), ' field may only be \'' + value + '\'.');
    //    alert('The ' + $(this).attr('name') + ' field may only be \'' + value + '\'');
        return false;
    }
    return true;
}
jQuery.fn.not_equal = function(value){
    if($(this).val() != "" && $(this).val() != "" && $(this).val().toLowerCase() == value.toLowerCase()){
        $(this)["ErrorMessage"]($(this).attr('name'), ' field may not be equal to \'' + value + '\'.');
    //    alert('The ' + $(this).attr('name') + ' field may not be equal to \'' + value + '\'');
        return false;
    }
    return true;
}
jQuery.fn.not_iequal = function(value){
    if($(this).val() != "" && $(this).val() == value){
        $(this)["ErrorMessage"]($(this).attr('name'), ' field may not be equal to \'' + value + '\'.');
    //    alert('The ' + $(this).attr('name') + ' field may not be equal to \'' + value + '\'');
        return false;
    }
    return true;
}

jQuery.fn.numeric = function(){
    regexp = /^[\-+]?[0-9]+\.[0-9]+$/;
    if($(this).val() != "" && !$(this).val().match(regexp)){
        $(this)["ErrorMessage"]($(this).attr('name'), ' field must contain only numbers.');
    //    alert('The ' + $(this).attr('name') + ' field must contain only numbers.');
        return false;
    }
    return true;
}
jQuery.fn.is_numeric = function(){
    if($(this).val() != "" && !((typeof(this) === 'number' || typeof(this) === 'string') && this !== '' && !isNaN(this))){
        $(this)["ErrorMessage"]($(this).attr('name'), ' field must contain only numeric characters.');
    //    alert('The ' + $(this).attr('name') + ' field must contain only numeric characters.')
        return false;
    }
    return true;
}
jQuery.fn.integer = function(){
    regexp = /^[\-+]?[0-9]+$/;
    if($(this).val() != "" && !$(this).val().match(regexp)){
        $(this)["ErrorMessage"]($(this).attr('name'), ' field must contain an integer.');
    //    alert('The ' + $(this).attr('name') + ' field must contain an integer.');
        return false;
    }
    return true;   
}
jQuery.fn.decimal = function(){
    regexp = /^[\-+]?[0-9]+\.[0-9]+$/;
    if($(this).val() != "" && !$(this).val().match(regexp)){
        $(this)["ErrorMessage"]($(this).attr('name'), ' field must contain a decimal number.');
    //    alert('The ' + $(this).attr('name') + ' field must contain a decimal number.');
        return false;
    }
    return true; 
}

jQuery.fn.is_natural = function(){
    regexp = /^[0-9]+$/;
    if($(this).val() != "" && !$(this).val().match(regexp)){
        $(this)["ErrorMessage"]($(this).attr('name'), ' field must contain only positive numbers.');
    //    alert('The ' + $(this).attr('name') + ' field must contain only positive numbers.');
        return false;
    }
    return true; 
}
jQuery.fn.is_natural_no_zero = function(){
    if($(this).val() != "" && $(this).val() == 0){
        $(this)["ErrorMessage"]($(this).attr('name'), ' field must contain only positive numbers.');
    //    alert('The ' + $(this).attr('name') + ' field must contain only positive numbers.');
        return false;
    }
    return is_natural(this);
}

jQuery.fn.valid_email = function(){
    regexp = /^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/i;
    if($(this).val() != "" && !$(this).val().match(regexp)){
        $(this)["ErrorMessage"]($(this).attr('name'), ' field must contain a valid email address.');
    //    alert('The ' + $(this).attr('name') + ' field must contain a valid email address.');
        return false;
    }
    return true;
}
jQuery.fn.valid_emails = function(){

}

jQuery.fn.valid_ip = function(){

}

jQuery.fn.valid_CNIC = function(){
    regexp = /^\d{5}\-\d{7}\-\d{1}$/;
    if($(this).val() != "" && !(this).val().match(regexp)){
        $(this)["ErrorMessage"]($(this).attr('name'), ' field must contain value with a valid format i.e. XXXXX-XXXXXXX-X.');
        return false;
    }
    return true;
}
jQuery.fn.valid_OldNIC = function(){
    regexp = /^\d{3}\-\d{2}\-\d{6}$/;
    if($(this).val() != "" && !(this).val().match(regexp)){
        $(this)["ErrorMessage"]($(this).attr('name'), ' field must contain value with a valid format i.e. XXX-XX-XXXXXX.');
        return false;
    }
    return true;
}
jQuery.fn.valid_AKU_MR_No = function(){
    regexp = /^\d{3}\-\d{2}\-\d{2}$/;
    if($(this).val() != "" && !(this).val().match(regexp)){
        $(this)["ErrorMessage"]($(this).attr('name'), ' field must contain numeric value with a valid format i.e. XXX-XX-XX.');
        return false;
    }
    return true;
}
jQuery.fn.valid_OldSerialNumber = function(){
    regexp = /^\d{2}\-\d{3}\-\d{6}$/;
    if($(this).val() != "" && !(this).val().match(regexp)){
        $(this)["ErrorMessage"]($(this).attr('name'), ' field must contain value with a valid format i.e. XX-XXX-XXXXXX.');
        return false;
    }
    return true;
}

/*****************/
/* Error Message */
/*****************/
jQuery.fn.ErrorMessage = function(fieldname, error_message){
    var name = $("label[for="+fieldname+"]").html();
    
    if(name){
        alert('The \'' + name + '\' ' + error_message);
    }else{
        alert('The \'' + fieldname + '\' ' + error_message);        
    }
}

/********/
/* Function to check if any of the radio button in a group is checked or not */
/********/
function getCheckedValue(radioObj) {
    if(!radioObj){
        return "";
    }
    var radioLength = radioObj.length;
    if(radioLength == undefined){
        if(radioObj.checked){
            return radioObj.value;
        }else{
            return "";
        }
    }
    for(var i = 0; i < radioLength; i++) {
        if(radioObj[i].checked) {
            return radioObj[i].value;
        }
    }
    return "";
}


/*******/
/* Function to determine if the provided password is secure enough */
/*******/
function passwordStrength(password, passwordStrengthText, passwordStrengthContainer){
	var desc = new Array();
	desc[1] = "Very Weak";
	desc[2] = "Weak";
	desc[3] = "Better";
	desc[4] = "Medium";
	desc[5] = "Strong";
	desc[6] = "Strongest";

	var score   = 1;
	if (password.length > 6) score++;											//if password bigger than 6 give 1 point
	if ( ( password.match(/[a-z]/) ) && ( password.match(/[A-Z]/) ) ) score++;	//if password has both lower and uppercase characters give 1 point
	if (password.match(/\d+/)) score++;											//if password has at least one number give 1 point
	if ( password.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/) )	score++;			//if password has at least one special caracther give 1 point
	if (password.length > 12) score++;											//if password bigger than 12 give another 1 point
	
	if(password.length == 0){
		document.getElementById(passwordStrengthText).innerHTML = "Password not entered";
		document.getElementById(passwordStrengthContainer).className = "strength0";
	}else{
		document.getElementById(passwordStrengthText).innerHTML = desc[score];
		document.getElementById(passwordStrengthContainer).className = "strength" + score;
	}
}


/********************/
/* Regional Setting */
/********************/