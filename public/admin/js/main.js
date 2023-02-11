$(function () {
    $("#post_type").change(function () {
        $value = $(this).val();
        if($value == 0){
            $(".only-show").css('display' , "none");
        }else{
            $(".only-show").css('display' , "block");
        }
    })
});























