$.fn.capitalize = function() {
    $.each(this, function() {

            this.value = this.value.replace(/\b[a-z]/gi, function ($0) {
                return $0.toUpperCase();
            });
    });
};

$("input").keyup(function() {
    $(this).capitalize();
}).capitalize();