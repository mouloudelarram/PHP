let productsList = document.querySelector("section");
let asideListProds = document.querySelector("aside > div");
let totale = 0;
let tableProdsPanier = new Array();
let products = new Array();


function GetTableProds(){
    /*remplire le tableau des articles */
    document.querySelectorAll("section > div").forEach(element => {
        let tempObj = {
                id:parseInt(element.id),
                name: element.querySelectorAll(".nameandprice > h5")[0].innerHTML,
                price: parseFloat(element.querySelectorAll(".nameandprice > h5")[1].innerHTML),
                qtt:0,
                path: element.querySelector("img").src
        };
        products.push(tempObj);
    });
};
GetTableProds();

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
updateList(products);

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
                            Brand 	‎HP Manufacturer ‎hp, Manufactured by one of the following: 1. Compal Information (Kunshan) Co., Ltd. No.15, Thrid Avenue, A Zone, Kunshan Comprehensive Free Trade Zone, Kushan, Jiangsu, 215300, China 2. Tech-Front (Chongqing) Computer Co., Ltd. 18#, Zongbao Road, Shapinba District Chongqing, P.R.China 3. Wistron Infocomillimeters ( Chongqing) Co.Ltd., No.18-9, Baohong Avenue, Wangjia Sub-District, Yubei District, Chongqing (China) 4. Inventec (Chongqing) Corporation No, 66 West District 2nd Rd, Shapingba District Chongqing 401331, China          Series 	‎HP 245 G7                   Colour 	‎Dark Ash Silver                   Form Factor 	‎Laptop                    Item Height 	‎20 Millimeters                    Item Width 	‎23.4 Centimeters                    Standing screen display size 	‎14 Inches                    Screen Resolution 	‎1366 x 768                    Resolution 	‎1366 x 768 Pixels                    Product Dimensions 	‎33.5 x 23.4 x 2 cm; 1.5 Kilograms                    Batteries 	‎3 CR123A batteries required. (included)                    Item model number 	‎2D8C6PA                    Processor Brand 	‎AMD                    Processor Type 	‎R Series                    Processor Speed 	‎2.1 GHz                    Processor Count 	‎2                    RAM Size 	‎4 GB                    Memory Technology 	‎DDR4                    Computer Memory Type 	‎DDR4 SDRAM                    Maximum Memory Supported 	‎16 GB                    Hard Drive Size 	‎1 TB                    Hard Disk Description 	‎Mechanical Hard Drive                    Hard Drive Interface 	‎Unknown                    Hard Disk Rotational Speed 	‎5400 RPM                    Speaker Description 	‎Dual Speakers                    Graphics Coprocessor 	‎AMD Radeon Vega 6                    Graphics Chipset Brand 	‎AMD                    Graphics Card Description 	‎Integrated                    Graphics RAM Type 	‎Shared                    Graphics Card Ram Size 	‎4 GB                    Graphics Card Interface 	‎Integrated                    Connectivity Type 	‎Miracast                    Number of USB 2.0 Ports 	‎1                    Number of USB 3.0 Ports 	‎2                    Number of HDMI Ports 	‎1                    Number of Ethernet Ports 	‎1                    Number of Microphone Ports 	‎1                    Wattage 	‎65 Watt Hours                    Optical Drive Type 	‎No Optical Drive                    Operating System 	‎Windows 10 Home                    Average Battery Life (in hours) 	‎2 Years                    Are Batteries Included 	‎Yes                    Lithium Battery Energy Content 	‎4.9 Watt Hours                    Lithium Battery Weight 	‎0.85 Grams                    Number Of Lithium Ion Cells 	‎1                    Included Components 	‎Laptop, Power Adaptor, User Guide, Warranty Documents                    Manufacturer 	‎hp                    Imported By 	‎HP India Sales Pvt.Ltd                    Item Weight 	‎1 kg 500 g .
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
        let i=5;
        setInterval(()=>{
            productsList.innerHTML = `<h1>Votre demande a été bien enregistré.</h1><h1>${i--}</h1>`;
        },1000);
        setTimeout(() =>location.reload(), 5000);
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



