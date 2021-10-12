function shorten(){

    var obj = new XMLHttpRequest();
    obj.open('POST' , '/links/');
    setHeaders(obj);
    var data = {
        "link": document.getElementById('link').value
    };
    obj.send(JSON.stringify(data));
    obj.onreadystatechange = function(){callBack(obj);};
}

function setHeaders(obj){
    obj.setRequestHeader('Content-Type' , 'application/json');
    obj.setRequestHeader('Accept' , 'application/json');
    obj.setRequestHeader("X-CSRF-TOKEN", document.head.querySelector('[name="csrf-token"]').content );
}

function callBack(obj){
    var code = document.getElementById('code');
    if(obj.status == 201 && obj.readyState == 4){
        code.innerHTML = JSON.parse(obj.response).link;
        code.className = 'success';
    }
    else if(obj.status == 422 && obj.readyState == 4){
        code.innerHTML = JSON.parse(obj.response).errors['link'];
        code.className = 'failed';
    }
}
