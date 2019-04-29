//Some Helper functions

function reportErrors(errors) {
    var msg = "There were some problems...\n";
    for (var i = 0; i<errors.length; i++) {
    var numError = i + 1;
                msg += "\n" + numError + ". " + errors[i];
            }
            window.alert(msg);  
}

function apptValidate() {
    var reFirstName = /^([A-Za-z']+ )*[A-Za-z']+$/;
    var reLastName = /^([A-Za-z']+ )*[A-Za-z']+$/;
    var reEmail = /^(\w+[\-\.])*\w+@(\w+\.)+[A-Za-z]+$/;
    var reAddress = /^[a-zA-Z\s\d\/]*\d[a-zA-Z\s\d\/]*$/;
    var reCity = /^([A-Za-z']+ )*[A-Za-z']+$/;
    var reState = /^[A-Z]{2}$/;
    var reZip = /^\d{5}(\-\d{4})?$/;
    var rePhone = /^(1\s*[-\/\.]?)?(\((\d{3})\)|(\d{3}))\s*[-\/\.]?\s*(\d{3})\s*[-\/\.]?\s*(\d{4})\s*(([xX]|[eE][xX][tT])\.?\s*(\d+))*$/;
    var rePetName = /^([A-Za-z']+ )*[A-Za-z']+$/;
      
    var firstname = $('#firstname').val();
    var lastname =  $('#lastname').val();
    var email =  $('#email').val();
    var address =  $('#address').val();
    var city =  $('#city').val();
    var state =  $('#state').val();
    var zip =  $('#zip').val();
    var phone =  $('#phone').val();
    var typeofpet =  $('#typeofpet').val();
    var breed = $('#breed').val();
    var petname =  $('#petname').val();
    var errors =[];
   
  if (!reEmail.test(email)) {
            errors[errors.length] = 'You must enter a valid email address.';
        }

   if (!reFirstName.test(firstname)) {
            errors[errors.length] = 'You must enter a valid  first name.';
        }

   if (!reLastName.test(lastname)) {
        errors[errors.length] = 'You must enter a valid last name.';
        }

    if (!reCity.test(city)) {
        errors[errors.length] = 'You must enter a city.';
        }  
        
    if (!reAddress.test(address)) {
            errors[errors.length] = 'You must enter an address.';
        }
            
   if (!reState.test(state)) {
            errors[errors.length] = 'You must enter valid State abbreviation.';
        }
        
    if (!reZip.test(zip)) {
            errors[errors.length] = 'You must enter a valid zip code.';
        }
        
   if (!rePhone.test(phone)) {
            errors[errors.length] = 'You must enter a valid phone number.';
        }
    
   if (!rePetName.test(petname)) {
            errors[errors.length] = 'You must enter your pets name.';
        }
        
   if (errors.length > 0) {    
        reportErrors(errors);
        return false; 
    } 
    
    return true;
}
 
 
function contactValidate() {
    var reFirstName = /^([A-Za-z']+ )*[A-Za-z']+$/;
    var reLastName = /^([A-Za-z']+ )*[A-Za-z']+$/;
    var reEmail = /^(\w+[\-\.])*\w+@(\w+\.)+[A-Za-z]+$/; 
      
    var firstname = $('#firstname').val();
    var lastname =  $('#lastname').val();
    var email =  $('#email').val();
    var text = $('#comments').val();
    var errors =[];
   
  if (!reEmail.test(email)) {
            errors[errors.length] = 'You must enter a valid email address.';
        }

   if (!reFirstName.test(firstname)) {
            errors[errors.length] = 'You must enter a valid firstname.';
        }

   if (!reLastName.test(lastname)) {
        errors[errors.length] = 'You must enter a valid lastname.';
        }
    
    if (text == ''){
        errors[errors.length] = 'You must enter a message!';
    }
    
            
   if (errors.length > 0) {    
        reportErrors(errors);
        return false; 
    } 
    
    return true;
}



