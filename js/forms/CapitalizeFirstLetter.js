$.fn.capitalize = function() {
    function isTRChar(key) {
        var trchar = [231, 246, 252, 287, 305, 351];
        for (var i = 0; i < trchar.length; i++) {
            if (trchar[i] == key) return true;
        }
        return false;
    }
    $.each(this, function() {

        var $this = $(this);
        if ($this.is('textarea') || $this.is('input:text')) {
            $this.on({
                keypress: function (event) {
                    var pressedKey = event.charCode == undefined ? event.keyCode : event.charCode;
                    var str = String.fromCharCode(pressedKey);
                    if (pressedKey == 0) {
                        if (!isTRChar(pressedKey)) return;
                    }

                    this.value = this.value.replace(/\b[a-z]/gi, function($0) {
                        return $0.toUpperCase();
                    });
                    this.value = this.value.replace(/@([a-z])[\w\.]*\b/gi, function($0, $1) {
                        return $0.substring(0,2).toUpperCase() + $0.substring(2).toLowerCase();
                    });

                    if ( ! this.createTextRange) {
                        var startpos = this.selectionStart;
                        var endpos = this.selectionEnd;
                        if ( ! $(this).attr('maxlength')
                            ||
                            this.value.length - (endpos - startpos) < $(this).attr('maxlength') )
                        {
                            this.setSelectionRange(startpos + 1, startpos + 1);
                        }
                    }
                }
            });
        }
    });
};

$('input').capitalize();