let productsList = document.querySelector("section");
let asideListProds = document.querySelector("aside > div");
let totale = 0;
let tableProdsPanier = new Array();
let products = new Array();

let rqst = new XMLHttpRequest();

rqst.open("POST","./data.php");

rqst.onload = function(){
    products = rqst.response;
    //console.log(products);
    products = JSON.parse(products);
    //console.log(products);
    updateList(products);
}
rqst.send(); 

function updateList(products){
    console.log("je suis dans 1");
    //Mettre à jour la liste des produit
    productsList.innerHTML = "";
    products.forEach((element)=>{
        productsList.innerHTML += 
        `
        <div id="${element.id}" >
            <div id="${element.id}" class = "add">+</div>
            <img id="${element.id}" src="${element.path}" alt=""/>
            <div class= "nameandprice">
                <h5>${element.name}</h5>
                <h5> ${element.price} DH</h5>
            </div>
        </div>
        `
    })
    document.querySelectorAll(".add").forEach(element => {
        element.addEventListener("click",()=>{
            addProd(element)
        });
    });
    document.querySelector(".checkout > h5").addEventListener("click",()=>{
        console.log("test")
        Checkout(tableProdsPanier);
    });
    addEventToImg();
}

function addEventToImg(){
    /*ajouter lévenement a tous les div */
    document.querySelectorAll("section > div > img").forEach(item=>{
        item.addEventListener("click", ()=>{
            document.querySelector(".modalInactive").classList.add("modal");
            document.querySelector(".modalInactive").innerHTML=
            `    <div>
                    <img src="${products[item.id].path}" alt="" />
                    <div>
                        <div>
                            <h1>${products[item.id].name}</h1>
                            <h1>${products[item.id].price} DH</h1>
                        </div>
                        <p class=".scroller">
                        ${products[item.id].description}
                         </p>
                    </div>                
                </div>
                <span>&times;</span>
            `
            document.querySelector(".modalInactive > span").addEventListener("click",()=>{
                document.querySelector(".modalInactive").classList.remove("modal");
            })
        })

    })
};
addEventToImg();

function addProd(e){
    console.log("je suis dans 2");
    // Ajout d'un produit au panier (e : event object)
    totale+=products[e.id].price;
    if (tableProdsPanier.includes(products[e.id])){
        products[e.id].qtt++;
    }
    else{

        tableProdsPanier.push(products[e.id]);
        products[e.id].qtt++;
    }
    updateChart();
}

function delProd(e){
    console.log("je suis dans 3");
// Suppression d'un produit du panier (e : event object);
    totale -= products[e.id].price*(products[e.id].qtt);
    products[e.id].qtt=0;
    tableProdsPanier = tableProdsPanier.filter(element=>
        element.id != e.id
    )
    updateChart();
}

function delProdex(e){
    console.log("je suis dans 7");
// Suppression d'un produit du panier (e : event object);
    totale -= products[e.id].price;
    products[e.id].qtt--;
    console.log(products[e.id].qtt)
    if (products[e.id].qtt==0)
        delProd(e);
        
    updateChart();
}

function updateChart(){
    console.log("je suis dans 4");
    // fonction pour mettre à jour le panier 
    asideListProds.innerHTML = `    <h5>totale : ${totale} Dh</h5>`;
    tableProdsPanier.forEach((e)=>{
        asideListProds.innerHTML +=  
        `
            <div>
                <img src="${e.path}" width="20px" height="20px" alt=""/>
                <h5>${e.name}</h5>
                <h5>${e.qtt }</h5>
                <h1 id="${e.id}">-</h1>
                <div id ="${e.id}" class="remove"> <img src="imgs/del.png"/></div>
            </div>
        `
    })
    document.querySelectorAll(".remove").forEach(element => {
        element.addEventListener("click",()=>{
            delProd(element);
        });
    });
    document.querySelectorAll("div > h1").forEach(element => {
        element.addEventListener("click",()=>{
            delProdex(element);
        });
    });
}

function searchfun(){
    console.log("je suis dans 5");
    // recherche des des produits contenant le texte saisie dans la zone recherche;
    let tempProds = new Array();
    document.querySelector("input").addEventListener("input",()=>{
        tempProds = products.filter(a=>
            a.name.toLowerCase().includes(document.querySelector("input").value.toLowerCase())
            );
        updateList(tempProds);
        });
}
searchfun();

function Checkout(myProds){
    console.log(myProds);
    document.querySelector(".checkout ").innerHTML="<h5>Annuler</h5><h5>Acheter</h5>"
    //document.querySelector(".checkout > h5").innerHTML = "Annuler";
    document.querySelector(".checkout > h5").addEventListener("click",()=>{
        location.reload();
    });
    document.querySelector(".checkout > h5:last-child").addEventListener("click",()=>{
        document.querySelector("aside").innerHTML='';
        productsList.innerHTML = "<h1>Votre demande a été bien enregistré.</h1>";
        let i=tableProdsPanier.length;
        setInterval(()=>{
            productsList.innerHTML = `<h1>Votre demande a été bien enregistré. ${i--} : ${tableProdsPanier[i].name}</h1>`;
        },1000);
        setTimeout(() =>location.reload(), (tableProdsPanier.length+2)*1000);
    });
    productsList.innerHTML = "";
    document.querySelector("aside").innerHTML= `<h5>Le montant totale  : ${totale} DH</h5>`;
        myProds.forEach((element)=>{
            productsList.innerHTML += 
            `
            <div id="${element.id}" >
                <img id="${element.id}" src="${element.path}" alt=""/>
                <div class= "nameandprice">
                    <h5>${element.name}</h5>
                    <h5> ${element.price} DH</h5>
                </div>
                <div class= "nameandprice">
                    <h5>Quantite: ${element.qtt}</h5>
                    <h5>Totale : ${element.price*element.qtt} DH</h5>
                </div>
            </div>
            `
        addEventToImg();
        
    });
};



