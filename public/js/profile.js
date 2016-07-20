// Clear event
$('.image-preview-clear').click(function(){
    $('.image-preview-filename').val("");
    $('.image-preview-clear').hide();
    $('.image-preview-input input:file').val("");
    $(".image-preview-input-title").text("Browse"); 
}); 

// Create the preview image
$(".image-preview-input input:file").change(function (){     
    var file = this.files[0];
    var reader = new FileReader();
    reader.readAsDataURL(file);
    // Set preview image into the popover data-content
    reader.onload = function (e) {
        $(".image-preview-input-title").text("Change");
        $(".image-preview-clear").show();
        $(".image-preview-filename").val(file.name);    
    }        
});  