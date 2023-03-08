$(document).on("click", '[data-toggle="lightbox"]', function(event) {
    event.preventDefault();
    $(this).ekkoLightbox();
});
$("input[name='venue']").change(function() {
    if ($(this).val() == "yes") {
        $("#specify_venue_text").hide();
        $("#specify_venue_text").empty();
        $("#specify_venue_text").val('yes');
        $('#specify_venue_text').removeAttr('required');
    } else if ($(this).val() == "venue_value_no") {
        $("#specify_venue_text").show();
        $("#specify_venue_text").val('');
        $('#specify_venue_text').attr('required', true);
    }
})
$("input[name='caterer']").change(function() {
    if ($(this).val() == "yes") {
        $("#specify_caterer_text").hide();
        $("#specify_caterer_text").empty();
        $("#specify_caterer_text").val('yes');
        $('#specify_caterer_text').removeAttr('required');
    } else if ($(this).val() == "caterer_value_no") {
        $("#specify_caterer_text").show();
        $("#specify_caterer_text").val('');
        $('#specify_caterer_text').attr('required', true);
    }
})
$("input[name='audio_visual']").change(function() {
    if ($(this).val() == "yes") {
        $("#specify_audio_visual_text").hide();
        $("#specify_audio_visual_text").empty();
        $("#specify_audio_visual_text").val('yes');
        $('#specify_audio_visual_text').removeAttr('required');
    } else if ($(this).val() == "audio_visual_value_no") {
        $("#specify_audio_visual_text").show();
        $("#specify_audio_visual_text").val('');
        $('#specify_audio_visual_text').attr('required', true);
    }
})
$("input[name='concept']").change(function() {
    if ($(this).val() == "yes") {
        $("#specify_concept_text").hide();
        $("#specify_concept_text").empty();
        $("#specify_concept_text").val('yes');
        $('#specify_concept_text').removeAttr('required');
    } else if ($(this).val() == "concept_value_no") {
        $("#specify_concept_text").show();
        $("#specify_concept_text").val('');
        $('#specify_concept_text').attr('required', true);
    }
})
$(document).ready(function() { //DISABLED PAST DATES IN APPOINTMENT DATE
    var dateToday = new Date();
    var month = dateToday.getMonth() + 1;
    var day = dateToday.getDate();
    var year = dateToday.getFullYear();

    if (month < 10)
        month = '0' + month.toString();
    if (day < 10)
        day = '0' + day.toString();

    var maxDate = year + '-' + month + '-' + day;

    $('.chck').attr('min', maxDate);
});
$('.prevent_submit').on('submit', function() {
    $('.prevent_submit').attr('disabled', 'true');
});