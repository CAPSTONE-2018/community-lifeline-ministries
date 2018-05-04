var table = document.getElementsByTagName('table')[0],
    rows = table.getElementsByTagName('tr'),
    text = 'textContent' in document ? 'textContent' : 'innerText';
for (var i = 1, len = rows.length; i < len; i++) {
    rows[i].children[0][text] = i + ".";
}