window.onload = loadBasket;

//Displays cart in page.
function loadBasket(){

    var basketArray;

    if(sessionStorage.basket === undefined || sessionStorage.basket === ""){
        basketArray = [];
    }

    else {
        basketArray = JSON.parse(sessionStorage.basket);
    }

    var htmlStr = "<p>Number of items in basket: " + basketArray.length + "</p>";
    var htmlStr = "<form action='checkout.php' method='post'>";
    var prodIDs = [];


    for(var i=0; i<basketArray.length; ++i){
        htmlStr += "Product name: " + basketArray[i].name + "<br>";
        prodIDs.push(basketArray[i].name);
    }

    htmlStr += "<input type='hidden' name='prodIDs' value='" + prodIDs + "'>";
    htmlStr += "<input type='submit' value='Checkout' class ='check'></form>";
    htmlStr += "<br><button onclick='emptyBasket()' class='empty'>Empty Cart</button>";
    

    document.getElementById("basketDiv").innerHTML = htmlStr;
}


function addToBasket(prodID, prodName){
    var basketArray;
    if(sessionStorage.basket === undefined || sessionStorage.basket === ""){
        basketArray = [];
    }
    else {
        basketArray = JSON.parse(sessionStorage.basket);
    }

    basketArray.push({id: prodID, name: prodName});
    sessionStorage.basket = JSON.stringify(basketArray);

    loadBasket();
}

//Deletes all products from cart
function emptyBasket(){
    sessionStorage.clear();
    loadBasket();
}
