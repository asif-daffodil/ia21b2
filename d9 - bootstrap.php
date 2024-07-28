<?php 
    require_once "./common-files/header.php";
    require_once "./common-files/slider.php";
?>
<div class="container">
    <div class="row">
        <div class="col-md-4 p-3 ps-0">
            <div class="bg-white border rounded shadow p-3">
                <form action="">
                    <div class="mb-3">
                        <input type="text" placeholder="Your Name" class="form-control">
                    </div>
                    <div class="mb-3">
                        <div class="form-check form-check-inline">
                            <label for="" class="form-check-label">
                                Gender : 
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <label for="male" class="form-check-label">
                                <input type="radio" class="form-check-input" id="male" value="Male" name="gender">Male
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <label for="female" class="form-check-label">
                                <input type="radio" class="form-check-input" id="female" value="Female" name="gender">Female
                            </label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="form-check form-check-inline">
                            <label for="" class="form-check-label">
                                Hobbies : 
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <label for="reading" class="form-check-label">
                                <input type="checkbox" id="reading" value="Reading" name="hobbies[]" class="form-check-input" >Reading
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <label for="writing" class="form-check-label">
                                <input type="checkbox" id="writing" value="Writing" name="hobbies[]" class="form-check-input" >Writing
                            </label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-dark btn-sm px-4 btn-outline-primary text-white border-0 fw-bolder shadow" style="border-radius: 0px 12px 0px 12px">Submit</button>
                </form>
            </div>
        </div>
        <div class="col-md-8 p-3 pe-0">
            <table class="table table-striped table-info table-hover">
                <tr>
                    <th>S.N.</th>
                    <th>Name</th>
                    <th>Gender</th>
                    <th>City</th>
                </tr>
                <tr>
                    <td>01</td>
                    <td>Asif</td>
                    <td>Male</td>
                    <td>Dhaka</td>
                </tr>
                <tr>
                    <td>02</td>
                    <td>Abir</td>
                    <td>Male</td>
                    <td>Dhaka</td>
                </tr>
                <tr>
                    <td>03</td>
                    <td>Kamal</td>
                    <td>Male</td>
                    <td>Dhaka</td>
                </tr>
                <tr>
                    <td>04</td>
                    <td>Jamal</td>
                    <td>Male</td>
                    <td>Dhaka</td>
                </tr>
            </table>
        </div>
    </div>
</div>
<?php
    require_once "./common-files/footer.php";
?>
    