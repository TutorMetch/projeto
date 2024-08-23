<?php

/**
 * Helpers [TIPO]
 *
 * @author Anderson Donaire - MASTER WEBS
 */
class Helpers extends connect {

    public static function encripta($string) {
        $result = '';
        $key = '28102005';
        for ($i = 0; $i < strlen($string); $i++) {
            $char = substr($string, $i, 1);
            $keychar = substr($key, ($i % strlen($key)) - 1, 1);
            $char = chr(ord($char) + ord($keychar));
            $result .= $char;
        }
        return base64_encode($result);
    }

    public static function decripta($string) {
        $result = '';
        $key = '28102005';
        $string = base64_decode($string);
        for ($i = 0; $i < strlen($string); $i++) {
            $char = substr($string, $i, 1);
            $keychar = substr($key, ($i % strlen($key)) - 1, 1);
            $char = chr(ord($char) - ord($keychar));
            $result .= $char;
        }
        return $result;
    }

     public static function alerta($titulo, $mensagem, $classe, $arrBt = null) {

        $html = "
      <script>
        $(function () {
          $(\"#modalErro\").modal(\"show\");
        })
      </script>
      <div class=\"modal fade alert alert-{$classe}\" id=\"modalErro\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\">
        <div class=\"modal-dialog\" role=\"document\">
          <div class=\"modal-content\">
            <div class=\"modal-header\">
              <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
              <h4 class=\"modal-title\" id=\"myModalLabel\">{$titulo}</h4>
            </div>
            <div class=\"modal-body\">
              {$mensagem}
            </div>
            <div class=\"modal-footer\">";

        if ($arrBt == null) {
            $html .= "<a href=\"javascript:history.go(-1)\" class=\"btn btn-primary\">Voltar</a>";
        } else {
            foreach ($arrBt as $bt) {
                $html .= "<a href=\"{$bt['link']}\" class=\"btn {$bt['class']}\">{$bt['nome']}</a>";
            }
        }
        $html .= " </div>
          </div>
        </div>
      </div>
";
        echo $html;
    }

    public static function alertaErro($mensagem, $urlVolta = null) {

        if (!$urlVolta) {
            $volta = "javascript:history.go(-1)";
        } else {
            $volta = $urlVolta;
        }

        echo "
      <script>
        $(function () {
          $(\"#modalErro\").modal(\"show\");
        })
      </script>
      <div class=\"modal fade alert alert-danger\" id=\"modalErro\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\">
        <div class=\"modal-dialog\" role=\"document\">
          <div class=\"modal-content\">
            <div class=\"modal-header\">
              <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
              <h4 class=\"modal-title\" id=\"myModalLabel\">Erro!</h4>
            </div>
            <div class=\"modal-body\">
              {$mensagem}
            </div>
            <div class=\"modal-footer\">
              <a href=\"{$volta}\" class=\"btn btn-primary\">Voltar</a>
            </div>
          </div>
        </div>
      </div>
";
        exit();
    }

    public static function alertaSucesso($mensagem, $urlVolta = null) {
        if (!$urlVolta) {
            $volta = "javascript:history.go(-1)";
        } else {
            $volta = $urlVolta;
        }

        $html = "
      <script>
        $(function () {
          $(\"#modalSucesso\").modal(\"show\");
        })
      </script>
      <div class=\"modal fade alert alert-success\" id=\"modalSucesso\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\">
        <div class=\"modal-dialog\" role=\"document\">
          <div class=\"modal-content\">
            <div class=\"modal-header\">
              <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
              <h4 class=\"modal-title\" id=\"myModalLabel\">Sucesso!</h4>
            </div>
            <div class=\"modal-body\">
              {$mensagem}
            </div>
            <div class=\"modal-footer\">";
        if ($urlVolta != NULL) {
            $html .= "<button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">Fechar e ficar</button>";
            $html .= "<a href=\"{$volta}\" class=\"btn btn-primary\">Voltar</a>";
        } else {
            $html .= "<button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">Fechar</button>";
        }
        $html .= "
            </div>
          </div>
        </div>
      </div>";
        echo $html;
    }

    public static function alertaConfirma($mensagem, $urlSim, $urlNao) {

        echo "   <script>
        $(function () {
          $(\"#modalConfirma\").modal(\"show\");
        })
      </script>
      <div class=\"modal fade alert\" id=\"modalConfirma\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\">
        <div class=\"modal-dialog\" role=\"document\">
          <div class=\"modal-content\">
            <div class=\"modal-header\">
              <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\"><span aria-hidden=\"true\">&times;</span></button>
              <h4 class=\"modal-title\" id=\"myModalLabel\">Confirmação!</h4>
            </div>
            <div class=\"modal-body\">
              {$mensagem}
            </div>
            <div class=\"modal-footer\">
              <a href=\"{$urlSim}\" class=\"btn btn-success\">Sim</a>
              <a href=\"{$urlNao}\" class=\"btn btn-danger\">Não</a>
            </div>
          </div>
        </div>
      </div>";
        exit();
    }

    public static function tiraAcento($string) {
        $ac = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûüýýþÿŔŕ +%&/ªº\'';
        $as = 'aaaaaaaceeeeiiiidnoooooouuuuybbaaaaaaaceeeeiiiidnoooooouuuuyybyRr_____ao_';
        $string = trim($string);
        $string = utf8_decode($string);
        $string = strtr($string, utf8_decode($ac), $as);
        $string = strtolower($string);
        return $string;
    }


    public static function getProxId($tabela) {
//        include_once $_SESSION['dir'] . './set/config.php';
//        $sql = new connect();
        $proxId = parent::select("SHOW TABLE STATUS LIKE '{$tabela}'");
        return $proxId['Auto_increment'];
    }


}
