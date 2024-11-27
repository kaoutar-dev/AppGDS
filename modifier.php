<?php
// Inclure le fichier de connexion
include 'db_connect.php';

// Initialiser les variables pour afficher les stagiaires
$stagiaires = [];

// Récupérer tous les stagiaires de la base de données
try {
    $sql = "SELECT * FROM stagiaires";
    $stmt = $pdo->query($sql);
    $stagiaires = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}

// Gérer la modification d'un stagiaire
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $matricule = $_POST['matStagiaire'];
    $nom = $_POST['nomStagiaire'];
    $prenom = $_POST['prenomStagiaire'];
    $filiere = $_POST['filiereStagiaire'];
    $anneeEtude = $_POST['anneeEtude'];
    $typeBac = $_POST['typeBac'];
    $anneeBac = $_POST['anneeBac'];

    try {
        $sql = "UPDATE stagiaires 
                SET nomStagiaire = :nom, 
                    prenomStagiaire = :prenom, 
                    filiereStagiaire = :filiere, 
                    anneeEtude = :anneeEtude, 
                    typeBac = :typeBac, 
                    anneeBac = :anneeBac 
                WHERE matStagiaire = :matricule";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':nom' => $nom,
            ':prenom' => $prenom,
            ':filiere' => $filiere,
            ':anneeEtude' => $anneeEtude,
            ':typeBac' => $typeBac,
            ':anneeBac' => $anneeBac,
            ':matricule' => $matricule,
        ]);

        // Rafraîchir la page pour afficher les modifications
        header("Location: modifier.php");
        exit();
    } catch (PDOException $e) {
        echo "Erreur lors de la modification : " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un Stagiaire</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: rgb(52, 51, 48);
        }

        h1 , h2 {
            text-align: center;
            color: #ff7200;
        }

        .form-container, .table-container {
            margin: 0 auto;
            width: 80%;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        label {
            font-weight: bold;
        }

        input {
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            padding: 10px;
            font-size: 16px;
            color: #fff;
            background-color: #ff7200;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #e37b26;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table th, table td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: center;
        }

        table th {
            background-color: #f4f4f4;
            font-weight: bold;
        }

        table tbody tr:nth-child(odd) {
            background-color: #f9f9f9;
        }

        .edit-btn {
            color: white;
            background-color: #ff7200;
            padding: 5px 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .edit-btn:hover {
            background-color: #e37b26;
        }
    </style>
</head>
<body>
    <h1>Modification des Stagiaires</h1>

    <!-- Table pour afficher les stagiaires -->
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>Matricule</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Filière</th>
                    <th>Année d'étude</th>
                    <th>Type Bac</th>
                    <th>Année Bac</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php if (!empty($stagiaires)): ?>
                    <?php foreach ($stagiaires as $stagiaire): ?>
                        <tr>
                            <td><?= htmlspecialchars($stagiaire['matStagiaire']) ?></td>
                            <td><?= htmlspecialchars($stagiaire['nomStagiaire']) ?></td>
                            <td><?= htmlspecialchars($stagiaire['prenomStagiaire']) ?></td>
                            <td><?= htmlspecialchars($stagiaire['filiereStagiaire']) ?></td>
                            <td><?= htmlspecialchars($stagiaire['anneeEtude']) ?></td>
                            <td><?= htmlspecialchars($stagiaire['typeBac']) ?></td>
                            <td><?= htmlspecialchars($stagiaire['anneeBac']) ?></td>
                            <td>
                                <button class="edit-btn" onclick="remplirFormulaire(<?= htmlspecialchars(json_encode($stagiaire)) ?>)">Modifier</button>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="8">Aucun stagiaire trouvé.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div><br>

    <!-- Formulaire pour modifier un stagiaire -->
    <div class="form-container">
        <h2>Modifier un Stagiaire</h2>
        <form method="POST" action="modifier.php">
            <input type="hidden" id="matStagiaire" name="matStagiaire">

            <label for="nomStagiaire">Nom :</label>
            <input type="text" id="nomStagiaire" name="nomStagiaire" required>

            <label for="prenomStagiaire">Prénom :</label>
            <input type="text" id="prenomStagiaire" name="prenomStagiaire" required>

            <label for="filiereStagiaire">Filière :</label>
            <input type="text" id="filiereStagiaire" name="filiereStagiaire" required>

            <label for="anneeEtude">Année d'étude :</label>
            <input type="number" id="anneeEtude" name="anneeEtude" required>

            <label for="typeBac">Type Bac :</label>
            <input type="text" id="typeBac" name="typeBac" required>

            <label for="anneeBac">Année Bac :</label>
            <input type="text" id="anneeBac" name="anneeBac" required>

            <button type="submit">Enregistrer les modifications</button>
        </form>
    </div>

    <script>
        // Remplir le formulaire avec les données du stagiaire à modifier
        function remplirFormulaire(stagiaire) {
            document.getElementById('matStagiaire').value = stagiaire.matStagiaire;
            document.getElementById('nomStagiaire').value = stagiaire.nomStagiaire;
            document.getElementById('prenomStagiaire').value = stagiaire.prenomStagiaire;
            document.getElementById('filiereStagiaire').value = stagiaire.filiereStagiaire;
            document.getElementById('anneeEtude').value = stagiaire.anneeEtude;
            document.getElementById('typeBac').value = stagiaire.typeBac;
            document.getElementById('anneeBac').value = stagiaire.anneeBac;
        }
    </script>
</body>
</html>
