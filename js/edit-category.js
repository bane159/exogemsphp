window.onload = () => {
    const categoryRegEx = /^[a-z]{2,15}$/;
    $("#editCat").on("click", () => {
        console.log("CLICK");

        let val = $("#categoryInput").val()
        if(!categoryRegEx.test(val)){
            console.log("ERR");
            $("#categoryError").html("Category is in wrong format bro") 
            return;
        }
        let data = {
            category: val
        }
        ftc("php/addCategory.php", data).then((json) => {
            // window.location = json.msg
            console.log("Stiglo");
            // document.querySelector("#contactMessage").innerHTML = json.msg
            $("#categoryError").html(json.msg) 

        }).catch( (params) => {
            console.log(params);
            console.log(params.body);
        })

    });
    
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