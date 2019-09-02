// this for div that contain all product to show it 
let width_of_div = document.getElementById('contain_all1').clientWidth;
let items = document.querySelectorAll('.category .items .item').length;
let the_div_want_to_move_it = document.querySelectorAll('.category .items');

let width_of_indivual_div  = document.querySelectorAll('.category .items .item')[0].clientWidth;

let  avaliabe_div_in_contain_all  = Math.ceil(Number(width_of_div/width_of_indivual_div));

let suppose_clicked = Number(items - avaliabe_div_in_contain_all +1);
var clicked_right = 0;
let clicked_left = 0;
let probertLeft = 0;
let probertRight =0;

console.log(the_div_want_to_move_it.length);

function verticalٍScrollLeft(){

 clicked_left++;
 if(clicked_left <= suppose_clicked ){

   probertRight = Number(probertRight + 277.5);
   the_div_want_to_move_it[0].style.right = probertRight+"px";
  console.log('left');
 }

}// end scroll vertical 



function verticalٍScrollRight(){

   clicked_right++;
  
   if(clicked_left > 0 ){
      clicked_left--;
      
      the_div_want_to_move_it[0].style.right = (probertRight - 277.5) +"px";
      if(probertRight > 277.5){
         probertRight -=277.5;
      }
     
     
   }
  
  }// end scroll vertical 
  
