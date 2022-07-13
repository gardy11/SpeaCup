
//帳號驗證格式提示

let acout=document.querySelector("#inputAccount6");
acout.addEventListener("blur", function(){
  let s = this.validity;
  let msg = "";
  switch (true) {
      case s.valueMissing:
           msg = "請輸入帳號";
           break;
      case s.patternMismatch:
           msg = "請輸入正確的帳號格式";
      break;
   }
   this.setCustomValidity(msg);
})

//密碼驗證格式提示

let pasw =document.querySelector("#inputPassword6");
pasw.addEventListener("blur", function(){
  let s = this.validity;
  let msg = "";
  switch (true) {
      case s.valueMissing:
           msg = "請輸入密碼";
           break;
      case s.patternMismatch:
           msg = "請輸入正確的密碼格式";
      break;
   }
   this.setCustomValidity(msg);
})

//新密碼驗證格式提示

let new_pasw =document.querySelector("#m-password2");
new_pasw.addEventListener("blur", function(){
  let s = this.validity;
  let msg = "";
  switch (true) {
      case s.valueMissing:
           msg = "請輸入密碼";
           break;
      case s.patternMismatch:
           msg = "請輸入正確的密碼格式";
      break;
   }
   this.setCustomValidity(msg);
})