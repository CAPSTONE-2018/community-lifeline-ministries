// function capitalizeFirstLetter(string) {
//     return string[0].toUpperCase() + string.slice(1);
// }

/*
 //add a function to jQuery so we can call it on our jQuery collections
 $.fn.capitalize = function () {

 //iterate through each of the elements passed in, `$.each()` is faster than `.each()
 $.each(this, function () {

 //split the value of this input by the spaces
 var split = this.value.split(' ');

 //iterate through each of the "words" and capitalize them
 for (var i = 0, len = split.length; i < len; i++) {
 split[i] = split[i].charAt(0).toUpperCase() + split[i].slice(1);
 }

 //re-join the string and set the value of the element
 this.value = split.join(' ');
 });
 return this;
 };
 */


$.fn.capitalize = function() {
    $.each(this, function() {
        this.value = this.value.replace(/\b[a-z]/gi, function($0) {
            return $0.toUpperCase();
        });
        this.value = this.value.replace(/@([a-z])([^.]*\.[a-z])/gi, function($0, $1) {
            console.info(arguments);
            return '@' + $0.toUpperCase() + $1.toLowerCase();
        });
        /*
         var href = event.value != '/' ? event.value : '/wall/',
         title = href.slice(1, -1).replace("/", " "),
         myTitle = title.replace(/\b[a-z]/g, function ($0) {
         return $0.toUpperCase();
         });
         */
    });
};

//usage
$("input").keyup(function() {
    $(this).capitalize();
}).capitalize();