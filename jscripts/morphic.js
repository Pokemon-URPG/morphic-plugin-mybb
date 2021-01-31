(function($) {
    function timeout(){ 
        newCharacterBtn = $('#new-character');
        newFormBtn = $('.new-form');
        
        newCharacterInput = '<input type="text" name="newcharname[]" class="textbox" maxlength="20" placeholder="Character name"><br>';

        newCharacterBtn.on("click", function(e) {
            e.preventDefault();
            jQuery('<div>' + newCharacterInput + '<hr style="background-color: #ccc"></div>').insertBefore(this);
        });

        newFormBtn.each(function() {
            $(this).on("click", function(e) {
                e.preventDefault();
                charID = $(this).parent().data("char-id");
                newFormInput = '<input type="text" name="char_' + charID + '-newformspecies[]" class="textbox" maxlength="20" placeholder="Form species name"><br>';
                $(newFormInput).insertBefore(this);
            })
        });
        
    };
    
    setTimeout(timeout, 1000)
})(jQuery);
