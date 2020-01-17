<?php

require 'Classes/vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

session_start();

$num = intval($_SESSION['numArticle']);

$nom = $_POST['nom'];
$categorie = $_POST['categorie'];
$prix = $_POST['prix'];
$quantite = $_POST['quantite'];
$description = $_POST['description'];
$img = $_POST['img'];

$_SESSION['nom'][$num] = $nom;
$_SESSION['categorie'][$num] = 'Vêtements,'.$categorie;
$_SESSION['prix'][$num] = $prix;
$_SESSION['quantite'][$num] = $quantite;
$_SESSION['description'][$num] = $description;

if(empty($img) || !isset($img)) {
    $_SESSION['image'][$num] = '';
} else {
    $_SESSION['image'][$num] = 'D:\Images\AROMATIC\\'.$img;
}

if(isset($_POST['generer'])) {
    
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();
    $sheet->setCellValue('A1', 'Actif (0/1)');
    $sheet->setCellValue('B1', 'Nom');
    $sheet->setCellValue('C1', 'Catégories (x,y,z...)');
    $sheet->setCellValue('D1', 'Prix TTC');
    $sheet->setCellValue('E1', 'En soldes (0/1)');
    $sheet->setCellValue('F1', 'Montant de la remise');
    $sheet->setCellValue('G1', 'Pourcentage de réduction');
    $sheet->setCellValue('H1', 'Quantité');
    $sheet->setCellValue('I1', 'Description');
    $sheet->setCellValue('J1', 'URL des images (x,y,z, etc.)');
    
    for ($i = 1; $i <= $num; $i++) {
        $A = 'A'.($i+1);
        $B = 'B'.($i+1);
        $C = 'C'.($i+1);
        $D = 'D'.($i+1);
        $E = 'E'.($i+1);
        $F = 'F'.($i+1);
        $G = 'G'.($i+1);
        $H = 'H'.($i+1);
        $I = 'I'.($i+1);
        $J = 'J'.($i+1);
        
        $sheet->setCellValue($A, '1');
        $sheet->setCellValue($B, $_SESSION['nom'][$i]);
        $sheet->setCellValue($C, $_SESSION['categorie'][$num]);
        $sheet->setCellValue($D, $_SESSION['prix'][$i]);
        $sheet->setCellValue($E, '0');
        $sheet->setCellValue($F, '');
        $sheet->setCellValue($G, '');
        $sheet->setCellValue($H, $_SESSION['quantite'][$i]);
        $sheet->setCellValue($I, $_SESSION['description'][$i]);
        $sheet->setCellValue($J, $_SESSION['image'][$i]);
    }
    
    $writer = new Xlsx($spreadsheet);  
    session_destroy();   
    
    header('Content-Disposition: attachment; filename="NouveauxArticles.xlsx"');
    $writer->save('php://output');
    
} else {
    $_SESSION['numArticle']++;
    header('Location: index.php'); 
}


?>