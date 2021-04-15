// sorting products side script with mongo db 
function sortitems() {

    let selectWrapper = document.getElementById("sort-wrapper");
    let gridwrapper = document.getElementsByClassName("gridwrapper")[0];


    let request = new XMLHttpRequest();
    request.onload = () => {
        if (request.status === 200) {
            gridwrapper.innerHTML = request.responseText;


        } else
            alert("Erorr communcating with server " + request.status);

    };

    request.open("POST", "../MongoData/sort.php");

    request.setRequestHeader(
        "Content-type",
        "application/x-www-form-urlencoded"
    );
    request.send("sort=" + selectWrapper.value);
}