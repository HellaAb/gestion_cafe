               <?php
                  //creation et la connexion de la base de donnes
                  require('create.php');//execution et appel d un fichier
                  //creation des tables 1,2,3,4 et 5
                  $table1= "CREATE TABLE Produit(
                     IdProduit INT NOT NULL AUTO_INCREMENT,
                     NomProduit VARCHAR(30),
                     PrixUnitaire DOUBLE,
                     PRIMARY KEY(IdProduit)
                  )";
                  $table2="CREATE TABLE Cafe(
                     IdCafe INT NOT NULL AUTO_INCREMENT,
                     NomCafe VARCHAR(40),
                     AddresseCafe VARCHAR(60),
                     Ville VARCHAR(20),
                     Telephone VARCHAR(10),
                     PRIMARY KEY(IdCafe)
                  )";
                  $table3= "CREATE TABLE Commande(
                     Num_Commande INT NOT NULL AUTO_INCREMENT,
                     DateCommande DATETIME,
                     Type_Commande VARCHAR(50),
                     Prenom VARCHAR(20),
                     PRIMARY KEY(Num_Commande)
                  )";
                  $table4= "CREATE TABLE Caissier(
                     IdCaissier INT NOT NULL AUTO_INCREMENT,
                     Prenom VARCHAR(20),
                     Nom VARCHAR(20),
                     IdCafe INT NOT NULL,
                     PRIMARY KEY(IdCaissier),
                     FOREIGN KEY(IdCafe) REFERENCES Cafe(IdCafe)
                  )";
                  $table5= "CREATE TABLE Concerner(
                     Num_Commande INT NOT  NULL AUTO_INCREMENT,
                     NomProduit VARCHAR(30),
                     QuantiteProuduit VARCHAR(5) NOT NULL,
                     PRIMARY KEY(Num_Commande),
                     FOREIGN KEY(Num_Commande) REFERENCES Commande(Num_Commande)
                  )";
                  if ($conn->query($table1) === TRUE ){
                     echo "Table 1 est crée";
                  }
                  if ($conn->query($table2) === TRUE){
                     echo "Table 2 est crée";
                  }
                  if ($conn->query($table3) === TRUE){
                     echo "Table 3 est crée"; 
                  }
                  if ( $conn->query($table4) === TRUE){
                     echo "Table 4 est crée"; 
                  }
                  if($conn->query($table5) === TRUE){
                     echo "Table 4 est crée";
                  }
                  else { //echec du creation table
                     //echo "Error creating table: " . $conn->error;
                  }

                  // insertion des instances dans la table Cafe
                  $insert1 = "INSERT INTO Cafe (IdCafe,NomCafe, AddresseCafe, Ville, Telephone)
                  VALUES ('1', 'CAFE TIC TOK', 'Magasin 1E+2 Izdihar', 'MARRAKECH', '0642736767')";
                  if ($conn->query($insert1) === TRUE) {
                     echo "l insertion effectuee";
                  } 
                  // insertion des instances dans la table Caissier
                  $insert2 = "INSERT INTO Caissier (IdCaissier,Prenom, Nom, IdCafe)
                  VALUES ('1','oussama', 'Ait elbahi', '1')";
                  $insert3 = "INSERT INTO Caissier (IdCaissier,Prenom, Nom, IdCafe)
                  VALUES ('2', 'Ahmed', 'Marmid', '1')";
                  if ($conn->query($insert2) === TRUE && $conn->query($insert3) === TRUE) {
                     echo "";
                  } 
                  // insertion des instances dans la table Produit
                  $insert4 = "INSERT INTO Produit (IdProduit,NomProduit, PrixUnitaire)
                  VALUES ('1','cafenoir', '11')";
                  $insert5 = "INSERT INTO produit (IdProduit,NomProduit, PrixUnitaire)
                  VALUES ('2', 'panachie', '13')";
                  $insert6 = "INSERT INTO produit (IdProduit,NomProduit, PrixUnitaire)
                  VALUES ('3', 'cafelait', '11')";
                  $insert7 = "INSERT INTO produit (IdProduit,NomProduit, PrixUnitaire)
                  VALUES ('4', 'louisa', '12')";
                  $insert8 = "INSERT INTO produit (IdProduit,NomProduit, PrixUnitaire)
                  VALUES ('5', 'canethaouay', '12')";
                  if ($conn->query($insert4) === TRUE  && $conn->query($insert5) === TRUE && $conn->query($insert6) === TRUE && $conn->query($insert7) === TRUE && $conn->query($insert8) === TRUE){
                     echo "";
                  }
                  else {
                  //     echo "Error: " . $sql . "<br>" . $conn->error;
                  }
                  // $conn->close();
               ?>
