var input = $('#input');
var verif = $('#verif');
// var input2 = $('#input2');
// var verif2 = $('#verif2');

function add() {
    $.ajax({
        url : 'testpseudo.php',
        type : 'GET',
        dataType : 'html',
        data : 'pseudo=' + input.val(),
        success : function(test){ 
            console.log(test);
            if(test == "1"){
                verif.html("Pseudo indisponible");
            }else if(test == "3"){
                verif.html("");
            }else{
                verif.html("Pseudo disponible");
            }
        },
        error : function(){
        }
    });
}

// function addville() {
//     $.ajax({
//         url : 'php/index2.php',
//         type : 'GET',
//         dataType : 'html',
//         data : 'ville=' + input2.val(),
//         success : function(test2){ 
//                 verif2.html(test2);
//         },
//         error : function(){
//         }
//     });
// }