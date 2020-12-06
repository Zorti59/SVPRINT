
document.querySelector('form').addEventListener('submit',function(e){
    e.preventDefault();
   let first_name = document.querySelector('#first_name').value;
   let last_name = document.querySelector('#last_name').value;
   let phone = document.querySelector('#phone').value;
   let mail = document.querySelector('#mail').value;
   let address = document.querySelector('#address').value;
   let city = document.querySelector('#city').value;
   let country = document.querySelector('#country').value;
   let zip_code = document.querySelector('#zip_code').value;
  let formData = new FormData();
  formData.append('first_name', 'coucou');
  formData.append('last_name', last_name);
  formData.append('phone', phone);
  formData.append('mail', mail);
  formData.append('address', address);
  formData.append('city', city);
  formData.append('country', country);
  formData.append('zip_code', zip_code);
  formData.append('recruitForm', true);
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
