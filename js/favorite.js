/* Вподобання*/
function openbox(id){
    src = $("#favorite").attr("src");
    src = src.split('/')[1]; 
    if(src == 'favorite_off.png'){
        $(document).ready(function() {
          value = $("#favorite_value").attr("value");
        $.ajax({
            type: "post",
            url: 'profedit',
            data:{favor: value,statu_fav:"off"},
            success: function(result) {
                $("#favorite").attr("src","img/favorite_on.png");
            },
        });
    });       
    }else{
        $(document).ready(function() {
          value = $("#favorite_value").attr("value");
        $.ajax({
            type: "post",
            url: 'profedit',
            data:{favor: value,statu_fav:"on"},
            success: function(result) {
              $("#favorite").attr("src","img/favorite_off.png");
            },
        });
    });
    }
} 

$("#favorite").hover(function () {
    var src = document.getElementById('favorite').src;
    src = src.split('img/')[1]; 
    if(src == 'favorite_off.png'){
        $("#favorite").attr("src","img/favorite_on.png");
      }else{
        $("#favorite").attr("src","img/favorite_off.png");
    }
});