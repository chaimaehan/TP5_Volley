<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include_once '../racine.php';
    include_once RACINE . '/service/EtudiantService.php';
    
    // Récupérer les données de l'étudiant
    $id = isset($_POST['id']) ? $_POST['id'] : null;
    $nom = isset($_POST['nom']) ? $_POST['nom'] : null;
    $prenom = isset($_POST['prenom']) ? $_POST['prenom'] : null;
    $ville = isset($_POST['ville']) ? $_POST['ville'] : null;
    $sexe = isset($_POST['sexe']) ? $_POST['sexe'] : null;
    
    if ($id && $nom && $prenom && $ville && $sexe) {
        $es = new EtudiantService();
        $etudiant = new Etudiant($id, $nom, $prenom, $ville, $sexe);
        $result = $es->update($etudiant);
        
        header('Content-type: application/json');
        echo json_encode(['success' => $result]);
    } else {
        header('Content-type: application/json');
        echo json_encode(['success' => false, 'message' => 'Données incomplètes']);
    }
}
?>