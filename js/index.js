var fistValue, secondValue;
window.onload = () => {



  $(".relocateStock").on("click", () => {
    window.location.href = "category.php?p=1&page=1";
    console.log("Click");
  });

  
  $(".relocateTrening").on("click", () => {
    window.location = "category.php?p=1&page=1";
    console.log("Click");
  });







  console.log("RAdI");
  let first =   document.getElementsByName("1");
$("[name = 1]").on("change", () => {
    if(first[0].checked){
      console.log("PRVI");
      fistValue = 1
    }
    if(first[1].checked){
      console.log("DRUGI");
      fistValue = 3 
    }
    if(first[2].checked){
      console.log("TRECI");
      fistValue = 4
    }
  
})
let second =   document.getElementsByName("3");
$("[name = 3]").on("change", () => {
  console.log("CLICK");
  if(second[0].checked){
    console.log("PRVI");
    secondValue = 5
  }
  if(second[1].checked){
    console.log("DRUGI");
    secondValue = 6 
  }
})


$("#btnSurvey").on("click", () => {
  console.log(fistValue);
  let data = {
    first : fistValue,
    // second : secondValue
  }
  if(fistValue == undefined){
    $("#surveyMessage").html("Answer All questions first")
  }
  else{
    ftc("php/answerSurvey.php", data).then((json) => {
      console.log(json);
      $("#surveyMessage").html(json.msg)
      

    }).catch( (xhr)  => {
        console.log(xhr);
    })
  }

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
          console.log(xhr);
      })
      return ftc.json();
}


