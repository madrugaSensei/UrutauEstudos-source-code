<!DOCTYPE html>

<html>

<head>
    <title>Cadastro</title>
    <meta charset="utf-8" />
    <link rel="icon" href="./imagens/uruSemFundo.png" />
    <!-- CSS -->
    <link href="./css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="./css/bootstrap-icons.css" />

    <link rel="stylesheet" href="./css/style.css" />
    <!-- JAVASCRIPT -->
    <script src="./js/jquery-3.5.1.js"></script>
    <script src="./js/bootstrap.bundle.min.js"></script>
    <script src="./js/psV.js"></script>
    <?php session_start(); ?>
</head>

<body>

    <div>
        <form method="post" action="insertTeacherFiles.php" enctype="multipart/form-data">
            <input type="text" max="100" name="name" id="name">
            <input type="date" name="dateNasc" id="dateNasc">
            <input type="email" name="email" id="email">
            <select name="formation">
                <option value="g">Graduado</option>
                <option value="pg">Pós-Graduado</option>
                <option value="m">Mestrado</option>
                <option value="d">Doutorado</option>
                <option value="pd">Pós-Doutorado</option>
            </select>
            <input type="file" name="diplomas" id="diplomas" accept=".pdf, .docx, .txt">
            <input type="text" name="userName">
            <input type="password" name="password" id="password">
            <input type="password" name="comPassword" id="comPassword">
            <input type="submit" value="Cadastrar">
        </form>
    </div>

    <script>
        const fileInput = document.getElementById('diplomas');

        fileInput.addEventListener('change', function () {
            const file = this.files[0];

            if (file) {
                const maxSize = 1024 * 1024 * 50; // 5MB
                if (file.size > maxSize) {
                    alert('O tamanho do arquivo é maior que o limite permitido (50MB).');
                    this.value = ''; // Limpar a seleção
                } else {
                    // O arquivo está dentro do limite, você pode prosseguir
                    console.log('Tamanho do arquivo válido:', file.size);
                    // Aqui você pode submeter o formulário ou realizar outras ações.
                }
            }
        });
    </script>

</body>

</html>