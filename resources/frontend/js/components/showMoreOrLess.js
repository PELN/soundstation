 // show more/less - product detail description
 $('#show-less').hide();
 function showMore(target){
     let prev = target.previousElementSibling;
     prev.style.height = prev.scrollHeight + "px";
     target.style.display = "none";   
     $('#show-less').show();
 }
 function showLess(target){
     let prev = target.previousElementSibling.previousElementSibling;
     prev.style.height = 220 + "px";
     target.style.display = "none";
     $('#show-more').show();
 }