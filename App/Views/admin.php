<?php require 'header.php' ?>
<?php if (isset($_SESSION["msg"])) {
    echo $_SESSION['msg'];
    unset($_SESSION['msg']);
} ?>
    <div class="justify-center">
    <div class="bg-white p-8 rounded-lg  w-1/2 justify-center">
        <form action="./city/add" method="post">
            <h2 class="text-xl mb-4 text-center">Ajout de Ville</h2>
            <label for="ville">Ville</label>
            <input type="text" id="ville" name="name" class="border-2 border-gray-300 rounded-lg p-2 mb-4 w-full">
            <label for="cp">Code Postal</label>
            <input type="text" id="cp" name="cp" class="border-2 border-gray-300 rounded-lg p-2 mb-4 w-full">
            <div class="flex justify-end">
                <input type="submit" value="Ajouter" class="bg-gdt text-white px-4 py-2 rounded cursor-pointer">
            </div>
        </form>
    </div>
</div>

<?php require 'Footer.php' ?>