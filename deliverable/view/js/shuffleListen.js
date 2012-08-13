
function getXMLHTTPRequest() {
    var req = false;
    try {
        req = new XMLHttpRequest(); //for firefox
    } catch (err) {
        try {
            // fpr somw versions of IE
            req = new ActiveXObject('Msxml2.XMLHTTP')
        } catch (err) {
            try {
                // for other versions of IE
                req = new ActiveXObject("Microsoft.XMLHTTP");
            } catch (err) {
                req = false;
            }
        }
    }
    return req;
}

function ModifyBookStateResponse() {
    if (myReq.readyState == 4) {
        if (myReq.status == 200) {
            document.getElementById('bookState').innerHTML = myReq.responseText;
        } else {
            alert('There was a problem with the request. code: ' + myReq.status);
        }
    } else {
        document.getElementById('bookState').innerHTML = '<img src="../image/ajax-loader.gif"/>';
    }
}

function modifyBookState(bookId, newState) {
    var params = 'bookId=' + encodeURI(bookId) + '&newState=' + encodeURI(newState);
    myReq.open("POST", 'modifyBookState.php', true);
    myReq.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    myReq.setRequestHeader("Content-length", params.length);
    myReq.setRequestHeader("Connection", "close");
    myReq.onreadystatechange = ModifyBookStateResponse;
    myReq.send(params);
}

function punchCard(lessonId) {
    alert(lessonId);
}
