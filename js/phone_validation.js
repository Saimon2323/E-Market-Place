function phonenumber(inputtxt)
{

  var phoneno = /^\(?([0]{1})\)?[-. ]?([1]{1})[-. ]?([5-9]{1})[-. ]?([0-9]{8})$/;

    if(phoneno.test(inputtxt.phone.value))
        {

      return true;
        }
      else
        {
        alert("Enter a valid phone number.");
        return false;
        }
}



function validateCardNumber(number) {
    var regex = /^(?:4[0-9]{12}(?:[0-9]{3})?|[25][1-7][0-9]{14}|6(?:011|5[0-9][0-9])[0-9]{12}|3[47][0-9]{13}|3(?:0[0-5]|[68][0-9])[0-9]{11}|(?:2131|1800|35\d{3})\d{11})$/;
    if (regex.test(number.cardNumber.value))
        {
          return true;
        }

        else{
          alert("Enter a valid card number.");
          return false;
        }

}

function cardname(nameOnCard){
  var name = /^[A-Za-z\s]+$/; 
  if(name.test(nameOnCard.holderName.value)){
    return true;
  }
  else{
    alert("Enter valid card holder name.");
    return false;
  }
}


function delname(delvName){
  var delN = /^[A-Za-z\s]+$/;
  if(delN.test(delvName.name.value)){
    return true;
  }
  else{
    alert("Enter valid delivery name.");
    return false;
  }
}

function scode(sCode){
  var sc = /^[0-9]{3}$/;

  if(sc.test(sCode.sCode.value))
        {

      return true;
        }
      else
        {
        alert("Enter a valid security code number.");
        return false;
        }
}

function expiry(expiryDate){
  var ed = /^(0[1-9]|1[0-2])\/?([0-9]{4}|[0-9]{2})$/;

  if (ed.test(expiryDate.expiryDate.value)) {
    return true;
  }
  else{
    alert("Enter a valid expiry date or correct the format.");
        return false;
  }
}