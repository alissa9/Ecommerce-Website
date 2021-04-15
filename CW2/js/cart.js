

// WILL SEND ITEMS TO CART PAGE TO BE DISPLAYED FOR THE USER
let addToCart_btns = document.getElementsByClassName("addtocart");

for (let i = 0; i < addToCart_btns.length; i++) {
    let addToCart_btn = addToCart_btns[i];

    addToCart_btn.addEventListener("click", addToCart);
}


function addToCart(event) {


    var addToCartbtn = event.target;
    let iteminfo = addToCartbtn.parentElement;


    let imagePath = "../";

    let cartImage = iteminfo.getElementsByClassName("CarPic")[0].src;
    let newcartImage = imagePath.concat(cartImage.substr(21));
    let cartMake = iteminfo.getElementsByClassName("CarMake")[0].innerHTML;
    let cartModel = iteminfo.getElementsByClassName("CarModel")[0].innerHTML;
    let cartPrice = iteminfo.getElementsByClassName("CarPrice")[0].innerHTML;



    let request = new XMLHttpRequest();

    request.onload = () => {

        if (request.status === 200) {
            let responseData = request.responseText;
            document.getElementById("addtocartresponse").innerHTML = responseData;
        }
        else alert("Error communicating with server: " + request.status);
    };

    request.open("POST", "../MongoData/AddToCart.php");
    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");


    request.send("image_url=" + newcartImage + "&make=" + cartMake + "&model=" + cartModel + "&price=" + cartPrice);

}

// remove button 
let removebuttons = document.getElementsByClassName("removeItem");

for (let i = 0; i < removebuttons.length; i++) {
    let button = removebuttons[i];
    button.addEventListener("click", removeItem)

}
function removeItem(event) {

    let request = new XMLHttpRequest();

    let buttonClicked = event.target;
    let item = buttonClicked.parentElement.parentElement;
    item.remove()

    let carModel = item.getElementsByClassName("CarModel")[0].innerHTML;
    console.log(carModel)


    request.onload = () => {
        if (request.status === 200) {
            console.log(request.responseText);



        } else
            alert("Erorr communcating with server " + request.status);

    };

    request.open("POST", "../MongoData/emptyBasket.php");

    request.setRequestHeader(
        "Content-type",
        "application/x-www-form-urlencoded"
    );
    request.send("CarModel=" + carModel);
}






window.onload = function () {
    document.getElementById("orderSummary").style.display = 'none';
};

//  this function print out the checkout box after the customer click omn checkout
function openCheckout() {

    var x = document.getElementById("orderSummary");

    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}



