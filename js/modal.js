$(document).ready(function() {  
    // render add brand modal
    $('.addbrand').click(function(e){
        e.preventDefault();
        $.get('../productbrand/create',function(data){
        $('#addbrand').modal('show')
             .find('#addbrandmodalContent')
         .html(data);
        });
    });

    // render add color modal
    $('.addcolor').Click(function(e){
        e.preventDefault();
        $.get('../productcolor/create',function(data){
            $('#addcolor').modal(show)
                .find('#addcolormodalContent')
                .html(data);
        });
    });

 });