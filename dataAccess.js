console.log("data access");
function instSelect() {
   
   let  selectBtn = document.getElementById('course');
   var  COURSE = document.getElementById('course').value;
   selectBtn.addEventListener('click',selectBoxHandler);

   function selectBoxHandler() {
      // body...
      console.log("Select box is changed");
      
      const xhr = new XMLHttpRequest();
      xhr.open('POST','instructorData.php?course='+COURSE,true);
      xhr.onload=function () {
         // body...
         console.log(xhr.responseText)
      };
      xhr.send();
   }
}



function DataChecking(arguments) {
   // body...
   $(document).ready(function(){
    $('#getUser').on('click',function(){
        var  COURSE = $('course').val();
        $.ajax({
            type:'POST',
            url:'instructorData.php',
            dataType: "JSON",
            data:{course:COURSE},
            success:function(data){
                if(data.status == 'ok'){
                    /*$('#userName').text(data.result.name);
                    $('#userEmail').text(data.result.email);
                    $('#userPhone').text(data.result.phone);
                    $('#userCreated').text(data.result.created);
                    $('.user-content').slideDown();*/
                    console.log(data);
                }else{
                    $('.user-content').slideUp();
                    alert("User not found...");
                } 
            }
        });
    });
});
}