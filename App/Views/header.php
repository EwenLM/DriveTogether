<?php require 'head.php'; ?>

<?php if (isset($_SESSION["msg"])) {
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
} ?>

<header class="flex justify-between items-center px-6 lg:px-12 py-4">
    <div class="flex items-center">
        <a href="#" class="md:mr-20 lg:mr-60">
            <img src="Assets/Images/logoDT.png" alt="logo" class=" w-12 md:w-20 lg:w-25">
        </a>

        <!-- Menu principal pour les écrans larges -->
        <nav class="hidden md:flex gap-6">
            <ul class="menuOne flex gap-8 active px-4 py-2 rounded-full text-gray-800 border-gdt border-4">
                <li>
                    <a href="./home" class="active inline-block px-4 py-2 rounded-full text-xl text-gray-800 border-gdt transition duration-200 hover:bg-gdt">Accueil</a>
                </li>
                <li>
                    <a href="#" class="inline-block px-4 py-2 rounded-full text-xl text-gray-800 border-gdt transition duration-200 hover:bg-gdt">Rechercher&nbsp;un&nbsp;trajet</a>
                </li>
                <li>
                <button type="button" onclick="toggleJourneyAddModal()" class="inline-block px-6 py-3 rounded-full text-black border-gdt transition hover:bg-green-600 duration-200 text-xl">Publier&nbsp;un&nbsp;trajet</button>
                </li>
            </ul>
        </nav>
    </div>

    <!-- Menu burger pour le menu principal -->
    <div class="hamburger md:hidden" onclick="toggleMenu('menuOne')">
        <div class="line w-6 h-0.5 bg-gdt my-1"></div>
        <div class="line w-6 h-0.5 bg-gdt my-1"></div>
        <div class="line w-6 h-0.5 bg-gdt my-1"></div>
    </div>

    <!-- Menu burger pour le menu de profil -->
    <div class="profile md:hidden" onclick="toggleMenu('menuTwo')">
        <img src="Assets/Images/burgProfil.png" alt="profil">
    </div>

    <!-- Menu de profil pour les écrans larges -->
    <nav class="hidden md:flex gap-6">
        <ul class="menuTwo flex gap-2 px-4 py-2">
            <?php if (!isset($_SESSION["userSession"])) : ?>
                <li>
                    <button onclick="toggleInscriptionModal()" class="inscription inline-block px-6 py-3 rounded-full text-xl text-white bg-gdt border-gdt transition hover:bg-green-600 duration-200">S'inscrire</button>
                </li>
                <li>
                    <button onclick="toggleConnectionModal()" class="login inline-block px-6 py-3 rounded-full text-xl text-white bg-gdt border-gdt transition duration-400 hover:bg-green-600">Se&nbsp;connecter</button>
                </li>
            <?php endif; ?>
            <?php if (isset($_SESSION["userSession"])) :
                $userSession = $_SESSION['userSession'];
                $idUser = $userSession['id_user'] ?>
                <li>
                    <a href="./user/<?= $idUser ?>/get"><button class="inscription inline-block px-6 py-3 rounded-full text-xl text-white bg-gdt border-gdt transition hover:bg-green-600 duration-200">Profil</button></a>
                </li>
                <?php $isAdmin = $userSession['role']; 
                 if($isAdmin === 1): ?>
                <li>
                <a href="./admin"> <button class="login inline-block px-6 py-3 rounded-full text-xl text-white bg-gdt border-gdt transition duration-400 hover:bg-green-600">Admin</button></a>
                <?php endif; ?>
                </li>
                <li>
                    <a href="./user/<?= $idUser ?>/logout"> <button class="login inline-block px-6 py-3 rounded-full text-xl text-white bg-red-500 border-gdt transition duration-400 hover:bg-red-700">Se&nbsp;déconnecter</button></a>
                </li>
            <?php endif; ?>
        </ul>
    </nav>
</header>

