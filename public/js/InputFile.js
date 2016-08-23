    function readURL(input, id) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();         
            reader.onload = function (e) {
                $(id).attr('src', e.target.result);
            }          
            reader.readAsDataURL(input.files[0]);
        }
    }
    
    $("#imgInp").change(function(){
        readURL(this, "#blah");
    });
    
    $("#imgInpdesc").change(function(){
        readURL(this, "#blahdesc");
    });