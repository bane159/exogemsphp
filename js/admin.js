window.onload = () => {


    let delBtns = document.querySelectorAll('.removeBtn')
    for(let btn of delBtns){
        btn.addEventListener("click", () => {
            console.log($(btn).data("id"));
            let id = $(btn).data("id")
            let data = {
                id: id
            }
            ftc("php/removeUser.php", data).then((json) => {
                console.log(json);
                let s = 8;
                setInterval(() => {
                    s--;
                    document.querySelector("#delMsg").innerHTML = json.message + `   --> Reloading page in ${s}s`
                },1000)

                setTimeout(() => {
                    window.location = "admin.php"
                }, 8000);

            }).catch( (xhr)  => {
                console.log(xhr);
            })

        })
    }

    

    //************************************************************************************************************* */



    console.log("DA");


    const emailRegEx = /^([a-zA-Z0-9._%-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,})$/;
    const passRegEx = /^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/;
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


    document.querySelector("#addUserBtn").addEventListener("click", ()=> {


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
            // $.ajax({

            //     dataType: 'json',
            //     data: data,
            //     url: "php/registerLogic.php",
            //     method: "POST",
            //     success: (data) => {
            //         console.log("Success")
            //         console.log(data.message)
            //         document.querySelector("#registrationMessage").classList.remove("text-danger");
            //         document.querySelector("#registrationMessage").innerHTML = data.message;
            //         window.location.href ="login.php";
            //     },
            //     error: (xhr) => {
            //         if(xhr.status == 401){
            //             document.querySelector("#registrationMessage").innerHTML = "Email that you entered is already used";
            //             document.querySelector("#registrationMessage").classList.add("text-danger");
            //         }
            //     }

            //   });

            ftc("php/adminAddUserLogic.php", data).then((json) => {
                
                let s = 8;
                setInterval(() => {
                    s--;
                    document.querySelector("#regMsg").innerHTML = json.message + `   --> Reloading page in ${s}s`
                },1000)

                setTimeout(() => {
                    window.location = "admin.php"
                }, 8000);

                document.querySelector("#regMsg").innerHTML = json.message
                document.querySelector("#regMsg").classList.add("text-success")
                document.querySelector("#regMsg").classList.remove("text-danger")

            }).catch( (xhr)  => {
                console.log(xhr);
                if(xhr.status = 401){
                    document.querySelector("#regMsg").innerHTML = "User already exists"
                    document.querySelector("#regMsg").classList.remove("text-success")
                    document.querySelector("#regMsg").classList.add("text-danger")
                }
            })

        }
        else{
            console.log("NJET");
        }

    })




}




































async function ftc(url, data){
    let YEA = await fetch(url, 
         {
             method: "POST",
             headers: {
                 "Content-Type" : "application/json"
             },
             body : JSON.stringify(data)
 
         })
         .catch((xhr) => {
             
         })
         return YEA.json();
 }
 