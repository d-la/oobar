'use strict';

$(document).ready(function(){
    $('form#contact-submission').submit( (e) => {
        e.preventDefault();

        handleContactFormSubmission();
    });
    
    let handleContactFormSubmission = function(){
        const submitButton = $('button[type="submit"]');
        const privacyCheckbox = $('input[name="privacy"]');

        if ($(privacyCheckbox).is(':checked')){
            // Do nothing
        } else {
            const contactData = {
                firstName: $('input[name="firstName"]').val(),
                lastName: $('input[name="lastName"]').val(),
                email: $('input[type="email"]').val(),
                phoneNumber: $('input[name="phoneNumber"]').val(),
                message: $('textarea[name="message"]').val()
            };
    
            $.ajax({
                url: '/controllers/contact-submission.php',
                type: 'POST',
                data: contactData
            }).done( (response) => {
                let parsedResponse = JSON.parse(response);  
                console.log(parsedResponse);
    
                if (parsedResponse.response == true){
                    $(submitButton).removeClass('btn-gold').addClass('btn-success').text('Message Sent!');
                } else {
                    $(submitButton).removeClass('btn-gold').addClass('btn-danger').text('Error sending message!');
                }
    
                clearFormValues();
                // Should this event happen? Does UX suffer? 
                // setTimeout(setSubmitButtonToDefault, 3000);
    
            }).fail( (response) => {
                $(submitButton).removeClass('btn-gold').addClass('btn-danger').text('Error sending message!');
            });
        }
    };

    let clearFormValues = () => {
        let contactForm = $('form#contact-submission');
        
        $('form#contact-submission input, textarea').each(function(index){
            $(this).val('');
        });
    };

    let setSubmitButtonToDefault = () => {
        let submitButton = $('button[type="submit"');

        if ($(submitButton).hasClass('btn-danger')){
            $(submitButton).removeClass('btn-danger').addClass('btn-theme').text('Send Message');
        } else if ($(submitButton).hasClass('btn-green')){
            $(submitButton).removeClass('btn-green').addClass('btn-theme').text('Send Message');
        }
    };

    // Handle formatting the phone number correctly 
    $('input[name="phoneNumber"]').keyup(function() {
        $(this).val($(this).val().replace(/^(\d{3})(\d{3})(\d)+$/, "$1-$2-$3"));
    });

    // Check to make sure the phone numbers length isnt greater than 12. if it is show the error message 
    // before the user submits the form
    $('input[name="phoneNumber"]').on('propertychange change keyup input paste', () => {
        let phoneNumber = $('input[name="phoneNumber"]').val();

        if (phoneNumber.length > 12){
            $('span#phone-number-error').fadeIn();
        } else {
            $('span#phone-number-error').fadeOut();
        }
    });
});