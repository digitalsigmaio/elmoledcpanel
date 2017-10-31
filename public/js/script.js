$(document).ready(function () {
   $('.deleteItem').on('click', function () {
       if (confirm('Are you sure?')){
       } else {
           return false;
       }
   })
});