function compare(){
    var i1, i2, err, err2;
    i1 = document.getElementById("pass");
    i2 = document.getElementById("confirm_pass");
    err = document.getElementById("pass_error");
    err2 = document.getElementById("pass_error2");

    if(i2.value.length < 5 && i2.value.length > 0){
        err2.style.display = "block";
    }

    else if(i2.value.length == 0){
        err.style.display = "none";
    }

    else{
        err2.style.display = "none";
    }


    if(i2.value != i1.value){
        i2.style.borderColor = "red";
        i1.style.borderColor = "red";
        err.style.display = "block";
    }

    else{
        i1.style.borderColor = "#00B9F7";
        i2.style.borderColor = "#00B9F7";
        err.style.display = "none";
    }
}

function compare2(){
    var i1, i2, err2;
    i1 = document.getElementById("pass");
    i2 = document.getElementById("confirm_pass");
    err2 = document.getElementById("pass_error");
    err = document.getElementById("pass_error2")
    input = document.getElementById
    if(i2.value != i1.value && i2.value.length > 0){
        i2.style.borderColor = "red";
        i1.style.borderColor = "red";
        err2.style.display = "block";
    }

    else{
        i1.style.borderColor = "#00B9F7";
        i2.style.borderColor = "#00B9F7";
        err2.style.display = "none";
    }

    if(i1.value.length < 5){
        err.style.display = "block";
    }

    else if(i1.value.length == 0){
        err.style.display = "none";
    }

    else{
        err.style.display = "none";
    }
}


//not used yet - maybe never
function toggle(){
    var pass = document.getElementById("pass");
    if(pass_field.type == 'password')
    {
        pass_field.type = 'text';
    }
    else{
        pass_field.type = 'password';
    }
}

function auto_select(){
var options = document.getElementById("lista-user").options;
options[0].selected = true;
}
