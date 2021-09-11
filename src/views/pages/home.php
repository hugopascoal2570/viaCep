<?php $render('Busca de Cep'); ?>

<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?=$base;?>/css/style.css" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    <title>Buscador de Cep</title>
  </head>
  <body>

    <div class="content">      
      <!--FORMULÁRIO-->
      <div id="formulario">
        <form method="post" action="<?=$base;?>/"> 
          <h1>Busca de CEP</h1> 
          <p> 
          
            <label for="cep">CEP</label>
            <input id="cep" name="cep" value="<?php echo $endereco->cep;?>" required="required" type="text" placeholder="CEP" />
          </p>
          <p> 
            <label for="logradouro">Logradouro</label>
            <input id="logradouro" name="logradouro" value="<?php echo $endereco->logradouro;?>" placeholder="" disabled/> 
          </p>
          <p> 
            <label for="complemento">Complemento</label>
            <input id="complemento" name="complemento" value="<?php echo $endereco->complemento;?>" placeholder="" disabled/> 
          </p>
          <p> 
            <label for="bairro">Bairro</label>
            <input id="bairro" name="bairro" value="<?php echo $endereco->bairro;?>" placeholder="" disabled/> 
          </p>
          <p> 
            <label for="localidade">Localidade</label>
            <input id="localidade" name="localidade" value="<?php echo $endereco->localidade;?>"  placeholder="" disabled/> 
          </p>
          <p> 
            <label for="uf">UF</label>
            <input id="uf" name="uf" value="<?php echo $endereco->uf;?>" placeholder="" disabled/> 
          </p>
          <p> 
          <button type="submit" class="btn btn-primary">Buscar CEP</button> 
          </p>
        
        </form>
      </div>
    </div>
  </div>  
</body>
</html>
  

  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
  </body>
</html>