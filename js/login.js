var singin = document.getElementById('login-signin');

singin.addEventListener('click', login);

function login () {

    var http = new XMLHttpRequest();
    var url = '../api/user/login';
    let username=document.getElementsByName('username');
    let password=document.getElementsByName('password');
    var params = 'username='+username+'&password='+password;
    
    http.open('POST', url, true);
    
    //Send the proper header information along with the request
    http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    
    http.onreadystatechange = function() {//Call a function when the state changes.
        if(http.readyState == 4 && http.status == 200) {
            alert(http.responseText);
        }
    }
    
    http.send(params);
}
