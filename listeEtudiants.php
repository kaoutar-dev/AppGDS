<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Stagiaires</title>
    <style>
        /* Styles CSS */
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: rgb(52, 51, 48);
        }

        h1 {
            text-align: center;
            color: #ff7200;
        }

        .container {
            width: 60%;
            margin: 0 auto;
        }

        .form-container {
            border: 1px solid #ddd;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
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
            font-size: 14px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        button {
            padding: 10px;
            font-size: 16px;
            color: white;
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
            background-color: #fff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        table th, table td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: center;
        }

        table th {
            background-color: bisque;
            font-weight: bold;
        }

        table td {
            background-color: #fff;
        }
    </style>
</head>
<body>
    <h1>Liste des Stagiaires</h1>

    <div class="container">
        <!-- Formulaire pour filtrer les stagiaires -->
        <div class="form-container">
            <form>
                <label for="filiere">Filière :</label>
                <input type="text" id="filiere" name="filiere" placeholder="Exemple : Informatique" required>

                <label for="annee">Année :</label>
                <input type="number" id="annee" name="anneeBac" placeholder="Exemple : 2024" required>

                <button type="submit">Afficher</button>
            </form>
        </div>

        <!-- Table pour afficher les stagiaires -->
        <table id="stagiaireTable">
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

