//supresses the enter key from submitting a form
function supressEnter(evt)
{
    var evt = (evt) ? evt : ((event) ? event : null);
    var node = (evt.target) ? evt.target : ((evt.srcElement) ? evt.srcElement : null);
    if ((evt.keyCode == 13) && (node.type == "text")) {return false;}    
}
//right now each input text tag has onkeypress portion.
//the below code might disable enter completely
//document.onkeypress = supressEnter;
