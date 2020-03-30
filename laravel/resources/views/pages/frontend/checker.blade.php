<style>
    .hidden {
        display: none;
    }
    .academiccheckerform .result-group .table tr td:first-child {
        padding-right: 5px;
        font-size: 80%;
        text-align: right;
    }
</style>

<form class="academiccertificatecheckerform" action="/academic-verification/">
    <div class="form-group">
        Please enter the 10-digit number to authenticate the Credential that is certified by World Certification
        Institute.
        <br>
        <input type="text" name="certificateno" class="resizedTextbox" placeholder="Enter the 10-digit number here">
        <br />
        <input type="submit" value="Submit" class="btn-check-certificate">
    </div>
</form>

<script>
    AcademicCertificateCheckerControl.InitCertificateCheckForm(jQuery('form.academiccertificatecheckerform'));
</script>