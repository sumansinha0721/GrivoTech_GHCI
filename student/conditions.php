<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Terms and Conditions</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<style>
    .bs-example{
    	margin: 20px;
    }
</style>

<script type="text/javascript">
 $(document).ready(function(){
     $("#Conditions").modal('show');
});

</script>
<!-- <script type="text/javascript"> -->
<!-- </script> -->
</head>
<body>
<div class="bs-example">
    <button class="btn btn-primary" data-toggle="modal" data-target="#Conditions">Terms&Conditions</button>
<form id="my_form method="POST" action="anonymousGrievance.php">
    <div class="form-group">
    <div id="Conditions" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Terms and Conditions</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <div class="modal-body">
                    <p> Please read the following terms and conditions before going anonymous:</p>
      <p>    Now you can file the grievance privately and the other person related to the institution or management won't see your complaint.</p>

<p>Your following information won't be shown or saved by the college/institution/management (depending on your choice for which you want to be anonymous) :</p>

<p>•	Your Name </p>
<p>•	Address </p>
<p>•	Your other sensitive information entered in this form </p>

<p> However, your details still will be visible and saved to: </p>
<p>•	The Admin of Grivo-Tech  </p>
<p>•	The Secretary/Higher Authorities of The Education Department of Andhra Pradesh </p>
<p>•	The Authorities of the University related to your Institution/ College / Management. </p>


<p> By clicking the checkbox given here you are agreeing on: That all the information provided by you here, are correct by best of your knowledge.</p>
<p> That you are fully aware of the seriousness of this grievance. </p>
<p>Also, that by using abusive words for other, writing hate speeches or trying to humiliate another person by fraud or misrepresentation or the willful and
      knowingly filing a false complaint or any other portion of this may result in several civil and administrative penalties and will be prosecuted to the maximum extent possible under the law.</p>

                </div>
                <div class="modal-footer">
                   <input type="checkbox" name="checkbox" value="check">I agree to terms and conditions &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</input>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <a href="anonymousGrievance.php"> <button type="button" class="btn btn-primary" name="submit" value="submit" onclick="if(!this.form.checkbox.checked){alert('You must agree to the terms first.');return false}"> OK</button> </a>
                </div>
            </div>
        </div>
    </div>
</div>
</form>

</div>
</body>
</html>
