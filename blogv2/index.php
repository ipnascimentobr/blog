<?php
    require 'layout/header.php';
    
    $artigos = [
        [
            'titulo' => 'Primeiros passos com Spring',
            'conteudo' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Animi commodi modi esse, corrupti sunt aliquid quisquam eum sed beatae saepe mollitia amet, quas unde necessitatibus assumenda vel blanditiis nam similique?',
            'link' => 'primeiros-passos-com-spring.php'
        ],
        [
            'titulo' =>'O que é Metodologia Ágil?',
            'conteudo' =>'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium ratione sit eligendi unde, ab obcaecati rem ad perferendis optio illum inventore quisquam delectus modi quam excepturi mollitia, deleniti aliquam tempora?.',
            'link' =>'o-que-e-metodologia-agil.php'
        ],
        [
            'titulo' => 'Como é o funil do Growth Hacking?',
            'conteudo' =>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro voluptate rerum vel quis error labore doloribus qui corrupti, dolorum eos deserunt deleniti recusandae iure quod eaque ratione possimus, explicabo beatae.',
            'link' =>'como-e-o-funil-do-growth-hacking.php'
        ]
    ];
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Meu Blog</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <?php echo $header; ?>
    <div id="container">
        
        <h1>Meu Blog</h1>
        <?php foreach($artigos as $artigo): ?>
            <h2>
                <a href="<?php echo $artigo['link'];?>"> 
                    <?php echo $artigo['titulo'];?> 
                </a>
            </h2>
            <p>
                <?php echo $artigo['conteudo']; ?>
            </p>
        <?php endforeach; ?>
        
    </div>
</body>

</html>