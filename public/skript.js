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



window.onload = () => {
    validateInput(document.getElementById("name"), function (value = null) {
        if (value == null || value.length == 0) {
            return "Názov produktu musí byť zadaný";
        }
    });



    validateInput(document.getElementById("product_number"), function (value = null) {
        if (value == null || value.length == 0) {
            return "Číslo produktu musí byť zadané";
        }
        let re = new RegExp('^\\d*$');
        if (!re.test(value)) {
            return "Zadané Číslo produktu musí mať platný formát."
        }

    });


    validateInput(document.getElementById("price"), function (value = null) {
        if (value == null || value.length == 0) {
            return "Cena musí byť zadaná";
        }
        let re = new RegExp('^[0-9]+[,]+[0-9]{2}$');
        if (!re.test(value)) {
            return "Zadaná Cena nemá platný formát."
        }
    });


    validateInput(document.getElementById("price_withoutVAT"), function (value = null) {
        if (value == null || value.length == 0) {
            return "Cena bez DPH musí byť zadaná";
        }
        let re = new RegExp('^[0-9]+[,]+[0-9]{2}$');
        if (!re.test(value)) {
            return "Zadaná Cena bez DPH nemá platný formát."
        }
    });


    validateInput(document.getElementById("amount"), function (value = null) {
        if (value == null || value.length == 0) {
            return "Počet kusov musí byť zadaný";
        }
        let re = new RegExp('^[0-9]+$');
        if (!re.test(value)) {
            return "Zadaný Počet kusov nemá platný formát."
        }
    });

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









