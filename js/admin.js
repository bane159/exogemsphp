window.onload = () => {


    let delBtns = document.querySelectorAll('.removeBtn')
    for(let btn of delBtns){
        btn.addEventListener("click", () => {
            console.log($(btn).data("id"));
            let id = $(btn).data("id")
            let data = {
                id: id
            }
            ajaxCallBack(data, "php/removeUser.php", "POST", 
            (success) => {
                console.log("STIGLO");
                console.log(success.message);
                document.querySelector("#delMsg").innerHTML = "successfully deleted user"
                window.location = "admin.php"
            }, (error) => {
                console.log("ERROR");
                console.log(error.status);
                document.querySelector("#delMsg").innerHTML = "successfully deleted user"
                window.location = "admin.php"

            });
        })
    }
}
