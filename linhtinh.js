$(document).ready(function()){
    $.ajax({
        type:'GET',
        url:'checklogin.php',
        dataType:'html',
        data:(catName:'Giáo dục'),
        success.function(data){
            $('#name').html(data);
        },
        error:function(){
            alert()
        }
    }
}