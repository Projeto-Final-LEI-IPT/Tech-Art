<?php
include 'config/dbconnection.php';
include 'models/newfunctions.php';

$pdo = pdo_connect_mysql();

registar_visita($pdo, "financiamento.php");
?>


<?=redirectPageLanguage("financiamento.php","funding.php") ?>


<!DOCTYPE html>
<html>

<?= template_header('Financiamento'); ?>


<!-- product section -->
<section class="product_section layout_padding">
    <div style="padding-top: 50px; padding-bottom: 30px;">
        <div class="container">
            <div class="heading_container3">
                <h3 style="text-transform: uppercase;">
                    <?= change_lang("funding-title") ?>
                </h3>
                <div style="padding-top: 30px;">
                    <p><?= change_lang("funding-p1") ?></p>
                    <p>&nbsp;</p>
                    <div class="table-responsive">
                        <table class="table table-bordered responsive-table" style="max-width: 100%;">
                            <tbody>
                                <tr>
                                    <td colspan="3">
                                        <p><strong>UID/05488/2025</strong></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <p><strong>Valor do Financiamento</strong></p>
                                    </td>
                                    <td>
                                        <p><strong>726 295,29 €</strong></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p><strong>Instituição(ões) de Gestão</strong></p>
                                    </td>
                                    <td>
                                        <p><strong>Designação da(s) Instituição(ões)</strong></p>
                                    </td>
                                    <td>
                                        <p><strong>Montante de Financiamento</strong></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>Principal</p>
                                    </td>
                                    <td>
                                        <p>Instituto Politécnico de Tomar</p>
                                    </td>
                                    <td>
                                        <p>471 851,49 €</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>Participante</p>
                                    </td>
                                    <td>
                                        <p>Instituto Politécnico de Castelo Branco</p>
                                    </td>
                                    <td>
                                        <p>63 610,95 €</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>Participante</p>
                                    </td>
                                    <td>
                                        <p>Instituto Politécnico da Guarda</p>
                                    </td>
                                    <td>
                                        <p>190 832,85 €</p>
                                    </td>
                                </tr>
                                <td colspan="2">
                                        <p><strong>Total</strong></p>
                                    </td>
                                    <td>
                                        <p><strong>726 295,29 €</strong></p>
                                    </td>
                            </tbody>
                        </table>
                    </div>
                    <p>&nbsp;</p>
                </div>
                <div class="table-responsive">
                        <table class="table table-bordered responsive-table" style="max-width: 100%;">
                            <tbody>
                                <tr>
                                    <td colspan="3">
                                        <p><strong>UID/PRR/05488/2025</strong></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <p><strong>Valor de Financiamento</strong></p>
                                    </td>
                                    <td>
                                        <p><strong>66 879,85 €</strong></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p><strong>Instituição(ões) de Gestão</strong></p>
                                    </td>
                                    <td>
                                        <p><strong>Designação da(s) Instituição(ões)</strong></p>
                                    </td>
                                    <td>
                                        <p><strong>Montante de Financiamento</strong></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>Principal</p>
                                    </td>
                                    <td>
                                        <p>Instituto Politécnico de Tomar</p>
                                    </td>
                                    <td>
                                        <p>36 594,63 €</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>Participante</p>
                                    </td>
                                    <td>
                                        <p>Instituto Politécnico de Castelo Branco</p>
                                    </td>
                                    <td>
                                        <p>7 571,30 €</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>Participante</p>
                                    </td>
                                    <td>
                                        <p>Instituto Politécnico da Guarda</p>
                                    </td>
                                    <td>
                                        <p>22 713,91 €</p>
                                    </td>
                                </tr>
                                <td colspan="2">
                                        <p><strong>Total</strong></p>
                                    </td>
                                    <td>
                                        <p><strong>66 879,85 €</strong></p>
                                    </td>
                            </tbody>
                        </table>
                        <p><strong>Equipamentos Software / Justificação</strong></p>
                        <p>Licença: Licença perpétua do software AVID Sibelius Ultimate EDU para a Unidade de Gestão do TECHN&ART no IPCB, com financiamento através do projeto PRR UID/PRR/05488/2025. Este Software  é a ferramenta técnica indispensável para o trabalho de transcrição e preservação de Música Tradicional Portuguesa, permitindo a conversão de recolhas e campo em edições críticas de elevada qualidade científica.</p>
                    </div>
                    <p>&nbsp;</p>
                </div>
                <div class="table-responsive">
                        <table class="table table-bordered responsive-table" style="max-width: 100%;">
                            <tbody>
                                <tr>
                                    <td colspan="3">
                                        <p><strong>UID/PRR2/05488/2025</strong></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <p><strong>Valor de Financiamento</strong></p>
                                    </td>
                                    <td>
                                        <p><strong>37 327,60 €</strong></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p><strong>Instituição(ões) de Gestão</strong></p>
                                    </td>
                                    <td>
                                        <p><strong>Designação da(s) Instituição(ões)</strong></p>
                                    </td>
                                    <td>
                                        <p><strong>Montante de Financiamento</strong></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>Principal</p>
                                    </td>
                                    <td>
                                        <p>Instituto Politécnico de Tomar</p>
                                    </td>
                                    <td>
                                        <p>20 424,54 €</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>Participante</p>
                                    </td>
                                    <td>
                                        <p>Instituto Politécnico de Castelo Branco</p>
                                    </td>
                                    <td>
                                        <p>4 225,77€</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>Participante</p>
                                    </td>
                                    <td>
                                        <p>Instituto Politécnico da Guarda</p>
                                    </td>
                                    <td>
                                        <p>12 677,30 €</p>
                                    </td>
                                </tr>
                                <td colspan="2">
                                        <p><strong>Total</strong></p>
                                    </td>
                                    <td>
                                        <p><strong>37 327,60 €</strong></p>
                                    </td>
                            </tbody>
                        </table>
                    </div>
                    <p>&nbsp;</p>
                </div>
            </div>
        </div>
    </div>
</section>

<?= template_footer(); ?>

</body>

</html>