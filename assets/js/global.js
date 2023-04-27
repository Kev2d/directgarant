AOS.init();

$('.wpcf7 input, .wpcf7 textarea').on('keyup change blur', function () {
    const ariaValue = $(this).attr("aria-invalid");
    if (ariaValue === 'true') {
        $(this).css('border', '2px solid #F1F3F9');
    } else if ($(this).val() !== '') {
        $(this).css('border', '2px solid #2f6fed');
    } else {
        $(this).css('border', '2px solid #F1F3F9');
    }
});

$('.wpcf7 input[type=file]').on('keyup change blur', function () {
    const dataType = $(this).attr('data-type');
    const arr = dataType.split('|');
    const thisFileType = $(this).get(0).files[0].name;
    const thisFileTypeSplit = thisFileType.split('.').pop();
    if ($(this).get(0).files.length === 0) {
        $(this).next('.codedropz-upload-handler').css('border', '2px solid #F1F3F9');
    } else if (arr.includes(thisFileTypeSplit) && $(this).get(0).files.length !== 0) {
        $(this).next('.codedropz-upload-handler').css('border', '2px solid #2f6fed');
    } else {
        $(this).next('.codedropz-upload-handler').css('border', '2px solid #F1F3F9');
    }
});