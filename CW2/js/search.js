function searchCars() {

  let searchBox = document.getElementById("searchbox");
  let gridwrapper = document.getElementsByClassName("gridwrapper")[0];

  let request = new XMLHttpRequest();
  request.onload = () => {
    if (request.status === 200) {
      gridwrapper.innerHTML = request.responseText;
    } else alert("Erorr communcating with server " + request.status);
  };

  request.open("POST", "../MongoData/search.php");

  request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  request.send("search=" + searchBox.value);

}

// recommended script for suggestions of products
"use strict";

//Import recommender class
import { Recommender } from './recommender.js';

//Create recommender object - it loads its state from local storage
let recommender = new Recommender();

/* Set up button to call search function. We have to do it here 
    because search() is not visible outside the module. */

let currentPage = location.href;
if (currentPage.match("Home.php")) {
  document.getElementById("searchbutton").onclick = search;

}

//Display recommendation
window.onload = showRecommendation(), checkLoginCustomer(), checkLoginAdmin();

//Searches for products in database
function search() {
  //Extract the search text
  let searchText = document.getElementById("searchbox").value;

  //Add the search keyword to the recommender
  recommender.addKeyword(searchText);
  showRecommendation();
  searchCars();

  //#FIXME# PERFORM SEARCH FOR PRODUCTS
}

//Display the recommendation in the document
function showRecommendation() {


  let currentPage = location.href;
  if (currentPage.match("Cart.php")) {
    // document.getElementById("RecomendationDiv").innerHTML = recommender.getTopKeyword();


    let Table = document.getElementById("recommendTable");
    let Recommendation = document.getElementById("RecomendationDiv");

    let request = new XMLHttpRequest();
    request.onload = () => {
      if (request.status === 200) {
        Recommendation.innerHTML = request.responseText;
      } else alert("Erorr communcating with server " + request.status);
    };

    request.open("POST", "../MongoData/recommended.php");

    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    request.send("search=" + recommender.getTopKeyword());

  }


}