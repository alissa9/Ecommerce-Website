//Global variables 

let currentPageURL = location.href
if (currentPageURL.match("http://localhost/CW2/CMS%20PHP/AdminLogin.php")) {


	let loggedInStr = "Welcome back ! <br> <br><button  id='logout'  onclick='logout()'>Logout </button>";

	let loginStr = document.getElementById("LoginParaAdmin").innerHTML;


	//Checks whether user is logged in.
	function checkLoginAdmin() {

		let request = new XMLHttpRequest();

		//Create event handler that specifies what should happen when server responds
		request.onload = function () {
			if (request.responseText === "ok") {
				document.getElementById("LoginParaAdmin").innerHTML = loggedInStr;
				console.log(request.responseText);

			}
			else {
				console.log(request.responseText);
				document.getElementById("LoginParaAdmin").innerHTML = loginStr;
			}
		};
		// Set up and send request
		request.open("GET", "../sessions/checkLoginAdmin.php");
		request.send();

	}

	//Attempts to log in user to server
	function loginAdmin() {

		let request = new XMLHttpRequest();
		//Create event handler that specifies what should happen when server responds
		request.onload = function () {
			//Check HTTP status code
			if (request.status === 200) {
				//Get data from server
				var responseData = request.responseText;

				//Add data to page
				if (responseData === "ok") {
					document.getElementById("LoginParaAdmin").innerHTML = loggedInStr;
					document.getElementById("ErrorMessages").innerHTML = "";//Clear error messages
					customerFirstName.innerHTML += loggedInStr;

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
		request.open("POST", "../MongoData/loginAdmin.php");
		request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		request.send("email=" + usrEmail + "&password=" + usrPassword);

	}



	//Logs the user out.
	function logout() {
		let request = new XMLHttpRequest();
		//Create event handler that specifies what should happen when server responds
		request.onload = function () {

			checkLoginAdmin();

		};

		//Set up and send request
		request.open("GET", "../sessions/logout.php");

		request.send();
	}
}