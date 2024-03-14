window.onload = () => {
    const materialRegEx = /^[a-z]{2,15}$/;
    $("#editCat").on("click", () => {
        console.log("CLICK");

        let val = $("#materialInput").val()
        if(!materialRegEx.test(val)){
            console.log("ERR");
            $("#materialError").html("Material is in wrong format bro") 
            return;
        }
        let data = {
            material: val
        }
        ftc("php/addMaterial.php", data).then((json) => {
            // window.location = json.msg
            console.log("Stiglo");
            $("#materialError").html(json.msg) 

        }).catch( (params) => {
            console.log(params);
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