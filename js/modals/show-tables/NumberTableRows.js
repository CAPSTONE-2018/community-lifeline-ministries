var table = document.getElementsByTagName('table')[0],
    rows = table.getElementsByClassName('number-row'),
    text = 'textContent' in document ? 'textContent' : 'innerText';
for (var i = 0, len = rows.length; i < len; i++) {
    var numberToDisplay = i + 1;
    rows[i].children[0][text] = numberToDisplay + ".";
}