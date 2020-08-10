function check_all(source){
var colors = document.getElementsByName("cb[]");
var i;
if (source.checked) 
for (i = 0; i < colors.length; i++) 
  colors[i].checked=true;
else
for (i = 0; i < colors.length; i++)

  colors[i].checked=false;

}
