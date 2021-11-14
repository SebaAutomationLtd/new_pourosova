$('[data="tooltip"]').tooltip();
$(".custom-file-input").on("change", function() {
    var fileName = $(this).val().split("\\").pop();
    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});
$('.summernote').summernote({
    height: 200
});