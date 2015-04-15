$( document ).ready(function() {

    //Apply the jqBootstrapValidation plugin to the elements you want validation applied to
    $(function () { $("input,select,textarea").not("[type=submit]").jqBootstrapValidation(
        {
            preventSubmit: true,
            submitError: function($form, event, errors) {
                // Here I do nothing, but you could do something like display
                // the error messages to the user, log, etc.
            },
            submitSuccess: function($form, event) {
                alert("OK");
                event.preventDefault();
            },
            filter: function() {
                return $(this).is(":visible");
            }
        }
    ); } );

    setDatePicker();
    /**
     * For signup page
     * [setDatePicker description]
     */
    function setDatePicker()
    {
        /*DatePicker*/
        $('#birthday').datepicker({
            autoclose: true,
            todayHighlight: true ,
            format: 'mm-dd-yyyy',
            endDate: '+0d'
        });
    }
});