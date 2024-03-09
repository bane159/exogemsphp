
    // var PRODUCTS;
    // var TRENDINGPRODUCTS;
    // var TOPSELLERS;
    // Promise.all([
    //     fetch("data/trendingProducts.json").then(data => data.json()),
    //     fetch("data/products.json").then(data => data.json()),
    //     fetch("data/topSellers.json").then(data =>data.json())
    // ])
    // .then(([trendingProducts, products, topSellers]) => {

    //   setTimeout(() => {document.querySelector("#spinner-holder").remove()}, 100)
    //                               // document.getElementsByTagName("body").style = "overflow: scroll!important;"
    //   $("body").css("overflow", "scroll")

    //     TRENDINGPRODUCTS = trendingProducts;
    //     PRODUCTS = products;
    //     TOPSELLERS = topSellers;
        
    //     let trendingProductsAllData = PRODUCTS.filter(x => TRENDINGPRODUCTS.some(t => t.id == x.id));

    //     displayTrendingProducts(trendingProductsAllData)
        
    //     let topSellersAllData = PRODUCTS.filter(x => TOPSELLERS.some(t => x.id == t.id))

    //     displayTopSellers(topSellersAllData);

    //     indexCartCodeExec()// this code is written in a function in main.js but is called here so it happends only when data has arrieved
    // }).catch(x => console.log(x))

window.onload = () => {

    
        
    





}
function displayTrendingProducts(data){
    let html = ''
    let trendingHolder = document.querySelector("#trendingProducts")
    for (let x of data) {
        html += `
    <div class="col-md-6 col-lg-4 col-xl-3">
        <div class="card text-center card-product">
          <div class="card-product__img">
            <img class="card-img" src="${x.img.src}" alt="${x.img.alt}" />
            <ul class="card-product__imgOverlay">
              <li><button class="relocateTrening"><i class="ti-search"></i></button></li>
            </ul>
          </div>
          <div class="card-body">
            <p>${x.category}</p>
            <h4 class="card-product__title">${x.text}</h4>
            <p class="card-product__price">$${x.price}</p>
            
          </div>
        </div>
      </div>
      `;
        
    }
    trendingHolder.innerHTML = html
    

}

function displayTopSellers(data){
  let html = ``
  let holder = document.querySelector("#bestSellersHolder")
  for (let x of data) {
    html += 
    `
    <div class="card text-center card-product">
            <div class="card-product__img">
              <img class="img-fluid" src="${x.img.src}" alt="${x.img.alt}" />
              <ul class="card-product__imgOverlay">
                <!-- <li><button><i class="ti-search"></i></button></li> -->
                <li><button class="relocateTop"><i class="ti-shopping-cart"></i></button></li>
                <!-- <li><button><i class="ti-heart"></i></button></li> -->
              </ul>
            </div>
            <div class="card-body">
              <p>${x.category}</p>
              <h4 class="card-product__title">${x.text}</h4>
              <p class=" br-sm-text-sellers">${x.unitsSold} Units Sold!</p>
              <p class="card-product__price">$${x.price}</p>
            </div>
      </div>

    `
  }
  holder.innerHTML = html
}
