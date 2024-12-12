<?php

class eoneaController extends Controller
{

    /**
     * indexAction
     * Conduit à la page de soumission de dossier
     * @return void
     */
    function indexAction()
    {
        $emploi = $this->Repository('emplois');
        $emplois = $emploi->list();
        $dipl = $this->Repository('diplome');
        $diplomes = $dipl->list();

        // Affichage de la page de soumission
        $this->render('eonea/soumission', ['emplois' => $emplois, 'diplomes' => $diplomes]);
    }

    /**
     * soumissionAction
     * Permet de soumissionner un dossier
     * Redirige vers la page de Recepisse
     * @return void
     */
    function soumissionAction()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {

            // Debug pour voir les données soumises
            error_log(print_r($_POST, true));
            error_log(print_r($_FILES, true));

            // Vérification des champs obligatoires
            foreach ($_POST as $k => $post_content) {
                if ($k != "dn" && empty($post_content)) {
                    $error = "Un des champs n'a pas été correctement rempli.";
                    $this->render("eonea/soumission", ['error' => $error]);
                    return;
                } else {
                    $_post[$k] = htmlentities($post_content);
                }
            }

            $_post['files'] = $_FILES;
            $candidat = $this->Repository('candidat');

            // Génération d'un code unique pour le candidat
            $_post['code'] = "CAND" . str_pad(mt_rand(1, 99999), 5, '0', STR_PAD_LEFT);
            $saveCandidat = $candidat->create($_post);

            if ($saveCandidat['save'] == true) {
                // Redirection vers la page de récapitulation avec le code du candidat
                header('Location: recepisse?code=' . $_post['code']);
                exit; // Arrêt de l'exécution pour éviter tout affichage ou traitement supplémentaire
            } else {
                // En cas d'erreur lors de la sauvegarde
                $error = "Une erreur s'est produite lors de la soumission.";
                $this->render("eonea/soumission", ['error' => $error]);
                return;
            }
        } else {
            // Si la méthode n'est pas POST ou si le bouton submit n'est pas présent
            $this->render("eonea/soumission", ['error' => "Méthode non autorisée ou soumission invalide."]);
        }
    }

    /**
     * recepisseAction
     * Affiche la page de récapitulation
     * @return void
     */
    function recepisseAction()
    {
        $emploi = $this->Repository('emplois');
        $emplois = $emploi->list();
        $dipl = $this->Repository('diplome');
        $diplomes = $dipl->list();

        // Récupération du code du candidat via GET
        if (isset($_GET['code'])) {
            $code = $_GET['code'];
            $candidat = $this->Repository('candidat');
            $candidatInfos = $candidat->get($code);

            if ($candidatInfos) {
                // Affichage de la page de récapitulation
                $this->render('eonea/recepisse', [
                    'emplois' => $emplois,
                    'diplomes' => $diplomes,
                    'candidat' => $candidatInfos
                ]);
            } else {
                // Gestion du cas où le candidat est introuvable
                $this->render('eonea/soumission', [
                    'emplois' => $emplois,
                    'diplomes' => $diplomes,
                    'error' => "Candidat introuvable."
                ]);
            }
        } else {
            // Gestion du cas où aucun code n'est fourni
            $this->render('eonea/soumission', [
                'emplois' => $emplois,
                'diplomes' => $diplomes,
                'error' => "Aucun code candidat trouvé."
            ]);
        }
    }
}

?>
