
console.log("FUNK!@#");
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
function ajaxCallBack(data, url, method, success, error) { 

    $.ajax({

        dataType: "json",
        data: data,
        url: url,
        method: method,
        success: success,
        error: error

    });
 
}




