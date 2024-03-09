window.onload = () => {
    const emailRegEx = /^([a-zA-Z0-9._%-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,})$/;
    const passRegEx = /^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/;


    let emailField = $("#email");
    let pwField = $("#password");
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



    document.querySelector("#login").addEventListener("click",() => {

         //pw check
         if(!passRegEx.test(pwField.val())){
            dangerBorder("password")
            displayError("password is in wrong format", "passwordError")
        }
        else{
            successBorder("password")
            removeError("passwordError")

        }


        //email check

        if(!emailRegEx.test(emailField.val())){
            dangerBorder("email")
            displayError("email is in wrong format", "emailError")
            
        }
        else{

            successBorder("email")
            removeError("emailError")

        }

        if(passRegEx.test(pwField.val()) && emailRegEx.test(emailField.val())){


            let data = {
                email: emailField.val(),
                password: pwField.val()
    
            }
            
            ajaxCallBack(data,"php/loginLogic.php","POST", 
            (data) => {
                console.log("Stiglo")
                document.querySelector("#loginMessage").innerHTML = data.message;
                window.location.href ="index.php";
            
            
            }, 
            (xhr) => {
                
                console.log("error") 
                console.log(xhr.status)
                if(xhr.status == 401){
                    document.querySelector("#loginMessage").innerHTML = "Email Or Password is in wrong format.";
                }
                if(xhr.status == 406){
                    document.querySelector("#loginMessage").innerHTML = `Account with those credentials does not exist or your Email or password are invalid, new to here? Make sure to <a href="register.php">register here!</a>`;
                }
            });

        }


    })
    console.log("DARADA")

}

