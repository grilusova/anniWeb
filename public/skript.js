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


function fileValidation(){
    var filesInput = document.getElementById('image');
    var files = filesInput.files;
    var allowedExtensions = /(\.jpg|\.jpeg|\.png)$/i;
    var pom = 0;

    for(var i=0;i<files.length;i++){
        var filename = files[i].name;
        var extension = filename.substr(filename.lastIndexOf("."));
        var isAllowed = allowedExtensions.test(extension);
        if(isAllowed){
           pom++;
        }
    }

    if(pom != files.length){
        alert('Zvolte si subor tychto typov: .jpeg/.jpg/.png');
        filesInput.value = '';
        return false;
    }
}


class Comment{

    addReview(){
        let text = document.getElementById("text").value;
        let id = document.getElementById("id").value;


        if(text.length < 3){
            alert("Review is too short!");
            return;
        }

        fetch("?c=home&a=addReview", {
            method: 'POST',
            headers: {
                 'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: "text=" + text +
                "&id=" + id
        });

    }

    getAllComments(){
        fetch('?a=getAllComments')
            .then(response => response.json())
            .then(data => {
                let html = "";
                let pom = 1;
                for (let comment of data){
                    if(document.getElementById("productidreview").value == comment.product_id) {
                        html += "<tr>";
                        html += "<td class=\"riadok\">" + pom + "</td>";
                        html += "<td class=\"riadok\">" + comment.text + "</td>";
                        html += "</tr>";
                        pom++;
                    }

                }
                document.getElementById("commentbox").innerHTML = html;
            });
    }

    startCommentsReloading(){
        setInterval(()=> {
            this.getAllComments()
        }, 1000)
    }
}

window.onload = function (){
    var comment = new Comment();

    comment.getAllComments();
    comment.startCommentsReloading();

    document.getElementById("reviewOdoslat").onclick = () => {
        comment.addReview();
    }
}





