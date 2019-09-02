// $(document).ready(function() {
//     $('#summernote').summernote({
//         placeholder: 'Hello bootstrap 4',
//         tabsize: 2,
//         height: 200
//    });
    
//   });
 
// this for preview image before send it to server in page add
var loadFile = function(event) {
    var real_image = document.getElementById('real_image');
    real_image.src = window.URL.createObjectURL(event.target.files[0]);
    };

// this block of code for increase and decrease rows to more or less details for the product that will store in database
let table = document.getElementById('tbody');

function AddRow(){
  table.insertAdjacentHTML('beforeend',`<tr><td><input type='text' name='details[]'class='rounded border-0 pl-2 w-75 pt-1 pb-1'></td><td><input type='text' name='details[]' class='rounded border-0 pl-2 w-75 pt-1 pb-1'></td></tr>`);
}    
function DeleteRow(){
    table.lastElementChild.remove();
}
