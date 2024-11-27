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

    </style>
</head>
<body>
    <h1>Ajouter un Stagiaire</h1>
    <div class="form-container">
        
        <form >
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
                
            </tbody>
        </table>
    </div>
</body>
</html>

