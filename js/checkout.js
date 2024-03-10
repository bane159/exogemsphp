

    window.onload = () => {
        console.log("DA");
    
    
        const emailRegEx = /^([a-zA-Z0-9._%-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,})$/;
        
        const nameRegEx = /^[A-Z][a-z]{2,10}$/;
        const lastnameRegEx = /^[A-Z][a-z]{2,15}$/;
        const numberRegEx = /^[0-9]{8,14}$/;
        const stateRegex = /^[A-Z][a-z]{2,}$/;
        const cityRegex = /^[A-Za-z -]+$/;
        const zipRegex = /^\d{5}(?:-\d{4})?$/;
        const streetRegex = /^[A-Za-z0-9 ,.-]+$/;


    
        // let pwConf = document.querySelector("#confirmPassword");
        
        
        let nameField = $("#name");
        let lastnameField = $("#lastname");
        let numberField = $("#number");
        let cityField = $("#city");
        let stateField = $("#state");
        let streetField = $("#street");
        let zipField = $("#zip");
        let messageField = $("#message");

       
        
        
    //  // EMAIL VALID
    //     emailField.on("blur", () => {
            
    //         if(emailField.val() == ''){
    //             removeBorder("email")
    //             removeError("emailError")
    //             return
    //         }
    //     if(!emailRegEx.test(emailField.val())){
    //             dangerBorder("email")
    //             displayError("email is in wrong format", "emailError")
    //             return
    //         }
    //         successBorder("email")
    //         removeError("emailError")
    //     })
    
    
        //NAME VALID
        nameField.on("blur", () => {
                console.log("Name blur");
            if(nameField.val() == ''){
                removeBorder("name")
                removeError("nameError")
                return
            }
        if(!nameRegEx.test(nameField.val())){
                dangerBorder("name")
                displayError("First name upper, other small", "nameError")
                return
            }
            successBorder("name")
            removeError("nameError")
        })
    
        //LASTNAME VALID
    
        lastnameField.on("blur", () => {
            
            if(lastnameField.val() == ''){
                removeBorder("lastname")
                removeError("lastnameError")
                return
            }
        if(!lastnameRegEx.test(lastnameField.val())){
                dangerBorder("lastname")
                displayError("First name upper, other small", "lastnameError")
                return
            }
            successBorder("lastname")
            removeError("lastnameError")
        })
    
        // Number
        
        numberField.on("blur", () => {
            
            if(numberField.val() == ''){
                removeBorder("number")
                removeError("numberError")
                return
            }
        if(!numberRegEx.test(numberField.val())){
                dangerBorder("number")
                displayError("number is in wrong format", "numberError")
                return
            }
            successBorder("number")
            removeError("numberError")
        })

        // cityField
        
        cityField.on("blur", () => {
            
            if(cityField.val() == ''){
                removeBorder("city")
                removeError("cityError")
                return
            }
        if(!cityRegex.test(cityField.val())){
                dangerBorder("city")
                displayError("city is in wrong format", "cityError")
                return
            }
            successBorder("city")
            removeError("cityError")
        })

        // Staate
        
        stateField.on("blur", () => {
            
            if(stateField.val() == ''){
                removeBorder("state")
                removeError("stateError")
                return
            }
        if(!stateRegex.test(stateField.val())){
                dangerBorder("state")
                displayError("First letter must be upper", "stateError")
                return
            }
            successBorder("state")
            removeError("stateError")
        })


        // Zip
        
        zipField.on("blur", () => {
            
            if(zipField.val() == ''){
                removeBorder("zip")
                removeError("zipError")
                return
            }
        if(!zipRegex.test(zipField.val())){
                dangerBorder("zip")
                displayError("First letter must be upper", "zipError")
                return
            }
            successBorder("zip")
            removeError("zipError")
        })

        //street
        streetField.on("blur", () => {
            
        if(streetField.val() == ''){
            removeBorder("street")
            removeError("streetError")
            return
        }
    if(!streetRegex.test(streetField.val())){
            dangerBorder("street")
            displayError("First name upper, other small", "streetError")
            return
        }
        successBorder("street")
        removeError("streetError")
    })
    
    
    
    
        //PASSWORD VALID
    
        // pwField.on("blur", () => {
            
        //     if(pwField.val() == ''){
        //         removeBorder("password")
        //         removeError("passwordError")
        //         return
        //     }
        // if(!passRegEx.test(pwField.val())){
        //         dangerBorder("password")
        //         displayError("password is in wrong format", "passwordError")
        //         return
        //     }
        //     successBorder("password")
        //     removeError("passwordError")
        // })
    
    
        document.querySelector("#orderBtn").addEventListener("click", ()=> {
    

    
            //lastname check
    
            if(!lastnameRegEx.test(lastnameField.val())){
                dangerBorder("lastname")
                displayError("lastname is in wrong format", "lastnameError")
                
            }
            else{
    
                successBorder("lastname")
                removeError("lastnameError")
    
            }
    
            
            //name valid
    
    
            if(!nameRegEx.test(nameField.val())){
                dangerBorder("name")
                displayError("name is in wrong format", "nameError")
            }
            else{
                successBorder("name")
                removeError("nameError")
    
            }
//-----------------------------
            if(!numberRegEx.test(numberField.val())){
                dangerBorder("number")
                displayError("number is in wrong format", "numberError")
            }
            else{
                successBorder("number")
                removeError("numberError")
    
            }
    //----------------------------------
            if(!cityRegex.test(cityField.val())){
                dangerBorder("city")
                displayError("city is in wrong format", "cityError")
            }
            else{
                successBorder("city")
                removeError("cityError")

            }
            //----------------------------------
            if(!stateRegex.test(stateField.val())){
                dangerBorder("state")
                displayError("state is in wrong format", "stateError")
            }
            else{
                successBorder("state")
                removeError("stateError")

            }
            //----------------------------------
            if(!zipRegex.test(zipField.val())){
                dangerBorder("zip")
                displayError("zip is in wrong format", "zipError")
            }
            else{
                successBorder("zip")
                removeError("zipError")

            }
            let tos = document.querySelector("#tos").checked
            //----------------------------------
            if(!tos){
                dangerBorder("tos")
                displayError("This must be checked", "tosError")
            }
            else{
                successBorder("tos")
                removeError("tosError")

            }
            //----------------------------------
      
    
                
                if(nameRegEx.test(nameField.val()) && lastnameRegEx.test(lastnameField.val()) && numberRegEx.test(numberField.val()) && cityRegex.test(cityField.val()) &&stateRegex.test(stateField.val()) && zipRegex.test(zipField.val()) && tos){

                    data = {
                        name : nameField.val(),
                        lastname : lastnameField.val(),
                        number : numberField.val(),
                        city : cityField.val(),
                        state : stateField.val(),
                        street : streetField.val(),
                        zip : zipField.val(),
                        tos : tos,
                        message : messageField.val()
            
                    }

                    ftc("php/checkoutLogic.php", data).then((json) => {
                        window.location = json.msg
    
                    }).catch()

                    
                }
                else{
                    console.log("Nije uspesno");
                }
            // if(){
                
    
            //     let data = {
            //         email : emailField.val(),
            //         password : pwField.val(),
            //         name: nameField.val(),
            //         lastname: lastnameField.val(),
            //         adress: adressField.val()
            //     }
            //     $.ajax({
    
            //         dataType: 'json',
            //         data: data,
            //         url: "php/registerLogic.php",
            //         method: "POST",
            //         success: (data) => {
            //             console.log("Success")
            //             console.log(data.message)
            //             document.querySelector("#registrationMessage").classList.remove("text-danger");
            //             document.querySelector("#registrationMessage").innerHTML = data.message;
            //             window.location.href ="login.php";
            //         },
            //         error: (xhr) => {
            //             if(xhr.status == 401){
            //                 document.querySelector("#registrationMessage").innerHTML = "Email that you entered is already used";
            //                 document.querySelector("#registrationMessage").classList.add("text-danger");
            //             }
            //         }
    
            //       });
    
            // }
            // else{
            //     console.log("NJET");
            // }
    
        })
    
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

