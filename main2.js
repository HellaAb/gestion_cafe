var NomCais=document.getElementById("NomCais");
console.log(NomCais);
var caissier=document.getElementById("caissier");
console.log(caissier);
var btn=document.getElementById("btn");
var section1=document.getElementById("section1");
var section2=document.getElementById("section2");
var btn2=document.getElementById("btn2");
var typecmd=document.getElementById("typecmd");
var TypeCmd=document.getElementById("TypeCmd");
var nbr=document.getElementById("nbr");
var nbrprd=document.getElementById("nbrprd");
var Totale=document.getElementById("Totale");
var Totale2=document.getElementById("Totale2");
var getNomCais=document.getElementById("getNomCais");
var x=0;
var x2;
var getNomCais=document.getElementById("getNomCais");
var getTypeCmd=document.getElementById("getTypeCmd");
var getProd=document.getElementById("getProd");
var getQte=document.getElementById("getQte");
function cree(nom){
  
   if(!clicked(nom)){
      if(nonvide()){
   Input=document.createElement('input');
   Input.id='nomp';
   Input.setAttribute('type','text');
   Input.setAttribute('name','nom'+x);
   Input.setAttribute('class','Prod'+x);
   child=document.querySelector('.Input');

child.appendChild(Input);
               }
nomp=document.querySelectorAll('#nomp');
for (let i = 0; i < nomp.length; i++) {
   const element = nomp[i];
   if(element.value=="" && !clicked(nom)){
      Input.value=nom;
      Input.disabled=true;
   }
}
Input1=document.createElement('input');
   Input1.id='qte'+x;
   Input1.setAttribute('type','text');
   // Input1.setAttribute('placeholder','entrer la quantite');
   Input1.setAttribute('name','qte'+x);
Input1.placeholder="entrer la quantite de "+nom;
child.appendChild(Input1);
x++;
// localStorage.setItem('x',x);
document.getElementById('nbr').value=x;

}


//   Input.value=nom;
}
console.log(localStorage.getItem(x));

function clicked(nom){
nomp=document.querySelectorAll('#nomp');
for (let i = 0; i < nomp.length; i++) {
   const element = nomp[i];
   if(element.value==nom){
      return true;
   }
   
}
return false;
}

function nonvide(){
   nomp=document.querySelectorAll('#nomp');
for (let i = 0; i < nomp.length; i++) {
   const element = nomp[i];
   if(element.value==""){
   return false;
   }
   
}
return true;
}

function disable(){
   nomp=document.querySelectorAll('#nomp');
for (let i = 0; i < nomp.length; i++) {
   const element = nomp[i];
   
   element.disabled=false;
}
} 
console.log(btn);
console.log(section1);
btn.addEventListener("click",()=>{
    var nbr=document.getElementById("nbr");
    section1.style.display="block";
    section2.style.display="none";
    NomCais.innerHTML=caissier.value;
    TypeCmd.innerText=typecmd.value;
    for(var i=0;i<nbr.value;i++){
        //creation div
        div=document.createElement('div');
        div.setAttribute('id','les_produit');
        div.setAttribute('class','les_produit');
        child=document.querySelector('.div4');
        child.appendChild(div);
        // creation h3
        h3=document.createElement('h3');
        h3.setAttribute('id','Produit');
        div.appendChild(h3);
        // creation span1
        span1=document.createElement('span');
        span1.setAttribute('id','Prod'+(i));
        h3.appendChild(span1);
        // creation span2
        span2=document.createElement('span');
        span2.setAttribute('id','PU'+(i));
        h3.appendChild(span2);
        // creation span3
        span3=document.createElement('span');
        span3.setAttribute('id','Qte'+(i));
        h3.appendChild(span3);
         // creation span4
         span4=document.createElement('span');
         span4.setAttribute('id','PT'+(i));
         h3.appendChild(span4);
    }
    s=0;
    for(var i=0;i<nbr.value;i++){
        var prod=document.getElementById("Prod"+i);
        var PU = document.getElementById("PU"+i);
        var Qte = document.getElementById("Qte"+i);
        var PT=document.getElementById("PT"+i);
        var getPU=document.getElementById("prixPro"+i);
        var getQte=document.getElementById("qte"+i);
        var getProd=document.querySelector(".Prod"+i);
        var prodi=document.getElementById("prod"+i);
        var qtei=document.getElementById("QteI"+i);
        prod.innerText=getProd.value;
        prodi.value=prod.textContent;
       
        PU.innerText=getPU.value;
        // console.log(getPU.value);
        Qte.innerText=getQte.value; 
        qtei.value=Qte.textContent;
        PT.innerHTML = parseInt(PU.textContent) * parseInt (Qte.textContent);
        s=s+parseInt(PT.textContent);
        
    }
    nbrprd.innerText=nbr.value;
    Totale.innerText=s;
    Totale2.innerText=s;
    nbrprd.innerText=nbr.value;
    Totale.innerText=s;
    Totale2.innerText=s;
    getNomCais.value=NomCais.textContent;
    getTypeCmd.value=TypeCmd.textContent;

         })
         btn2.addEventListener("click",()=>{
            section1.style.display="none";
            section2.style.display="block";
         })