<!-- Menu principal pour les écrans mobiles -->
<div id="menuOne" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden z-20">
    <div class="bg-white p-8 rounded-lg z-30">
        <ul class="flex flex-col gap-4">
            <li>
                <a href="./home" class="active inline-block px-4 py-2 rounded-full text-gray-800 border-gdt transition duration-200 hover:bg-gdt">Accueil</a>
            </li>
            <li>
                <a href="#" class="inline-block px-4 py-2 rounded-full text-gray-800 border-gdt transition duration-200 hover:bg-gdt">Rechercher&nbsp;un&nbsp;trajet</a>
            </li>
            <li>
                <button type="button" onclick="toggleJourneyAddModal()" class="inscription inline-block px-6 py-3 rounded-full text-white bg-gdt border-gdt transition hover:bg-green-600 duration-200">Publier&nbsp;un&nbsp;trajet</button>
            </li>
        </ul>
        <button type="button" onclick="toggleMenu('menuOne')" class="bg-gray-500 text-white px-4 py-2 rounded mt-4">Fermer</button>
    </div>
</div>

<!-- Menu de profil pour les écrans mobiles -->
<div id="menuTwo" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden z-20">
    <div class="bg-white p-8 rounded-lg z-30">
        <ul class="flex flex-col gap-4">
        <?php if (!isset($_SESSION["userSession"])) : ?>
            
            <li>
                <button onclick="toggleInscriptionModal()" class="inscription inline-block px-6 py-3 rounded-full text-white bg-gdt border-gdt transition hover:bg-green-600 duration-200">S'inscrire</button>
            </li>
           
            <li>
                <button onclick="toggleConnectionModal()" class="login inline-block px-6 py-3 rounded-full text-white bg-gdt border-gdt transition duration-400 hover:bg-green-600">Se&nbsp;connecter</button>
            </li>
            <?php endif; ?> 
        <?php if (isset($_SESSION["userSession"])) :
                $userSession = $_SESSION['userSession'];
                $idUser = $userSession['id_user'] ?>
            <li>
                <a href="./user/<?= $idUser ?>/get"><button class="login inline-block px-6 py-3 rounded-full text-white bg-gdt border-gdt transition duration-400 hover:bg-green-600">Profil</button></a>
            </li>
            <li>
                <a href="./user/<?= $idUser ?>/get"><button class="login inline-block px-6 py-3 rounded-full text-white bg-red-500 border-gdt transition duration-400 hover:bg-green-600">Déconnexion</button></a>
            </li>
        <?php endif;
         $isAdmin = $userSession['role']; 
         if($isAdmin === 1): ?>
              <li>
                <a href="./admin"><button class="login inline-block px-6 py-3 rounded-full text-white bg-gdt border-gdt transition duration-400 hover:bg-green-600">Admin</button></a>
            </li>
        <?php endif; ?>
        </ul>
        <button type="button" onclick="toggleMenu('menuTwo')" class="bg-gray-500 text-white px-4 py-2 rounded mt-4">Fermer</button>
    </div>
</div>

<!-- Modale d'inscription -->
<div id="inscriptionModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden z-20">

    <div class="bg-white p-8 rounded-lg z-30 overflow-auto max-h-[600px] w-1/2">
        <form action="./user/register" method="post">
            <h2 class="text-xl mb-4 text-center">Inscription</h2>
            <label for="nom">Nom :</label>
            <input type="text" id="nom" name="last_name" class="border-2 border-gray-300 rounded-lg p-2 mb-4 w-full">
            <label for="prenom">Prénom :</label>
            <input type="text" id="prenom" name="first_name" class="border-2 border-gray-300 rounded-lg p-2 mb-4 w-full">
            <label for="telephone">Téléphone :</label>
            <input type="text" id="telephone" name="mobile" class="border-2 border-gray-300 rounded-lg p-2 mb-4 w-full">
            <label for="email">E-mail :</label>
            <input type="email" id="email" name="email" class="border-2 border-gray-300 rounded-lg p-2 mb-4 w-full">
            <label for="password">Mot de passe :</label>
            <input type="password" id="password" name="password" class="border-2 border-gray-300 rounded-lg p-2 mb-4 w-full">
            <div class="flex justify-end">
                <button type="button" onclick="toggleInscriptionModal()" class="bg-gray-500 text-white px-4 py-2 rounded mr-2">Annuler</button>
                <input type="submit" value="S'inscrire" class="bg-gdt text-white px-4 py-2 rounded cursor-pointer">
            </div>
        </form>
    </div>
