$(document).ready(function() {
    $('#example').DataTable();
    
    //SMS Character Counting
    var $remaining = $('#remaining'),
        $messages = $remaining.next();

    function count(field) {
        var thaiChar = false;
        var countChar = 160;
        for (var i = 0; i < field.value.length; i++) {
            var charValue = field.value.charCodeAt(i);
            if (charValue >= 3585 && charValue <= 3711) {
                thaiChar = true;
                break;
            }
        }
        if (thaiChar) {
            countChar = 70;
        }
        var chars = field.value.length,
            messages = Math.ceil(chars / countChar),
            remaining = messages * countChar - (chars % (messages * countChar) || messages * countChar);

        if (chars <= 0) {
            remaining = countChar;
            messages = 1;
        }

        $remaining.text(remaining + ' characters remaining');
        $messages.text(messages + ' message(s)');
    };

    $('#inputMessage').val(function() {
        if (this.value.length >= 0) {
            count(this);
        }
        return this.value;
    });


    $('#inputMessage').keyup(function() {
        count(this);
    });
    
    // SMS Form
    
    $('#sms-form :input:not([name=send-checkbox])').prop("disabled", true);
	$("#send-checkbox").click(function(){
        if($(this).prop("checked") == true){
            $('#sms-form :input:not([name=send-checkbox])').prop("disabled", false);
        }
        else if($(this).prop("checked") == false){
            $('#sms-form :input:not([name=send-checkbox])').prop("disabled", true);
            // $('#sms-form :input:not([name=send-checkbox])').val('');
        }
    });
    
    $("#sms-select-template").change(function(){
        var selectedTemplate = $("#sms-select-template option:selected").val();
        if(selectedTemplate == "None"){
            selectedTemplate = "";
        }
        $("#sms-form #inputMessage").val(selectedTemplate);
        
        $('#inputMessage').val(function() {
            if (this.value.length >= 0) {
                count(this);
            }
            return this.value;
        });
        
    });
    
    
    //Workflow Tracking
    
    var navListItems = $('div.setup-panel div a'),
        allWells = $('.setup-content'),
        allNextBtn = $('.nextBtn'),
        allPrevBtn = $('.prevBtn');

    allWells.hide();

    navListItems.click(function(e) {
        e.preventDefault();
        var $target = $($(this).attr('href')),
            $item = $(this);

        if (!$item.hasClass('disabled')) {
            navListItems.removeClass('btn-primary').addClass('btn-default');
            $item.addClass('btn-primary');
            allWells.hide();
            $target.show();
            $target.find('input:eq(0)').focus();
        }
    });

    allPrevBtn.click(function() {
        var curStep = $(this).closest(".setup-content"),
            curStepBtn = curStep.attr("id"),
            prevStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().prev().children("a");

        prevStepWizard.removeAttr('disabled').trigger('click');
    });

    allNextBtn.click(function() {
        var curStep = $(this).closest(".setup-content"),
            curStepBtn = curStep.attr("id"),
            nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
            curInputs = curStep.find("input[type='text'],input[type='url']"),
            isValid = true;

        $(".form-group").removeClass("has-error");
        for (var i = 0; i < curInputs.length; i++) {
            if (!curInputs[i].validity.valid) {
                isValid = false;
                $(curInputs[i]).closest(".form-group").addClass("has-error");
            }
        }

        if (isValid)
            nextStepWizard.removeAttr('disabled').trigger('click');
    });

    $('div.setup-panel div a.btn-primary').trigger('click');



});
