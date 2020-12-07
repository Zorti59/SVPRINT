
document.querySelector('form').addEventListener('submit',function(e){
    e.preventDefault();
   let first_name = document.querySelector('#first_name').value;
   let last_name = document.querySelector('#last_name').value;
   let mail = document.querySelector('#mail').value;
   let message = document.querySelector('#message').value;
  let formData = new FormData();
  formData.append('first_name', first_name);
  formData.append('last_name', last_name);
  formData.append('mail', mail);
  formData.append('message', message);
  console.log(formData);
  var URL= "process.php";
  // Create XMLHttpRequest.
  let xhr = new XMLHttpRequest();
  xhr.onload = function(progressEvent) {
      let result = JSON.parse(xhr.responseText);
      let retour;
      if(result.send){
        console.log(result.send);
        retour = "Votre message a bien été envoyé !";
      }
      else{
        console.log(result.send);
        retour = "Il y a eu une erreur. Veuillez renvoyer votre message dans quelques instants.";
      }
      document.querySelector('#resultForm').innerHTML = retour;
  }
  let async = true;
  // Initialize It.
  xhr.open("POST", URL, async);
  // Send it (Without body data)
  xhr.send(formData);
  return false;
});