</div>

<!-- Modale de connexion -->
<div id="connectionModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden z-20">
    <div class="bg-white p-8 rounded-lg z-30 overflow-auto max-h-[500px] w-1/2">
        <form action="./user/login" method="post">
            <h2 class="text-xl mb-4 text-center">Connexion</h2>
            <label for="email">E-mail :</label>
            <input type="email" id="email" name="mail" class="border-2 border-gray-300 rounded-lg p-2 mb-4 w-full">
            <label for="password">Mot de passe :</label>
            <input type="password" id="password" name="passwordCo" class="border-2 border-gray-300 rounded-lg p-2 mb-4 w-full">
            <div class="flex justify-end">
                <button type="button" onclick="toggleConnectionModal()" class="bg-gray-500 text-white px-4 py-2 rounded mr-2">Annuler</button>
                <input type="submit" value="Se connecter" class="bg-gdt text-white px-4 py-2 rounded cursor-pointer">
            </div>
        </form>
    </div>
</div>

<!-- Boite modal ajout de trajet -->
<div id="journeyAddModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden z-20">
    <div class="bg-white p-8 rounded-lg z-30 overflow-auto max-h-[600px] w-1/2">
    <?php if (!isset($_SESSION["userSession"])) : ?>
    <h2 class="text-xl mb-4 text-center">Connectez-vous pour pouvoir ajouter un trajet</h2>
    <?php endif; ?>
        <form action="./journey/add" method="post">
            <h2 class="text-xl mb-4 text-center">Ajout de trajet</h2>
            <label for="startLocation">Lieu de Départ</label>
            <input type="text" id="start" name="location_start" placeholder="Place de la mairie, aire de covoiturage, église..." class="border-2 border-gray-300 rounded-lg p-2 mb-4 w-full">

            <!-- Champ de recherche de ville de départ -->
            <label for="startCity">Ville de Départ (Choisissez dans la liste)</label>
            <input type="text" id="startCitySearch" name="startCitySearch" class="border-2 border-gray-300 rounded-lg p-2 mb-4 w-full" autocomplete="off" list="startCityList">
            <datalist id="startCityList"></datalist>

            <label for="location_1">Lieu d'Arrivée</label>
            <input type="text" id="location_1" name="location_end" value= "Lycée Lesage" class="border-2 border-gray-300 rounded-lg p-2 mb-4 w-full">

            <!-- Champ de recherche de ville d'arrivée -->
            <label for="arrivalCity">Ville d'Arrivée (Choisissez dans la liste)</label>
            <input type="text" id="arrivalCitySearch" name="arrivalCitySearch" value = "VANNES" class="border-2 border-gray-300 rounded-lg p-2 mb-4 w-full" autocomplete="off" list="arrivalCityList">
            <datalist id="arrivalCityList"></datalist>

            <label for="departureTime">Heure de Départ</label>
            <input type="time" id="departureTime" name="hour_go" class="border-2 border-gray-300 rounded-lg p-2 mb-4 w-full">

            <div class="flex justify-end">
                <button type="button" onclick="toggleJourneyAddModal()" class="bg-gray-500 text-white px-4 py-2 rounded mr-2">Annuler</button>
                <?php if (isset($_SESSION["userSession"])) : ?>
                <input type="submit" value="Ajouter" class="bg-gdt text-white px-4 py-2 rounded cursor-pointer">
                <?php endif; ?>
            </div>
        </form>
    </div>
</div>


</form>
    </div>
</div>


<main>