<?php
use App\Views\Components\Main\Main;
use App\Views\Components\Header\Header;
use App\Views\Pages\RecapAbsences\Popups\AbsencesDetailPopup;


?>
<html>
<head>
  <title>Mon site web</title>
  <link rel="stylesheet" href="/src/Views/DesignSystem.css">
  <link rel="stylesheet" href="/src/Views/Components/Button/Button.css">
  <link rel="stylesheet" href="/src/Views/Components/Text/Text.css">
  <link rel="stylesheet" href="/src/Views/Components/Input/Input.css">
  <link rel="stylesheet" href="/src/Views/Components/Input/FormInput.css">
  <link rel="stylesheet" href="/src/Views/Components/Table/Table.css">
  <link rel="stylesheet" href="/src/Views/Components/Header/Header.css">
  <link rel="stylesheet" href="/src/Views/Components/Main/Main.css">
  <link rel="stylesheet" href="/src/Views/Pages/RecapAbsences/Popups/Popup.css">
</head>
<body>
  <?php
  printf("<div class='hidden backdrop' id='backdrop'>");
  new AbsencesDetailPopup();
  printf("</div>");
  new Header();
  new Main();
  // new Table(array("Apprenants", "Groupe", "Nombres d'heures d'absences"));
  ?>
</body>
<script src="/src/Views/Pages/RecapAbsences/Subject.js"></script>
<script src="/src/Views/Pages/RecapAbsences/TableView.js"></script>
<script src="/src/Views/Pages/RecapAbsences/Popups/AbsencesDetailView.js"></script>
<script src="/src/Views/Pages/RecapAbsences/Popups/AbsencesModel.js"></script>
<script src="/src/Views/Pages/RecapAbsences/RecapAbsencesModel.js"></script>
<script src="/src/Views/Pages/RecapAbsences/AbsencesController.js"></script>
</html>