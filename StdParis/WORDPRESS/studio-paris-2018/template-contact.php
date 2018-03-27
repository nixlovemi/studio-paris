<?php
/* Template Name: Template Contato */
get_header();
?>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $action = isset($_POST["action"]) ? $_POST["action"]: "";

  $name     = "";
  $mail     = "";
  $phone    = "";
  $message  = "";
  $errorMsg = "";

  if($action == "contactPost"){
    $name    = isset($_POST["contactName"]) ? $_POST["contactName"]: "";
    $mail    = isset($_POST["contactMail"]) ? $_POST["contactMail"]: "";
    $phone   = isset($_POST["contactPhone"]) ? $_POST["contactPhone"]: "";
    $message = isset($_POST["contactMessage"]) ? $_POST["contactMessage"]: "";

    $arrErrorMsg = [];

    if(strlen($name) < 3){
      $arrErrorMsg[] = "Informe o nome com pelo menos três caracteres!";
    }

    if (!filter_var($mail, FILTER_VALIDATE_EMAIL)) {
      $arrErrorMsg[] = "Informe um email válido!";
    }

    if(strlen($phone) < 8){
      $arrErrorMsg[] = "Informe um telefone para contato!";
    }

    if(strlen($message) < 5){
      $arrErrorMsg[] = "Informe a mensagem!";
    }

    if( count($arrErrorMsg) > 0 ){
      $errorMsg .= "Os seguintes erros foram encontrados:<br />&nbsp;&nbsp;";
      $errorMsg .= implode("<br />&nbsp;&nbsp;", $arrErrorMsg);
    } else {

      $emailTo  = simple_fields_value("sf_fields_contato_info");
      $to       = (filter_var($emailTo, FILTER_VALIDATE_EMAIL)) ? $emailTo: "nixlovemi@gmail.com";

      $subject  = "Contato - Studio Paris Decoração";
      $body     = "<b>Nome:</b>" . $name . "<br />";
      $body    .= "<b>Email:</b>" . $mail . "<br />";
      $body    .= "<b>Telefone:</b>" . $phone . "<br /><br />";
      $body    .= '<i>"'.nl2br($message).'"</i>';

      $okSent = sendMail($to, $subject, $body);
      if(!$okSent){
        $errorMsg = "ERRO ao enviar contato! Tente novamente mais tarde.";
      } else {
        $errorMsg = "Contato enviado com SUCESSO!";
      }
    }
  }
}
?>

<div id="pre-content">
    <div class="content-wrap">
        CONTATO
    </div>
</div>

<div id="content" class="">
    <div class="content-wrap">
        <div class="section group mt-50 contact-body">
          <div class="col span_2_of_4">
            <?php
            if ( have_posts() ) {
            	while ( have_posts() ) {
            		the_post();
                the_content();
            	} // end while
            } // end if
            ?>
          </div>
          <div class="col span_2_of_4">
            <?php
            if($errorMsg != ""){
              echo "<div class='isa_info_box isa_info'>
                        $errorMsg
                    </div>";
            }
            ?>

            <form id="frmContact" method="post" action="./">
              <input type="hidden" name="action" value="contactPost" />

              <div class="section group article-comments-form">
                <div class="col span_1_of_3">
                  <label>Nome:</label>
                  <input class="form-control" value="" type="text" name="contactName" />
                </div>
                <div class="col span_2_of_3">
                  <label>Email:</label>
                  <input class="form-control" value="" type="text" name="contactMail" />
                </div>
              </div>
              <div class="section group article-comments-form">
                <div class="col span_3_of_3">
                  <label>Telefone:</label>
                  <input class="form-control" value="" type="text" name="contactPhone" />
                </div>
              </div>
              <div class="section group article-comments-form">
                <div class="col span_3_of_3">
                  <label>Mensagem:</label>
                  <textarea rows="5" class="form-control" name="contactMessage"></textarea>
                </div>
              </div>

              <a href="javascript:;" onClick="$('#frmContact').submit();" class="button contact-button">ENVIAR CONTATO</a>
            </form>
          </div>
        </div>
    </div>
</div>

<?php
get_footer();