<!DOCTYPE html>
      <html lang="en">
         <head>
         <meta charset="UTF-8">
         <meta http-equiv="X-UA-Compatible" content="IE=edge">
         <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <link rel="stylesheet" href="./style.css">
         <link rel="stylesheet" href="./main.js">
         <title>Ticket</title>
         <!-- ============================================================================================== -->
         <style>
                  body
                  {
                     background-color: rgb(233, 213, 189); 
                  }
                  .section1
                  {
                     /* border: 2px solid black; */
                     width: 23%;
                     margin-left: 600px;
                     text-align: center;
                     height: 40px;
                  }
                  .form1
                  {
                     border-style: solid; 
                     /* border-width: 1px 2em 1,5cm;  */
                     width: 50%; 
                     background-color: rgb(206, 133, 45);
                     position: absolute; 
                     left: 48%; 
                     top: 1%; 
                     text-align: center;
                     box-shadow: 10px black;
                     border-radius: 10px;
                  }
                  .add_form_field{
                  
                     border-style: solid; 
                     border-width: 1px 2em 1,5cm; 
                     width: 60%; 
                     background-color: rgb(206, 133, 45);
                      right: 100px;
                     /* position: absolute;  */
                     left: 20%; 
                     top: 20%; 
                     text-align: center;
                     box-shadow: 10px black;
                     border-radius: 10px;
                  }
                  select{
                  
                     width: 400px;
                     height: 50px;
                     border-style:  solid; 
                     border-width: 1px 2em 2,5cm;
                     font-size: large;
                  }
                  input{
                  
                     width: 392px;
                     height: 50px;
                     border-style: solid ;
                     border-width: 1px 2em 1,5cm;
                     font-size: large;
                  } 
                  button{
                  
                     width: 50%;
                     height: 50px;
                     border-style: solid ;
                     border-width: 1px 2em 1,5cm;
                     font-size: large;  
                  }
                  #btn{
                  
                     width: 200px;
                     height: 50px;
                     margin-top: -18px;
                     margin-left: 428px;
                     border-style: solid ;
                     border-width: 1px 2em 1,5cm;
                     font-size: large;
                     background-color: rgb(206, 133, 45);
                  }
                  #btn2{
                     width: 200px;
                     height: 50px;
                     margin-top: -106px;
                     margin-left: 218px;
                     border-style: solid ;
                     border-width: 1px 2em 1,5cm;
                     font-size: large;
                     background-color: rgb(206, 133, 45);
                     position: absolute;
                  }
                  #button-imprimer{
                     width: 200px;
                     height: 50px;
                     margin-top: -164px;
                     margin-left: 218px;
                     border-style: solid ;
                     border-width: 1px 2em 1,5cm;
                     font-size: large;
                     background-color: rgb(206, 133, 45);
                     position: absolute; 
                  }
                  .section2{
                  
                     border: 2px solid black;
                     width: 100px;
                     text-align: center;
                     margin-left: 550px;
                     
                  }
                  #NomCais{
                  
                     color: red;
                  }

                  .les_produit{
                     margin-left: 25px;
                    
                  }
                  #Produit span{
                     margin: 0 0 0 50px;
                  }
                  @media print{
                     .section2{
                        border: none;
                     }
                     #btn2{
                        display: none;
                     }
                     #btn{
                        display: none;
                     }
                     #button-imprimer{
                        display: none;
                     }



                  }         </style>
         <!-- =========================================================================================== -->
         </head>
         <body>
               <section classe="section1" id="section2">
               <?php
                  require('create.php');
                  $stm = $conn->prepare("SELECT * FROM Produit");
                  $stm ->execute();
                  $resultat = $stm ->get_result();
                  $cmp = 0;
                  // $photo1 = "./Image/x.png";
                  // echo $photo1;
               ?>
                  
               <?php
                  while($row = $resultat ->fetch_assoc())
                  {
                     $n = $row['NomProduit'];
                     $prix = $row['PrixUnitaire'];
                     echo "<button class='add_form_field' style='width: 46%; height: 50px; font-size: large;' value=$n onclick='cree(this.value)'>";
                  echo $row['NomProduit']."<span type='number' style='font-size:20px; font-weight:bold; background-color: rgb(233, 213, 189); font-size: large;'></span>";
                  echo "</button><br>";
                  echo "<input type='hidden' value=$prix id=prixPro$cmp onclick='cree(this.value)'>";
                     $cmp++;
                  }
                  echo "<br><br>";
               ?>
                  <br>
                  <!-- formulaire -->
                  <form class="form1" method="post">
                  <div class="Input"></div>
                  <!-- <div class="container1"> -->
                  <!-- debut de JavaScript -->
               <script>
               //       var x=0;
               //       var x2;
               //       function cree(nom){
                     
               //          if(!clicked(nom)){
               //             if(nonvide()){
               //          Input=document.createElement('input');
               //          Input.id='nomp';
               //          Input.setAttribute('type','text');
               //          Input.setAttribute('name','nom'+x);
               //          Input.setAttribute('class','Prod'+x);
               //          child=document.querySelector('.Input');
               //       child.appendChild(Input);
               //                      }
               //       nomp=document.querySelectorAll('#nomp');
               //       for (let i = 0; i < nomp.length; i++) {
               //          const element = nomp[i];
               //          if(element.value=="" && !clicked(nom)){
               //             Input.value=nom;
               //             Input.disabled=true;
               //          }
               //       }
               //       Input1=document.createElement('input');
               //          Input1.id='qte'+x;
               //          Input1.setAttribute('type','text');
               //          Input1.setAttribute('name','qte'+x);
               //       child.appendChild(Input1);
               //       x++;
               //       // localStorage.setItem('x',x);
               //       document.getElementById('nbr').value=x;
               //       var nbrprd=document.getElementById("nbrprd")
               //       document.getElementById('nbrprd').value=x;
               //       console.log('nbrprd')

               //       }
                     
                     
               //       //   Input.value=nom;
               //    }
               //    console.log(localStorage.getItem(x));

               //    function clicked(nom){
               //       nomp=document.querySelectorAll('#nomp');
               //       for (let i = 0; i < nomp.length; i++) {
               //          const element = nomp[i];
               //          if(element.value==nom){
               //             return true;
               //          }
                        
               //       }
               //       return false;
               //       }

               //       function nonvide(){
               //          nomp=document.querySelectorAll('#nomp');
               //       for (let i = 0; i < nomp.length; i++) {
               //          const element = nomp[i];
               //          if(element.value==""){
               //          return false;
               //          }
                    
               //       }
               //       return true;
               //       }

               //       function disable(){
               //          nomp=document.querySelectorAll('#nomp');
               //       for (let i = 0; i < nomp.length; i++) {
               //          const element = nomp[i];
                        
               //          element.disabled=false;
               //       }
               //       }
               </script>
               <br><br><br><br>
               <?php
                  require('create.php');
                  $stm1 = $conn->prepare("SELECT * FROM Caissier");
                  $stm1 ->execute();
                  $resultat1 = $stm1 ->get_result();
               ?>
                  <!-- rselection les donnees dans la table caissier -->
               <?php 
                  echo "<select name='caissier' id='caissier' border='1' style='background-color: rgb(233, 213, 189);'>";
                  while($row1 = $resultat1 ->fetch_assoc()){
                  echo "<optgroup><option value=".$row1['Prenom']." style='background-color: rgb(233, 213, 189);  width: 392px; height: 50px; border-style: solid ; border-width: 1px 2em 1,5cm; font-size: large;'>".$row1['Prenom']."</option></optgroup>";
                  }
                  echo "</select>";
               ?>
                  <br><br><br>
                  <select name='typecmd' class="select2" id="typecmd" style="background-color: rgb(233, 213, 189);">
                     <optgroup>
                        <option value="Sur place">Sur place</option>
                        <option value="Emporté">Emporté</option>
                     </optgroup>
                  </select><br><br><br>
                  <input type="hidden" id="nbr" name="nbr">
                  </form>
                     <button id="btn" style=" position: absolute; margin: 0 10px 0 0; width: 200px; height: 50px; font-size: large;">Envoyer</button> 
                  </section>
                  <!-- ====================================================================================================  -->
                  
                  <form action="traitement.php" class="form2" method="POST">
                  <section class="section2" style="display: none;width:28%;margin:auto;" id="section1">
                  <div class="div1">
               <?php 
                  require('create.php');
                  $tcafe ="SELECT NomCafe,Ville,AddresseCafe,Telephone FROM Cafe ";
                  $resultat = $conn->query($tcafe);
                  while ($row = $resultat->fetch_assoc())
                  {
                  echo "<h1>" . $row["NomCafe"] . "</h1><p>" . $row["AddresseCafe"] . "</p><p>" . $row["Ville"] . "</p><p> Tel :" . $row["Telephone"] . "</p>";
                  }
               ?>
                   </div>
                  --------------------------------------------------------------
               <?php
                  require('create.php');
                  $ntkt =mysqli_query( $conn,"SELECT * FROM Commande");
                  //   $resultat1 = $conn->query($ntkt);
                     while($row=mysqli_fetch_array($ntkt)){
                     $num = $row["Num_Commande"];
                     }
               ?>
                  <div class="div2">
                  <h3 id="TypeCmd" ></h3>
                  <input type="hidden" name="getTypeCmd" id="getTypeCmd">
                  <h3 name="NumCmd"><?php echo $num + 1; ?></h3>
               <?php 
                   echo  "<p  name='date'style='padding: 0 299px 0 51px'>". date('d/m/Y,h:i:sa')."</p>";
               ?>
               <?php 
                  require('create.php');
                  $nomcs ="SELECT Prenom FROM Caissier";
                  $resultat = $conn->query($nomcs);
                  $row = $resultat->fetch_assoc();
               ?>
                  <span style="padding: 0 210px 0 0">Caissier <span style="padding:0 0 0 " id='NomCais'></span></span>
                  <input type="hidden" id="getNomCais" name="getNomCais">
                  </div>
                  =====================================
                  <div class="div3">
                     <h3 style="padding:0 0 0 40px">Produit<span style="padding:0 0 0 84px"> PU</span> <span style="padding:0 0 0 30px"> Qte </span> <span style="padding:0 0 0 30px"> PT</span>  </h3>
                  </div>
                  =====================================
                  <div class="div4"> 
                  <h3 id="Produit" class="Produit" type="hidden"></h3>
                  <input type="hidden" name="prod0" id="prod0">
                  <input type="hidden" name="Qte0" id="QteI0">
                  <input type="hidden" name="prod1" id="prod1">
                  <input type="hidden" name="Qte1" id="QteI1">
                  <input type="hidden" name="prod2" id="prod2">
                  <input type="hidden" name="Qte2" id="QteI2">
                  <input type="hidden" name="prod3" id="prod3">
                  <input type="hidden" name="Qte3" id="QteI3">
                  <input type="hidden" name="prod4" id="prod4">
                  <input type="hidden" name="Qte4" id="QteI4">
                  <input type="hidden" name="prod5" id="prod5">
                  <input type="hidden" name="Qte5" id="QteI5">

                  <!-- <h3 style="padding:0 0 0 40px">les produits <span style='padding:0 0 0 85px'></span> <span style='padding:0 0 0 50px'></span> <span style='padding:0 0 0 45px'></span>  </h3> -->
                  </div>
                  =====================================
                  <div class="div5">
                     <p>Nbre de produits <span style='padding:0 0 0 80px' id="nbrprd">..,..</span></p>
                     <h1 style="padding:0 0 0 40px">Total<span style="padding:0 0 0 60px" > :</span><span style='padding:0 0 0 80px' id="Totale2">..,..</span></h1>
                     <p style="padding:0 0 0 40px">Especes <span stye="padding:0 0 0 160px" id="Totale">..,..</span></p>
                  </div>
                  --------------------------------------------------------------
                  <h3>Merci de votre visite</h3>
                  <button id="btn" >Envoyer</button> 
                  <input type="button" id="button-imprimer" value="Imprimer" />
                  </form>
                     <button id="btn2" >Retour</button>
               <script> var bouton = document.getElementById('button-imprimer');
                  bouton.onclick = function(e) {
                  e.preventDefault();
                  print();
                  }
              </script>
               <script src="main2.js"></script>
               </body>
         </html>
         