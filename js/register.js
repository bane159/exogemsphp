window.onload = () => {
    console.log("DA");


    const emailRegEx = /^([a-zA-Z0-9._%-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,})$/;
    const passRegEx = /^(?=.*\d)(?=.*[!@#$%^&*])(?=.*[a-z])(?=.*[A-Z]).{8,}$/;
    const nameRegEx = /^[A-Z][a-z]{2,10}$/;
    const lastnameRegEx = /^[A-Z][a-z]{2,15}$/;

    // let pwConf = document.querySelector("#confirmPassword");
    
    
    let nameField = $("#name");
    let lastnameField = $("#lastname");
    let adressField = $("#adress");
    let emailField = $("#email");
    let pwField = $("#password");
    
 // EMAIL VALID
    emailField.on("blur", () => {
        
        if(emailField.val() == ''){
            removeBorder("email")
            removeError("emailError")
            return
        }
    if(!emailRegEx.test(emailField.val())){
            dangerBorder("email")
            displayError("email is in wrong format", "emailError")
            return
        }
        successBorder("email")
        removeError("emailError")
    })


    //NAME VALID
    nameField.on("blur", () => {
        
        if(nameField.val() == ''){
            removeBorder("name")
            removeError("nameError")
            return
        }
    if(!nameRegEx.test(nameField.val())){
            dangerBorder("name")
            displayError("name is in wrong format", "nameError")
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
            displayError("lastname is in wrong format", "lastnameError")
            return
        }
        successBorder("lastname")
        removeError("lastnameError")
    })

    // ADRESS VALID




    //PASSWORD VALID

    pwField.on("blur", () => {
        
        if(pwField.val() == ''){
            removeBorder("password")
            removeError("passwordError")
            return
        }
    if(!passRegEx.test(pwField.val())){
            dangerBorder("password")
            displayError("password is in wrong format", "passwordError")
            return
        }
        successBorder("password")
        removeError("passwordError")
    })


    document.querySelector("#sendForm").addEventListener("click", ()=> {


        //pw check
        if(!passRegEx.test(pwField.val())){
            dangerBorder("password")
            displayError("password is in wrong format", "passwordError")
        }
        else{
            successBorder("password")
            removeError("passwordError")

        }


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


        //email valid

        if(!emailRegEx.test(emailField.val())){
            dangerBorder("email")
            displayError("email is in wrong format", "emailError")
        }
        else{
            successBorder("email")
            removeError("emailError")

        }





        if(emailRegEx.test(emailField.val()) && passRegEx.test(pwField.val()) ){
            

            let data = {
                email : emailField.val(),
                password : pwField.val(),
                name: nameField.val(),
                lastname: lastnameField.val(),
                adress: adressField.val()


            }
            $.ajax({

                dataType: 'json',
                data: data,
                url: "php/registerLogic.php",
                method: "POST",
                success: (data) => {
                    console.log("Success")
                    console.log(data.message)
                    document.querySelector("#registrationMessage").classList.remove("text-danger");
                    document.querySelector("#registrationMessage").classList.add("text-success");
                    document.querySelector("#registrationMessage").innerHTML = data.message + " An confirmation mail has been sent to you.";
                    let s = 15;
                    setInterval(() => {
                        s--;
                        document.querySelector("#registrationMessage").innerHTML = data.message + " An confirmation mail has been sent to you." + `   --> Redirecting to login page in ${s}s`
                    },1000)

                    setTimeout(() => {
                        window.location.href ="login.php";
                    }, 15000);


                    
                },
                error: (xhr) => {
                    if(xhr.status == 401){
                        document.querySelector("#registrationMessage").innerHTML = "Email that you entered is already used";
                        document.querySelector("#registrationMessage").classList.remove("text-success");
                        document.querySelector("#registrationMessage").classList.add("text-danger");
                    }
                    console.log(xhr);
                }

              });

        }
        else{
            console.log("NJET");
        }

    })

}
