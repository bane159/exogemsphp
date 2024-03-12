
window.onload = () => {


    let sortBy = 0, categoryId = 0, materialId = 0, keyword = "", perPage = 6;

    sortBy = Number($("#sortCriterium").val());
    console.log(sortBy)

    $("#sortCriterium").on("change", () => {

      sortBy = Number($("#sortCriterium").val());
      console.log(sortBy)

    });

    perPage = Number($("#perPage").val());
    console.log(perPage)

    $("#perPage").on("change", () => {

      perPage = Number($("#perPage").val());
      console.log(perPage)

    });

    let filterCriteriums = $("input[name*='category']")
    for(let f of filterCriteriums){
      if(f.checked){
        categoryId = Number(f.value)
        console.log(categoryId)
      }
    }
    $("input[name*='category']").on("change", () => {

      filterCriteriums = $("input[name*='category']")
      for(let f of filterCriteriums){
        if(f.checked){
          categoryId = Number(f.value)
          console.log(categoryId)
        }
      }

      
    })

    let filterCriteriumsMaterial = $("input[name*='material']")
      for(let f of filterCriteriumsMaterial){
        if(f.checked){
          materialId = Number(f.value)
          console.log(materialId)
        }
      }


    $("input[name*='material']").on("change", () => {

      filterCriteriumsMaterial = $("input[name*='material']")
      for(let f of filterCriteriumsMaterial){
        if(f.checked){
          materialId = Number(f.value)
          console.log(materialId)
        }
      }

      
    })
    

    $("#searchBar").on("keyup", () => {
      keyword = $("#searchBar").val().trim()
      console.log(keyword);
    })
    

  $("#initSearch").on("click", () => {

    



    let data = {
      categoryId: categoryId,
      materialId: materialId,
      sortBy:    sortBy,
      perPage, perPage
    };
    qs = `category.php?categoryId=${categoryId}&materialId=${materialId}&sortBy=${sortBy}&perPage=${perPage}`
    
    
    if(keyword){
      console.log(keyword);
      data.keyword = keyword
      qs += `&keyword=${keyword}`;
      
    }



    window.location = qs;


    console.log(data);
    console.log(keyword);
    console.log("click")

  });
  console.log("radi")
    

  let addToCartBtns = document.querySelectorAll(".addToCard");
  for(let btn of addToCartBtns){
    btn.addEventListener("click", () => {
      data = {
        product_id : $(btn).data("id")
        // user_id : $(btn).data("user")
      }

      $.ajax({

        dataType: "application/json",
        data: data,
        url: "php/addToBasketLogic.php",
        method: "POST",
        success: (data) => {
          console.log("PRAVI SUCCESS");
        },
        error: (xhr) => { 
          if(xhr.status == 200){
            console.log("SUCCESS");
            document.querySelector("#br-appear-modal").classList.add('animAppear');
            document.querySelector("#br-appear-modal").innerHTML = `<p>Added to cart</p>`;
            setTimeout(() => {
              document.querySelector("#br-appear-modal").classList.remove('animAppear');
            }, 1000)
            document.querySelector("#cartNumberOfProducts").innerHTML = Number(document.querySelector("#cartNumberOfProducts").innerHTML) + 1
          }
          if(xhr.status == 208){
            console.log("401");
            document.querySelector("#br-appear-modal").classList.add('animAppear');
            document.querySelector("#br-appear-modal").innerHTML = `<p>Quantity Increased</p>`;
            setTimeout(() => {
              document.querySelector("#br-appear-modal").classList.remove('animAppear');
            }, 1000)

          }
          if(xhr.status == 401){
            console.log("401");
            document.querySelector("#br-appear-modal").classList.add('animAppear');
            document.querySelector("#br-appear-modal").classList.add('text-danger');
            document.querySelector("#br-appear-modal").innerHTML = `<p>INTERNAL SERVER ERROR</p>`;
            setTimeout(() => {
              document.querySelector("#br-appear-modal").classList.remove('animAppear');
              document.querySelector("#br-appear-modal").classList.remove('text-danger');
            }, 1000)

          }
          if(xhr.status == 401){
            console.log("401");
            document.querySelector("#br-appear-modal").classList.add('animAppear');
            document.querySelector("#br-appear-modal").classList.add('text-danger');
            document.querySelector("#br-appear-modal").innerHTML = `<p>INTERNAL SERVER ERROR</p>`;
            setTimeout(() => {
              document.querySelector("#br-appear-modal").classList.remove('animAppear');
              document.querySelector("#br-appear-modal").classList.remove('text-danger');
            }, 1000)

          }
          if(xhr.status == 500){
            console.log("401");
            document.querySelector("#br-appear-modal").classList.add('animAppear');
            document.querySelector("#br-appear-modal").classList.add('text-danger');
            document.querySelector("#br-appear-modal").innerHTML = `<p>INTERNAL SERVER ERROR</p>`;
            setTimeout(() => {
              document.querySelector("#br-appear-modal").classList.remove('animAppear');
              document.querySelector("#br-appear-modal").classList.remove('text-danger');
            }, 1000)

          }
          
          

        }

       });

       
      
    })


  }




}

