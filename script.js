$(document).ready(function () {
    $('#example').DataTable({
        lengthMenu: [
            [5, 10, -1],
            [5, 10, 'All'],
        ],
        pagingType: 'simple'
    });
});



// add popup modal function 
var addBtn = document.getElementById("addBtn-modal");

var cancelBtn = document.getElementById("cancel");

var modal = document.getElementById("modal");


addBtn.onclick = function(){
    modal.style.display = "block";
}

cancelBtn.onclick = function(){
    modal.style.display = "none";
}

window.onclick = function(event){
    if(event.target == modal){
        modal.style.display = "none";
    }
}

