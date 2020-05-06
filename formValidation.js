console.log("form validation...");
function studentInfoValidation() 
   {
      var name =document.getElementsByName('name')[0].value;
      var sgname =document.getElementsByName('sgname')[0].value;
      var phone = document.getElementsByName('phone')[0].value;
      var phoneop = document.getElementsByName('phoneop')[0].value;
      var email = document.getElementsByName('email')[0].value;
      var passw = document.getElementsByName('psw')[0].value;
      var conpassw = document.getElementsByName('conpsw')[0].value;
      var insname = document.getElementsByName('instname')[0].value;
      
      var letters = /^[A-Za-z]+$/;
      var numbers = /^[0-9]+$/;
      var letterNumber = /^[0-9a-zA-Z]+$/;
      var decimal=  /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}$/;
      var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
      var phoneno = /^\d{10}$/;

   if(name.match(letters)&&sgname.match(letters))
   {
      if(phone.match(phoneno)&&phoneop.match(phoneno))
      {
         if(email.match(mailformat))
         {
            if(passw.localeCompare(conpassw)===0)
            {
               if(phone.match(decimal))
               {
                  if(insname.match(letters))
                  {
                     return (true);
                  }
                  else    
                  {alert("Should be in letter");
                         return (false);
                  }
               }
               else    
               {alert("password between 8 to 15 characters which contain at least one lowercase letter, one uppercase letter, one numeric digit, and one special!");
                   return (false);
               }
            }
            else    
            {alert("password are not same!");
                return (false);
            }
         }
         else    
         {alert("You have entered an invalid email address!");
            return (false);
         }
      }
      else    
      {
         alert("You have entered an invalid phone number!");
         return (false);
      }
   }
   else    
   {alert("You have entered an invalid name!");
      return (false);
   
   }
}
function adminInfoValidation() 
   {
      var name =document.getElementsByName('name')[0].value;
      var phone = document.getElementsByName('phone')[0].value;
      var email = document.getElementsByName('email')[0].value;
      var passw = document.getElementsByName('psw')[0].value;
      var conpassw = document.getElementsByName('conpsw')[0].value;
      var exep = document.getElementsByName('experience')[0].value;
      var passins = document.getElementsByName('passins')[0].value;
      var passper = document.getElementsByName('passper')[0].value;
      var previns = document.getElementsByName('previnst')[0].value;
      var adhar = document.getElementsByName('adhar')[0].value;
      var pan = document.getElementsByName('pan')[0].value;
      var salary = document.getElementsByName('sal')[0].value;

      var letters = /^[A-Za-z]+$/;
      var numbers = /^[0-9]+$/;
      var letterNumber = /^[0-9a-zA-Z]+$/;
      var decimal=  /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}$/;
      var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
      var phoneno = /^\d{10}$/;

   if(name.match(letters))
   {
      if(phone.match(phoneno))
      {
         if(email.match(mailformat))
         {
            if(passw.localeCompare(conpassw)===0)
            {
               if(phone.match(decimal))
               {
                  if(exep.match(numbers))
                  {
                     if(passins.match(letters))
                     {
                        if(passper.match(numbers))
                        {
                           if(previns.match(letters))
                           {
                              if(adhar.match(letters)&&adhar.length===12)
                              {
                                 if(pan.match(letterNumber)&&pan.length===10)
                                 {
                                    return (true);
                                 }
                                 else    
                                 {alert("Should be in letter");
                                     return (false);
                                 }
                              }
                              else    
                              {alert("Should be in letter");
                                  return (false);
                              }
                           }
                           else    
                           {alert("Should be in letter");
                               return (false);
                           }
                        }
                        else    
                        {alert("Should be in number");
                            return (false);
                        }
                     }
                     else    
                     {alert("Should be in letter");
                         return (false);
                     }
                  }
                  else    
                  {alert("Should be in number");
                      return (false);
                  }
               }
               else    
               {alert("password between 8 to 15 characters which contain at least one lowercase letter, one uppercase letter, one numeric digit, and one special!");
                   return (false);
               }
            }
            else    
            {alert("password are not same!");
                return (false);
            }
         }
         else    
         {alert("You have entered an invalid email address!");
            return (false);
         }
      }
      else    
      {
         alert("You have entered an invalid phone number!");
         return (false);
      }
   }
   else    
   {alert("You have entered an invalid name!");
      return (false);
   }
}
function InfoValidation() 
   {
      var name =document.getElementsByName('name')[0].value;
      var phone = document.getElementsByName('phone')[0].value;
      var email = document.getElementsByName('email')[0].value;
      var passw = document.getElementsByName('psw')[0].value;
      var conpassw = document.getElementsByName('conpsw')[0].value;
      var exep = document.getElementsByName('experience')[0].value;
      var passins = document.getElementsByName('passins')[0].value;
      var passper = document.getElementsByName('passper')[0].value;
      var previns = document.getElementsByName('previnst')[0].value;
      var adhar = document.getElementsByName('adhar')[0].value;
      var pan = document.getElementsByName('pan')[0].value;
      var salary = document.getElementsByName('sal')[0].value;

      var letters = /^[A-Za-z]+$/;
      var numbers = /^[0-9]+$/;
      var letterNumber = /^[0-9a-zA-Z]+$/;
      var decimal=  /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}$/;
      var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
      var phoneno = /^\d{10}$/;

   if(name.match(letters))
   {
      if(phone.match(phoneno))
      {
         if(email.match(mailformat))
         {
            if(passw.localeCompare(conpassw)===0)
            {
               if(phone.match(decimal))
               {
                  if(exep.match(numbers))
                  {
                     if(passins.match(letters))
                     {
                        if(passper.match(numbers))
                        {
                           if(previns.match(letters))
                           {
                              if(adhar.match(letters)&&adhar.length===12)
                              {
                                 if(pan.match(letterNumber)&&pan.length===10)
                                 {
                                    return (true);
                                 }
                                 else    
                                 {alert("Should be in letter");
                                     return (false);
                                 }
                              }
                              else    
                              {alert("Should be in letter");
                                  return (false);
                              }
                           }
                           else    
                           {alert("Should be in letter");
                               return (false);
                           }
                        }
                        else    
                        {alert("Should be in number");
                            return (false);
                        }
                     }
                     else    
                     {alert("Should be in letter");
                         return (false);
                     }
                  }
                  else    
                  {alert("Should be in number");
                      return (false);
                  }
               }
               else    
               {alert("password between 8 to 15 characters which contain at least one lowercase letter, one uppercase letter, one numeric digit, and one special!");
                   return (false);
               }
            }
            else    
            {alert("password are not same!");
                return (false);
            }
         }
         else    
         {alert("You have entered an invalid email address!");
            return (false);
         }
      }
      else    
      {
         alert("You have entered an invalid phone number!");
         return (false);
      }
   }
   else    
   {alert("You have entered an invalid name!");
      return (false);
   }
}