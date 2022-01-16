function validateInput(element, validationFunction) {
    element.oninput = function (event) {
        let result = validationFunction(event.target.value);

        let erId = "er-" + element.id;
        let errorEle = document.getElementById(erId);

        if (result != null) {
            if (errorEle == null) {
                errorEle = document.createElement("div")
                errorEle.classList.add("error");
                errorEle.id = erId;
            }
            errorEle.innerText = result;
            element.after(errorEle);
            element.parentElement.classList.add("has-error");
        } else {
            errorEle?.remove()
            element.parentElement.classList.remove("has-error");
        }
        checkFormState();
    }
     element.dispatchEvent(new Event('input'));
}



function checkFormState() {
    if (document.querySelectorAll(".error").length == 0) {
        document.getElementById("submit").disabled = false;
        document.getElementById("submit-info").style.display = "none";
    } else {
        document.getElementById("submit").disabled = true;
        document.getElementById("submit-info").style.display = "block";
    }
}


 function showHint(){
     var element = document.getElementById('otazka');
     if(element.style.display == 'none'){
         element.style.display = 'block';
    }else{
        element.style.display = 'none';
     }
 }

function showHint2(){
    var element = document.getElementById('otazka2');
    if(element.style.display == 'none'){
        element.style.display = 'block';
    }else{
        element.style.display = 'none';
    }
}

function showHint3(){
    var element = document.getElementById('otazka3');
    if(element.style.display == 'none'){
        element.style.display = 'block';
    }else{
        element.style.display = 'none';
    }
}

function showHint4(){
    var element = document.getElementById('otazka4');
    if(element.style.display == 'none'){
        element.style.display = 'block';
    }else{
        element.style.display = 'none';
    }
}

function showHint5(){
    var element = document.getElementById('otazka5');
    if(element.style.display == 'none'){
        element.style.display = 'block';
    }else{
        element.style.display = 'none';
    }
}


function clickme(smallimg){
    var fullimg = document.getElementById('MainImg');
    fullimg.src = smallimg.src;
}








