<%@ page contentType="text/html; charset=iso-8859-1" language="java" import="java.sql.*" errorPage="" %>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<style type="text/css">
<!--
body {
	background-image: url(index_Image/fond.gif);
	background-repeat: repeat;
}
a:link {
	color: #0000FF;
}
a:visited {
	color: #0000FF;
}
a:hover {
	color: #FF0000;
}
a:active {
	color: #0000FF;
}
.style3 {
	color: #996633;
	text-decoration: blink;
}
.style5 {font-size: 18px}
.style7 {	color: #3399FF;
	font-weight: bold;
}
.Style10 {
	font-size: 36px;
	font-weight: bold;
}
.Style11 {font-size: 24px}
.Style14 {font-size: 24px; color: #000000; }
.Style80 {font-size: 24px; font-weight: bold; color: #000000; }
.Style81 {color: #000000}
.Style82 {font-size: 36px; font-weight: bold; color: #000000; }
.Style83 {font-size: 30px}
.Style87 {color: #000000; font-size: 26px; }
-->
</style>
</head>

<body>
<div align="center">
  <table width="1192" height="269" border="0" align="center" bordercolor="#FFFFFF"  >
    <tr>
      <td width="1267" height="75"  align="center" bordercolor="#000000" bgcolor="#CDAE46" class="style5 style3 footer"><p>&nbsp;</p>
      <table width="1126" height="111" border="0" align="center"  >
          <tr>
            <td width="1292" height="107"  align="center" bordercolor="#000000" bgcolor="#CDAE46" class="style5 style3 footer"><p align="center"><span class="Style10"><span class="Style81">Domaine : </span><span class="Style11"><span class="Style81">
            <? 
			echo $_POST['methode']; ?></span></span>
              <?

$d=$_POST['methode'];

$link = mysql_connect("localhost", "root", ""); // Connexion  MySQL
mysql_select_db("bas-lexique"); // Slection de la base dico
	
$charset = mysql_client_encoding($link);
mysql_query("SET CHARACTER SET 'utf8'", $link);

if ($reponse = mysql_query("SELECT * FROM domaine,sousdomaine,contient,mot WHERE domaine.Nom_domaine_FR LIKE  '$d%'
and domaine.cle_domaine=sousdomaine.cle_domaine 
and sousdomaine.cle_soudomain=contient.cle_soudomain
and contient.Cle_mot=mot.Cle_mot ORDER BY `Mot_FR` ASC") ) { $cmpt=mysql_num_rows($reponse); }  
?>
            </span></p>
              <table width="1089" border="1" bordercolor="#333333">
                <tr>
                  <td bgcolor="#6699FF"><span class="Style80">Le Mot En Français <span class="Style83">^</span></span></td>
                  <td bgcolor="#6699FF"><span class="Style80">الكلمة في اللغة العربية </span></td>
                  <td bgcolor="#6699FF"><span class="Style80">The Word In English</span></td>
                </tr>
                <tr>
                  <td colspan="3"><span class="style5"><span class="Style11">
                    <? $c1=0;  $c2=0;  $c3=0;
while ($donnees = mysql_fetch_array($reponse)) { ?>
                  </span></span></td>
                </tr>
                <tr>
                  <td width="371" height="36"><span class="Style11"><span class="style5"><? if ($donnees['Mot_FR']=="") {  echo "  ";   }else{ $c1=$c1+1;
echo $donnees['Mot_FR'];  echo"                                              "; } ?></span></span></td>
                  <td width="344"><span class="style5">
                    <? if ($donnees['Mot_AR']=="") {  echo "  ";   }else{  $c2=$c2+1;
echo $donnees['Mot_AR'];  echo"                                              "; } ?>
                  </span></td>
                  <td width="352"><span class="style5"><? if ($donnees['Mot_EN']=="") {  echo "  ";   }else{  $c3=$c3+1;
echo $donnees['Mot_EN'];  echo"                                              ";  }  }
 ?></span></td>
                </tr>
                <tr>
                  <td height="44" bordercolor="#0000FF" bgcolor="#6699FF"><span class="Style11">
                    <span class="Style81">Nombre de Mot En Français</span> <span class="Style81">:</span>
                    <?
echo $c1; ?>
                  </span></td>
                  <td bordercolor="#0000FF" bgcolor="#6699FF"><span class="Style11">
                    <span class="Style81">Nombre de Mot En Arabe </span> <span class="Style81">:</span>
                    <?
echo $c2; ?>
                  </span></td>
                  <td bordercolor="#0000FF" bgcolor="#6699FF"><span class="Style11">
                    <span class="Style81">Nombre de Mot En Anglais </span> <span class="Style81">:</span>
                    <?
echo $c3; ?>
                  </span></td>
                </tr>
              </table>            </td>
          </tr>
        </table>
        <p class="Style11"><span class="Style87">Nombre Totale</span> <span class="Style87">: </span><span class="Style11 Style81">
        <?	
echo $cmpt;
 mysql_close(); // Dconnexion de MySQL	 ?>
        </span></p>      </td>
    </tr>
  </table>
  <p>&nbsp;</p>
</div>
<div align="justify">
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p><a href="Untitled-7.php" class="Style10">Précedent</a></p>
</div></body>
</html>
