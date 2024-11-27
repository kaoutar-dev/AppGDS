
<?php
include 'db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du formulaire
    $matricule = $_POST['matricule'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $filiere = $_POST['filiere'];
    $anneeEtude = $_POST['anneeEtude'];
    $typeBac = $_POST['typeBac'];
    $anneeBac = $_POST['anneeBac'];

    // Insertion dans la base de données
    $sql = "INSERT INTO stagiaires (matStagiaire, nomStagiaire, prenomStagiaire, filiereStagiaire, anneeEtude, typeBac, anneeBac) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    if ($stmt->execute([$matricule, $nom, $prenom, $filiere, $anneeEtude, $typeBac, $anneeBac])) {
        header("Location: ajouter.php?success=1");
        exit;

    } else {
        header("Location: ajouter.php?success=0");
        exit;
    }

}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Stagiaires</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: rgb(52, 51, 48);
        }
        h1 {
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
            background-color: bisque;
            font-weight: bold;
        }
        table tbody tr:nth-child(odd) {
            background-color: #f9f9f9;
        }

        .message {
            text-align: center;
            padding: 10px;
            font-size: 16px;
            margin-bottom: 20px;
        }

        .success {
            color: green;
            background-color: #d4edda;
            border: 1px solid #c3e6cb;
            border-radius: 4px;
        }

        .error {
            color: red;
            background-color: #f8d7da;
            border: 1px solid #f5c6cb;
            border-radius: 4px;
        }
    </style>
</head>
<body>
    <h1>Ajouter un Stagiaire</h1>
    <div class="form-container">
        <!-- Affichage du message de confirmation ou d'erreur -->
        <?php if (isset($_GET['success'])): ?>
            <?php if ($_GET['success'] == 1): ?>
                <div class="message success">Stagiaire ajouté avec succès !</div>
            <?php elseif ($_GET['success'] == 0): ?>
                <div class="message error">Erreur lors de l'ajout du stagiaire. Veuillez réessayer.</div>
            <?php endif; ?>
        <?php endif; ?>
        <form action="ajouter.php" method="POST">
            <label for="matricule">Matricule :</label>
            <input type="text" id="matricule" name="matricule" placeholder="Exemple : 1001" required>
            <label for="nom">Nom :</label>
            <input type="text" id="nom" name="nom" placeholder="Exemple : Dupont" required>
            <label for="prenom">Prénom :</label>
            <input type="text" id="prenom" name="prenom" placeholder="Exemple : Marie" required>
            <label for="filiere">Filière :</label>
            <input type="text" id="filiere" name="filiere" placeholder="Exemple : Informatique" required>
            <label for="anneeEtude">Année d'étude :</label>
            <input type="number" id="anneeEtude" name="anneeEtude" placeholder="Exemple : 2024" required>
            <label for="typeBac">Type Bac :</label>
            <input type="text" id="typeBac" name="typeBac" placeholder="Exemple : Science de la vie et de la terre" required>
            <label for="anneeBac">Année Bac :</label>
            <input type="text" id="anneeBac" name="anneeBac" placeholder="Exemple : 2023" required>
            <button type="submit">Ajouter</button>
        </form>
    </div>
    <div class="table-container">
        <h2>Liste des Stagiaires</h2>
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
                </tr>
            </thead>
            <tbody>
            <?php
                include 'db_connect.php';
                $sql = "SELECT * FROM stagiaires";
                $stmt = $pdo->query($sql);
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr>
                            <td>{$row['matStagiaire']}</td>
                            <td>{$row['nomStagiaire']}</td>
                            <td>{$row['prenomStagiaire']}</td>
                            <td>{$row['filiereStagiaire']}</td>
                            <td>{$row['anneeEtude']}</td>
                            <td>{$row['typeBac']}</td>
                            <td>{$row['anneeBac']}</td>
                          </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>

