/*
document.addEventListener('DOMContentLoaded', function() {
    console.log('be-custom.js loaded');

    // Handle click event for fields with the class 'subscription-required'
    document.querySelectorAll('.subscription-required').forEach(function(element) {
        element.addEventListener('click', function(event) {
            event.preventDefault(); // Prevent any default action

            // Use Filament's notification API
            if (window.Filament) {
                window.Filament.notifications.notify({
                    title: 'Subscription Required',
                    message: 'Dieses Feld kann nur im Abomodell geändert werden.',
                    icon: 'heroicon-o-lock-closed',
                    color: 'danger',
                });
            } else {
                alert('Dieses Feld kann nur im Abomodell geändert werden.'); // Fallback
            }
        });
    });
});
*/


document.addEventListener('DOMContentLoaded', function() {
    console.log('be-custom.js loaded');

    // Handle click event for fields with the class 'subscription-required'
    document.querySelectorAll('.subscription-required').forEach(function(element) {
        element.addEventListener('click', function(event) {
            event.preventDefault(); // Prevent any default action

            // Trigger the custom event to open the modal
            window.dispatchEvent(new CustomEvent('subscription-required'));
        });
    });
});


document.addEventListener('DOMContentLoaded', function () {
    function toggleFields() {
        var selection = document.querySelector('[wire\\:model="data.settings.colorSelectMode"]').value;
        var colorPickerFields = ['#gradientColorTop', '#gradientColorBottom'];
        var websiteField = '#websiteScreenshot';

        if (selection === 'color_picker') {
            colorPickerFields.forEach(function (field) {
                document.querySelector(field).closest('.filament-forms-field-wrapper').style.display = 'block';
            });
            document.querySelector(websiteField).closest('.filament-forms-field-wrapper').style.display = 'none';
        } else if (selection === 'screenshot') {
            colorPickerFields.forEach(function (field) {
                document.querySelector(field).closest('.filament-forms-field-wrapper').style.display = 'none';
            });
            document.querySelector(websiteField).closest('.filament-forms-field-wrapper').style.display = 'block';
        }
    }

    // Initial call to set the correct fields on page load
    toggleFields();

    // Add event listener for changes in the select field
    document.querySelector('[wire\\:model="data.settings.colorSelectMode"]').addEventListener('change', toggleFields);
});
