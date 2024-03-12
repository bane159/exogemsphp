window.onload = () => {

    // $("body").css("overflow", "scroll")
    let nameInput = $("#name");


    // ===========================   name validaiton    ===================================

    const nameRegEx = /^(?=.*[a-zA-Z].{2,})[a-zA-Z]{1,255}$/;
    // const emailRegEx = /^([a-zA-Z0-9._%-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,})$/;
    nameInput.on("blur", () => {
        
        if(nameInput.val() == ''){
            removeBorder("name")
            removeError("nameError")
            return
        }
    if(!nameRegEx.test(nameInput.val())){
            dangerBorder("name")
            displayError("Subject ineeds to have atleast 2 letters and no special characters", "nameError")
            return
        }

        successBorder("name")
        removeError("nameError")
    })


    // ===========================   mail validaiton    ===================================

    // let emailInput = $("#email");
    // emailInput.on("blur", () => {
        
    //     if(emailInput.val() == ''){
    //         removeBorder("email")
    //         removeError("emailError")
    //         return
    //     }
    // if(!emailRegEx.test(emailInput.val())){
    //         dangerBorder("email")
    //         displayError("email is in wrong format", "emailError")
    //         return
    //     }
    //     successBorder("email")
    //     removeError("emailError")
    // })
    //============================= Text Area=====================================
    const areaRegEx = "";
    $("#message").on("keyup", () => {


    })

    // ===========================   country validaiton    ===================================

    // let countrySelect = $("#country")
    // countrySelect.on("change", () => {

    //     if(countrySelect.val() == "Choose"){
    //         dangerBorder("country")
    //         displayError("country is required", "countryError")
    //         return
    //     }

    //     successBorder("country")
    //     removeError("countryError")

    // })


    // ===========================   submit validaiton    ===================================

    $("#submitBtn").on("click", (e) => {
        console.log("click")
        
    
           
        

        if(!nameRegEx.test(nameInput.val())){
            dangerBorder("name")
            displayError("Subject ineeds to have atleast 2 letters and no special characters", "nameError")
            
        }
        // if(!emailRegEx.test(emailInput.val())){
        //     dangerBorder("email")
        //     displayError("email is in wrong format", "emailError")
        // }

        // if(countrySelect.val() == "Choose"){
        //     dangerBorder("country")
        //     displayError("country is required", "countryError")
        // }
     


        // ========= Check regex then send the form if true =============

        if(nameRegEx.test(nameInput.val())){
            data = {
                subject: nameInput.val(),
                message: $("#message").val()


            }
            ftc("php/insertContact.php", data).then((json) => {
                // window.location = json.msg
                console.log("Stiglo");
                document.querySelector("#contactMessage").innerHTML = json.msg


            }).catch()
        }

    })


}

function displayError(message,element) {
    document.querySelector(`#${element}`).classList.remove("d-none")
    document.querySelector(`#${element}`).classList.add("d-block")
    document.querySelector(`#${element}`).innerHTML = message

}
function removeError(element){
    document.querySelector(`#${element}`).classList.remove("d-block")
    document.querySelector(`#${element}`).classList.add("d-none")
    document.querySelector(`#${element}`).innerHTML = ``
}

function successBorder(element){
    document.querySelector(`#${element}`).classList.remove("border-danger")
    document.querySelector(`#${element}`).classList.add("border-success")
}
function dangerBorder(element){
    document.querySelector(`#${element}`).classList.remove("border-success")
    document.querySelector(`#${element}`).classList.add("border-danger")
}

function removeBorder(element) {
    document.querySelector(`#${element}`).classList.remove("border-success")
    document.querySelector(`#${element}`).classList.remove("border-danger")

  }
  async function ftc(url, data){
    let ftc = await fetch(url, 
         {
             method: "POST",
             headers: {
                 "Content-Type" : "application/json"
             },
             body : JSON.stringify(data)
 
         })
         .catch((xhr) => {
             
         })
         return ftc.json();
 }