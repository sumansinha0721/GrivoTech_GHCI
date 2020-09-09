<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.1/css/star-rating.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.1/js/star-rating.min.js"></script>


<script type="text/javascript">
    $(window).on('load', function() {
        $('#myModal1').modal('show');
    });
</script>
<div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><?php echo $_SESSION['name']; ?>, please give feedback about your institute's grievances management.</h4>
            </div>
            <div class="modal-body">
                <div>
                    <div style="display: flex; flex-direction: row; font-family:helvetica;">
                        <img src=" ../assets/img/lady-image.png" style="margin-left: 0.5em; margin-right: 0.5em; height: 100%" />
                        <div>
                            <i>
                                <p><strong>Hello <?php echo $_SESSION['name'] ?>,</strong></p>
                                <p>Sita here. </p>
                                <p> The State's education council understands that you might not be able to proactively file grievances everytime. </p>
                                <p> So, the Chairman of the State's education council would like to get your quick feedback on some of the most pressing concerns in your institute. </p>
                                <p> This is fully anonymous, and would be only sent to the education council, without involving your institute. Please spare some time to fill the feedback below.</p>
                            </i>

                        </div>
                    </div>
                </div>
                <div id="message" style="text-align: center; color: green;"></div>
                <div class="form-group">
                    <span id="updatecapacitymodalerrortext" style="color:red"></span>
                </div>
                <div class="form-group">
                    <form action="submitfeedback.php" method="post">
                        <div class="feedback">
                            <label for="ragging" class="control-label">Ragging Management</label>
                            <input id="ragging" name="ragging" class="rating rating-loading" data-min="0" data-max="5" data-step="1" data-star-captions='["Not Rated", "Poor", "Fair","Good","Very Good","Excellent"]'>
                            <label for="exam" class="control-label">Exam grievance management</label>
                            <input id="exam" name="exam" class="rating rating-loading" data-min="0" data-max="5" data-step="1" data-star-captions='["Not Rated", "Poor", "Fair","Good","Very Good","Excellent"]'>
                            <label for="womens" class="control-label">Women's safety</label>
                            <input id="womens" name="womens" class="rating rating-loading" data-min="0" data-max="5" data-step="1" data-star-captions='["Not Rated", "Poor", "Fair","Good","Very Good","Excellent"]'>
                            <label for="faculty" class="control-label">Faculty & Staff Behaviour</label>
                            <input id="faculty" name="faculty" class="rating rating-loading" data-min="0" data-max="5" data-step="1" data-star-captions='["Not Rated", "Poor", "Fair","Good","Very Good","Excellent"]'>
                            <label for="accounts" class="control-label">Accounts & fees transparency </label>
                            <input id="accounts" name="accounts" class="rating rating-loading" data-min="0" data-max="5" data-step="1" data-star-captions='["Not Rated", "Poor", "Fair","Good","Very Good","Excellent"]'>
                        </div>
                        <button type="submit" name="submit" id="capacityModalClose" class="btn btn-info ">Save</button>
                        <button type="button" id="capacityModalClose" class="btn btn-default" data-dismiss="modal">Close
                        </button>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>