
function validateName() {
    const nameInput = document.getElementById("name");
    const name = nameInput.value.trim(); // remove leading/trailing whitespace
    const nameError = document.getElementById("name-error");

    // Check if name contains only letters and spaces
    if (!/^[a-zA-Z\s]+$/.test(name)) {
        nameInput.classList.add("invalid");
        nameError.textContent = "Please enter a valid name (letters and spaces only)";
    } else {
        nameInput.classList.remove("invalid");
        nameError.textContent = "";
    }
}

function validateContact() {
    const contactInput = document.getElementById("contact");
    const contact = contactInput.value.trim(); // remove leading/trailing whitespace
    const contactError = document.getElementById("contact-error");

    // Check if contact number is valid
    if (!/^\+?\d{8,15}$/.test(contact)) {
        contactInput.classList.add("invalid");
        contactError.textContent =
            "Please enter a valid contact number (11 digits only)";
    } else {
        contactInput.classList.remove("invalid");
        contactError.textContent = "";
    }
}

function validateContactPerson() {
    const contactpersonInput = document.getElementById("contactperson");
    const contactperson = contactpersonInput.value.trim(); // remove leading/trailing whitespace
    const contactpersonError = document.getElementById("cp-error");

    // Check if name contains only letters and spaces
    if (!/^[a-zA-Z\s]+$/.test(contactperson)) {
        contactpersonInput.classList.add("invalid");
        contactpersonError.textContent = "Please enter a valid name (letters and spaces only)";
    } else {
        contactpersonInput.classList.remove("invalid");
        contactpersonError.textContent = "";
    }
}

function validateContactPersonNum() {
    const ContactPersonNumInput = document.getElementById("ContactPersonNum");
    const ContactPersonNum = ContactPersonNumInput.value.trim(); // remove leading/trailing whitespace
    const ContactPersonNumError = document.getElementById("ContactPersonNum-error");

    // Check if contact number is valid
    if (!/^\+?\d{8,15}$/.test(ContactPersonNum)) {
        ContactPersonNumInput.classList.add("invalid");
        ContactPersonNumError.textContent =
            "Please enter a valid contact number (11 digits only)";
    } else {
        ContactPersonNumInput.classList.remove("invalid");
        ContactPersonNumError.textContent = "";
    }
}

function validateAddress() {
    const addressInput = document.getElementById("address");
    const address = addressInput.value.trim(); // remove leading/trailing whitespace
    const addressError = document.getElementById("address-error");

    // Check if address is empty or too short
    if (address.length === 0) {
        addressInput.classList.add("invalid");
        addressError.textContent = "Please enter your address";
    } else {
        addressInput.classList.remove("invalid");
        addressError.textContent = "";
    }
}

function validateEmail() {
    const emailInput = document.getElementById("email");
    const email = emailInput.value.trim(); // remove leading/trailing whitespace
    const emailError = document.getElementById("email-error");

    // Check if email is empty or invalid
    if (email.length === 0) {
        emailInput.classList.add("invalid");
        emailError.textContent = "Please enter your email address";
    } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
        emailInput.classList.add("invalid");
        emailError.textContent = "Please enter a valid email address";
    } else {
        emailInput.classList.remove("invalid");
        emailError.textContent = "";
    }
}

function validateEventName() {
    const EventnameInput = document.getElementById("Eventname");
    const Eventname = nameInput.value.trim(); // remove leading/trailing whitespace
    const EventnameError = document.getElementById("event-error");

    // Check if name contains only letters and spaces
    if (!/^[a-zA-Z\s]+$/.test(name)) {
        EventnameInput.classList.add("invalid");
        EventnameError.textContent = "Please enter a valid name (letters and spaces only)";
    } else {
        EventnameInput.classList.remove("invalid");
        EventnameError.textContent = "";
    }
}
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