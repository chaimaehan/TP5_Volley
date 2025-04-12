<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include_once '../racine.php';
    include_once RACINE . '/service/EtudiantService.php';
    include_once RACINE . '/classes/Etudiant.php';
    
    // Récupérer l'ID de l'étudiant à supprimer
    $id = isset($_POST['id']) ? $_POST['id'] : null;
    
    if ($id) {
        $es = new EtudiantService();
        
        // Récupérer l'étudiant par son ID
        $etudiant = $es->findById($id);
        
        // Supprimer l'étudiant
        $result = $es->delete($etudiant);
        
        header('Content-type: application/json');
        echo json_encode(['success' => $result]);
    } else {
        header('Content-type: application/json');
        echo json_encode(['success' => false, 'message' => 'ID non fourni']);
    }
}
?>