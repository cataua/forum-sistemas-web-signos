<?php
  function calcsign($datanasc = '')
  {
    if ($datanasc === '') return null;

    $dateArray = date_parse($datanasc);
    $signos = lerArquivoSignos();
    $signo = filterSigno($dateArray, $signos);
    return $signo;
  };

  function lerArquivoSignos()
  {
    $arquivo = simplexml_load_file('./signos.xml');
    $json = json_encode($arquivo);
    $listaSignos = json_decode($json, TRUE);
    $signos = [];
    $k = 0;
  
    foreach($listaSignos['signo'] as $signo)
    {
      $dataInicio = explode('/', $signo['dataInicio']);
      $dataFim = explode('/', $signo['dataFim']);
      $nome = $signo['signoNome'];
      $signos[$k]->nome = $nome;
      $signos[$k]->inicio->dia = intval($dataInicio[0]);
      $signos[$k]->inicio->mes = intval($dataInicio[1]);
      $signos[$k]->fim->dia = intval($dataFim[0]);
      $signos[$k]->fim->mes = intval($dataFim[1]);
      $signos[$k]->descricao = $signo['descricao'];
      $k = $k + 1;
    };
    return $signos;
  }

  function filterSigno($dataNascArray, $signosArray)
  {
    $foundedSign = '';
    foreach($signosArray as $signo)
    {
      if (($dataNascArray['month'] === $signo->inicio->mes || $dataNascArray['month'] === $signo->fim->mes)
        && ($dataNascArray['day'] >= $signo->inicio->dia || $dataNascArray['day'] <= $signo->fim->dia)) {
          $foundedSign = $signo;
          return $foundedSign;
        };
    };
    return $foundedSign;
  };
  function getClassName($sign)
  {
    $zodiac = Array(
      'aquario' => 'aquarius',
      'aries' => 'aries',
      'touro' => 'taurus',
      'gemeos' => 'gemini',
      'cancer' => 'cancer',
      'leao' => 'leo',
      'virgem' => 'virgo',
      'libra' => 'libra',
      'escorpiao' => 'scorpio',
      'sagitario' => 'sagitarius',
      'capricornio' => 'carpicorn',
      'peixes' => 'pisces'
    );

    return $zodiac[strtolower(trim($sign))];
  }
?>


