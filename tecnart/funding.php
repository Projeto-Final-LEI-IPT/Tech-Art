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
                                        <p><strong>Financing Amount</strong></p>
                                    </td>
                                    <td>
                                        <p><strong>726 295,29 €</strong></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p><strong>Management Institution(s)</strong></p>
                                    </td>
                                    <td>
                                        <p><strong>Designation of the Institution(s)</strong></p>
                                    </td>
                                    <td>
                                        <p><strong>Funding Amount</strong></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>Main</p>
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
                                        <p>Participant</p>
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
                                        <p>Participant</p>
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
                                        <p><strong>Financing Amount</strong></p>
                                    </td>
                                    <td>
                                        <p><strong>66 879,85 €</strong></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p><strong>Management Institution(s)</strong></p>
                                    </td>
                                    <td>
                                        <p><strong>Designation of the Institution(s)</strong></p>
                                    </td>
                                    <td>
                                        <p><strong>Funding Amount</strong></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>Main</p>
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
                                        <p>Participant</p>
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
                                        <p>Participant</p>
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
                        <p><strong>Software Equipment / Justification</strong></p>
                        <p>License: Perpetual license for AVID Sibelius Ultimate EDU software for the TECHN&ART Management Unit at IPCB, funded through project PRR UID/PRR/05488/2025. This software is an indispensable technical tool for the transcription and preservation of Traditional Portuguese Music, allowing the conversion of field recordings into critical editions of high scientific quality.</p>
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
                                        <p><strong>Financing Amount</strong></p>
                                    </td>
                                    <td>
                                        <p><strong>37 327,60 €</strong></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p><strong>Management Institution(s)</strong></p>
                                    </td>
                                    <td>
                                        <p><strong>Designation of the Institution(s)</strong></p>
                                    </td>
                                    <td>
                                        <p><strong>Funding Amount</strong></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p>Main</p>
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
                                        <p>Participant</p>
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
                                        <p>Participant</p>
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