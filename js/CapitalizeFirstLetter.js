$.fn.capitalize = function() {
    $.each(this, function() {
        this.value = this.value.replace(/\b[a-z]/gi, function($0) {
            return $0.toUpperCase();
        });
        this.value = this.value.replace(/@([a-z])([^.]*\.[a-z])/gi, function($0, $1) {
            console.info(arguments);
            return '@' + $0.toUpperCase() + $1.toLowerCase();
        });
    });
};

$("input").keyup(function() {
    $(this).capitalize();
}).capitalize();