$(document).ready(function()
{
    $(document).on('keyup','.uppercaseLetter', function() {        
        $(this).val($(this).val().toUpperCase());  
    }); 

    $(document).on('keyup','.firstuppercaseLetter', function() {        
        $(this).val($(this).val().charAt(0).toUpperCase() + $(this).val().slice(1));
    });
    
    $("body").on("keyup",".allowOnlyNumber", function(e){             
        this.value = this.value.replace(/[^0-9]/g, '').replace(/(\..*?)\..*/g, '$1');
    });

    $("body").on("keyup",".numbersWithDecimal", function(e){             
        this.value = this.value.replace(/[^0-9\.]/g,'');
    });

    $("body").on("keypress",".acceptAlphabetsWithWhiteSpace", function(e){             
        var arr = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz ";
        var code;
        if (window.event)
            code = e.keyCode;
        else
            code = e.which;
        var char = keychar = String.fromCharCode(code);
        if (arr.indexOf(char) == -1)
            return false;
    });

    $("body").on("keypress",".acceptAlphabetsWhiteSpace", function(e){             
        var arr = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz ";
        var code;
        if (window.event)
            code = e.keyCode;
        else
            code = e.which;
        var char = keychar = String.fromCharCode(code);
        if (arr.indexOf(char) == -1)
            return false;
        $(this).val($(this).val().charAt(0).toUpperCase() + $(this).val().slice(1));
    });

    $("body").on("keypress",".acceptOnlyAlphabets", function(e){             
       return  /[a-z]/i.test(e.key)
    });

    $("body").on("keypress",".acceptAlphabets", function(e){   
       $(this).val($(this).val().toUpperCase());            
       return  /[a-z]/i.test(e.key)
    });

    $(document).on('keyup','.lowerCaseLetter', function() {        
        $(this).val($(this).val().toLowerCase());
    });

    $(document).on('keyup','.firstuppercaseLetterOnly', function() {        
        $(this).val($(this).val().charAt(0).toUpperCase() + $(this).val().toLowerCase().slice(1));
    });
})

function validationUser(){   
    console.log("error")    
}