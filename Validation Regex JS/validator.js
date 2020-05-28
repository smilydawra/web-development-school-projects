
var Validator = function(){
	this.errors = [];
}

Validator.prototype.validateEmail = function(email){
	var pattern = /^[\w]{1,32}(\.[\w]{1,32}){0,2}@[\w]{1,32}\.[a-z]{2,10}$/;

	//return (email.match(pattern) !== null) ? true : false ;

	//var matches = email.match(pattern);

	// if(matches[0] === email){
	// 	return true;
	// }else {
	// 	return false;
	// }

	if(email.match(pattern) === null){
		this.errors.push('**Please a valid email address.');
	}


} // end prototype validateEmail

Validator.prototype.validateString = function(str) {
	var pattern = /^\S[\w\s\'\-]{1,255}(?!\@|\*|\$|\#)$/;

	if(str.match(pattern) === null){
		this.errors.push('<br/>**Please enter a valid string.<br/>(string can only contain letters, numbers,apostrophes and dashes. - no specail characters like @, $, *,#)');
	}
}

Validator.prototype.validatePhone = function(num) {
	var pattern = /^(\([0-9]{3}\)|[0-9]{3})(\s|\.|\-)([0-9]{3})(\-|\.)([0-9]{4})$/;

	if(num.match(pattern) === null){
		this.errors.push('<br/>**Phone number can only be specified, as examples below: <br/> (204) 555-1212 <br/> 204.444.2323 <br/> 204-555-3434');
	}
}

Validator.prototype.validatePostal = function(code) {
	var pattern = /^[a-zA-Z]{1}[0-9]{1}[a-zA-z]{1}\s[0-9]{1}[a-zA-Z]{1}[0-9]{1}$/;

	if(code.match(pattern) === null){
		this.errors.push('<br/>**Please enter valid postal code(eg. R3C 0E8).');
	}
}

Validator.prototype.validateUrl = function(entry) {
	var pattern = /^(http:\/\/|https:\/\/){1}[\w\.]{1,100}$/;

	if(entry.match(pattern) === null){
		this.errors.push('<br/>**Please enter valid URL(eg. https://www.abc.com or http://www.abc.com.');
	}
}

Validator.prototype.validateAge = function(num) {
	var pattern = /^\S[0-9]{1,1}(?![a-zA-Z])$/;

	if(num.match(pattern) === null){
		this.errors.push('<br/>**Please enter valid age.');
	}
}
