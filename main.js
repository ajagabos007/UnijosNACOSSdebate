function validateForm(){

    var name = document.getElementById('name').value;
    var mat_no = document.getElementById('mat_no').value;
    var phone_number = document.getElementById('phone_number').value;
    var now = new Date();
    now.setSeconds( now.getSeconds() + 3);

    var result;
    re = new RegExp('[a-zA-Z0-9]{3}');
    result = re.exec(name);
    if(result===null){
        document.cookie="nameError="+"Name error...! at least 3 character expected;expires=" + now.toUTCString() + ";";
    }
    re = new RegExp( "^UJ\/[0-9]{4}\/ns\/[0-9]{4}$", "i" );
    result = re.exec(mat_no);
    if(result===null){
        document.cookie="mat_noError="+"Wrong mat. No...! format: uj/1234/ns/1234;expires=" + now.toUTCString() + ";";
    }

    re =new RegExp('^0[0-9]{10}$');
    result = re.exec(phone_number);
    if(result===null){
        document.cookie="numberError="+"Error phone number not correct..! ;expires=" + now.toUTCString() + ";"; 
    }
    var name_error = document.getElementById('name_error');
    var mat_no_error= document.getElementById('mat_no_error');
    var phone_number_error = document.getElementById('phone_number_error');

    if(name_error.childElementCount){
        name_error.removeChild(name_error.firstChild);
    }
    if(mat_no_error.childElementCount){
        mat_no_error.removeChild(mat_no_error.firstChild);

    }
    if(phone_number_error.childElementCount){
        phone_number_error.removeChild(phone_number_error.firstChild);

    }
   
        var allcookies = document.cookie;
        // Get all the cookies pairs in an array
         cookiearray = allcookies.split(';');
         // Now take key value pair out of this array
        for(var i=0; i<cookiearray.length-1; i++){
            name = cookiearray[i].split('=')[0];
            value = cookiearray[i].split('=')[1];

            if(name=="nameError"){
                error_para = document.createElement('p');
                error_para.innerHTML=(value);
                name_error.appendChild(error_para);
            }
            if(name=="mat_noError"){
                error_para = document.createElement('p');
                error_para.innerHTML=(value);
                mat_no_error.appendChild(error_para);
            }
            if(name=="numberError"){
                error_para = document.createElement('p');
                error_para.innerHTML=(value);
                phone_number_error.appendChild(error_para);
            }
            
        }

         /*
         check length of cookiearray if errors is saved as cookies
         return true if no error exist
         else proceed to dispay error and return false
         */
        if(name_error.childElementCount||mat_no_error.childElementCount||phone_number_error.childElementCount)
            return false;
        return true;
    
}