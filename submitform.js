console.log("Hello from submit form");

function myCheck(){
  console.log("Hello on click");

sname = document.querySelector("#fname").value;
semail = document.querySelector('#femail').value;
snumber = document.querySelector('#pnumber').value;
spass = document.querySelector('#fpass').value;
srepass = document.querySelector('#frepass').value;

//console.log(sname + semail + snumber + spass + srepass);
//console.log("length " + snumber.length);

if(sname.length==0 || semail.length==0 || snumber.length==0 || spass.length==0 || srepass.length==0){
  alert("Please fill all the fields");

}
else {
  {
    if(snumber.length!=10){
      alert("Phone number should be of length 10");
    }

console.log("spass is "+spass);
console.log("repass is "+srepass);
console.log("spass L is "+spass.length);


if(spass.length<8){
  alert("Password length should be greater than 8")
}
    else if(spass!=srepass){
        alert("Password and Repassword do not match");
    }



  }
}

}
