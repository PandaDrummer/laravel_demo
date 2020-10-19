$(".burger").click(function(){
    $(".nav-links").toggleClass("nav-active");
    $(".line1").toggleClass("line1-toggle");
    $(".line2").toggleClass("line2-toggle");
    $(".line3").toggleClass("line3-toggle");
});
$('#btn_up').click(function (){
     var val = $('#select_kg_val').val();
     val++;
    $('#select_kg_val').val(val);
})
$('#btn_down').click(function (){
    var val = $('#select_kg_val').val();
    if(val != 1){
        val= val-1;
        var val = $('#select_kg_val').val(val);
    }
})
$('.modal_select_shape_close').click(function() {
    $(".modal_select_shape").css({
        "display": "none"
    });
    $(".modal_select_filling").css({
        "display": "none"
    });
    $(".modal_select_decoration").css({
        "display": "none"
    });
});
$('.select_shape').click(function() {
    $(".modal_select_shape").css({
        "display": "block"
    });
});
$('.select_filling').click(function() {
    $(".modal_select_filling").css({
        "display": "block"
    });
});
$('.select_decoration').click(function() {
    $(".modal_select_decoration").css({
        "display": "block"
    });
});


