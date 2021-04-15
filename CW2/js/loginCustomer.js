//Global variables


let loggedInStr = "Welcome back ! <br> <br><button  id='logout'  onclick='logout()'>Logout </button>";
let loginStr = document.getElementById("LoginPara").innerHTML;



//Checks whether user is logged in.
function checkLoginCustomer() {


    let request = new XMLHttpRequest();

    //Create event handler that specifies what should happen when server responds
    request.onload = function () {
        if (request.responseText === "ok") {
            document.getElementById("LoginPara").innerHTML = loggedInStr;
            console.log(request.responseText);

        }
        else {
            console.log(request.responseText);
            document.getElementById("LoginPara").innerHTML = loginStr;
        }
    };
    // Set up and send request
    request.open("GET", "../sessions/checkLoginCustomer.php");
    request.send();

}

//Attempts to log in user to server
function loginCustomer() {
    let request = new XMLHttpRequest();
    //Create event handler that specifies what should happen when server responds
    request.onload = function () {
        //Check HTTP status code
        if (request.status === 200) {
            //Get data from server
            var responseData = request.responseText;

            //Add data to page
            if (responseData === "ok") {
                document.getElementById("LoginPara").innerHTML = loggedInStr;
                document.getElementById("ErrorMessages").innerHTML = "";//Clear error messages


            }
            else
                document.getElementById("ErrorMessages").innerHTML = request.responseText;
        }
        else
            document.getElementById("ErrorMessages").innerHTML = "Error communicating with server";
    };

    //Extract login data
    let usrEmail = document.getElementById("email").value;
    let usrPassword = document.getElementById("password").value;

    //Set up and send request
    request.open("POST", "../MongoData/loginCustomer.php");
    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    request.send("email=" + usrEmail + "&password=" + usrPassword);

}



//Logs the user out.
function logout() {
    let request = new XMLHttpRequest();
    //Create event handler that specifies what should happen when server responds
    request.onload = function () {

        checkLoginCustomer();

    };

    //Set up and send request
    request.open("GET", "../sessions/logout.php");

    request.send();
}



