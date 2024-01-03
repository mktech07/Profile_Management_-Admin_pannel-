<?= $this->extend('layout/app_layout') ?>

<?= $this->section('content') ?>
<!-- Center the content -->
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Register</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="<?= base_url() ?>"><button class="btn btn-primary">Back</button></a>
                        </li>
                        <!-- <li class="breadcrumb-item">
                            <a href="">Registration</a>
                        </li> -->
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <div class="card border-top">


        <div class="card-body">
            <form method="POST" class="form small" name="createForm" id="createForm" enctype="multipart/form-data">

                <div class="row">
                    <div class="form-group col-md-4 col-sm-6">
                        <label for="name">Name <span class="requiredMark">*</span></label>
                        <input type="text" name="name"
                            class="form-control input-sm <?php echo (isset($validation) && $validation->hasError('name')) ? 'is-invalid' : ''; ?> "
                            id="name" placeholder="Name" value="<?php echo set_value('name'); ?>">

                        <!-- {{-- client side validation --}} -->
                        <div class="" id="nameErr">
                        </div>


                        <!-- {{-- server side validation --}} -->
                        <?php
                        if (isset($validation) && $validation->hasError('name')) {
                            echo "<div class='text-danger'>" . $validation->getError('name') . "</div>";
                        }
                        ?>

                    </div>
                    <div class="form-group col-md-4 col-sm-6">
                        <label for="email">Email<span class="requiredMark">*</span></label>
                        <input type="text" name="email"
                            class="form-control input-sm <?php echo (isset($validation) && $validation->hasError('email')) ? 'is-invalid' : ''; ?>"
                            id="email" placeholder="" value="<?php echo set_value('email'); ?>">
                        <div class="" id="emailErr"></div>


                        <?php
                        if (isset($validation) && $validation->hasError('email')) {
                            echo "<div class='text-danger'>" . $validation->getError('email') . "</div>";
                        }
                        ?>

                    </div>

                    <!-- {{-- gender radio buttton Starts --}} -->

                    <div class="form-group col-md-4 col-sm-6 ">
                        <label for="genderBox">Gender<span class="requiredMark">*</span></label>

                        <div class="radio-button" id="genderBox">
                            <input type="radio" id="radio1" name="gender"
                                <?php echo set_value('gender') == 'male'?'checked':''; ?> value="male">
                            <label for="radio1">Male</label>

                            <input type="radio" id="radio2" name="gender"
                                <?php echo set_value('gender') == 'female'?'checked':''; ?> value="female">
                            <label for="radio2">Female</label>

                            <input type="radio" id="radio3" name="gender"
                                <?php echo set_value('gender') == 'other'?'checked':''; ?> value="other">
                            <label for="radio3">Other</label>

                            <div class="" id="genderErr"></div>

                            <?php
                            if (isset($validation) && $validation->hasError('gender')) {
                                echo "<div class='text-danger'>" . $validation->getError('gender') . "</div>";
                            }
                            ?>
                        </div>

                    </div>


                    <!-- {{-- gender radio buttton ends --}} -->
                    <!-- <div class="form-group col-md-4 col-sm-6">
                            <label for="gender" class="form-label">Select Gender:</label>
                            <select class=" form-control input-sm" id="gender" name="gender">
                                <option value="">Select</option>
                                <option value="m">Male</option>
                                <option value="f">Female</option>
                                <option value="o">Other</option>
                            </select>
                            <div class="" id="genderErr"></div>

                            <div class="text-danger"> </div>
                        </div> -->

                    <div class="form-group col-md-4 col-sm-6" autocomplete="off">
                        <label for="password">Passwords<span class="requiredMark">*</span></label>
                        <input type="password" name="password"
                            class="form-control input-sm <?php echo (isset($validation) && $validation->hasError('password')) ? 'is-invalid' : ''; ?>"
                            id="password" placeholder="" autocomplete="off">
                        <div class="" id="passwordErr"></div>

                        <?php
                        if (isset($validation) && $validation->hasError('password')) {
                            echo "<div class='text-danger'>" . $validation->getError('password') . "</div>";
                        }
                        ?>
                    </div>

                    <div class="form-group col-md-4 col-sm-6">
                        <label for="designation">Designation<span class="requiredMark">*</span></label>
                        <select name="designation" id="designation" value=" designation "
                            class=" form-control input-sm <?php echo (isset($validation) && $validation->hasError('designation')) ? 'is-invalid' : ''; ?>">
                            <option value="">Select</option>
                            <option value="Backend Develeper"
                                <?php echo set_value('designation')=='Backend Develeper'? 'selected' :'' ?>>Backend
                                Developer</option>
                            <option value="Frontend Develper"
                                <?php echo set_value('designation')=='Frontend Develper'? 'selected' :''?>>Frontend
                                Develop</option>
                            <option value="Graphic Designer"
                                <?php echo set_value('designation')=='Graphic Designer'? 'selected' :''?>>Graphic
                                Designer</option>
                        </select>
                        <div class="" id="designationErr"></div>

                        <?php
                        if (isset($validation) && $validation->hasError('designation')) {
                            echo "<div class='text-danger'>" . $validation->getError('designation') . "</div>";
                        }
                        ?>
                    </div>

                    <div class="form-group col-md-4 col-sm-6">
                        <label for="experience">Experience<span class="requiredMark">(in Years)*</span></label>
                        <input type="text" name="experience"
                            class="form-control input-sm <?php echo (isset($validation) && $validation->hasError('experience')) ? 'is-invalid' : ''; ?>"
                            id="experience" placeholder="In Years" value="<?php echo set_value('experience'); ?>">
                        <div class="" id="experienceErr"></div>


                        <?php
                        if (isset($validation) && $validation->hasError('experience')) {
                            echo "<div class='text-danger'>" . $validation->getError('experience') . "</div>";
                        }
                        ?>
                    </div>

                    <div class="form-group col-md-4 col-sm-6">
                        <label for="education">Education<span class="requiredMark">*</span></label>
                        <select name="qulification" id="education"
                            class=" form-control input-sm <?php echo (isset($validation) && $validation->hasError('qulification')) ? 'is-invalid' : ''; ?>">
                            <option value="">Select</option>
                            <option value="12th" <?php echo set_value('qulification')=='12th'? 'selected' :''?>>12th
                            </option>
                            <option value="Diploma" <?php echo set_value('qulification')=='Diploma'? 'selected' :''?>>
                                Diploma</option>
                            <option value="B.Tech" <?php echo set_value('qulification')=='B.Tech'? 'selected' :''?>>
                                B.Tech</option>
                        </select>
                        <div class="" id="educationErr"></div>


                        <?php
                        if (isset($validation) && $validation->hasError('qulification')) {
                            echo "<div class='text-danger'>" . $validation->getError('qulification') . "</div>";
                        }
                        ?>

                    </div>

                    <div class="form-group col-md-4 col-sm-6">
                        <label for="mobile">Mobile<span class="requiredMark">*</span></label>
                        <input type="text" name="mobile"
                            class="form-control input-sm <?php echo (isset($validation) && $validation->hasError('mobile')) ? 'is-invalid' : ''; ?>"
                            id="mobile" value="<?php echo set_value('mobile'); ?>">
                        <div class="" id="mobileErr"></div>

                        <?php
                        if (isset($validation) && $validation->hasError('mobile')) {
                            echo "<div class='text-danger'>" . $validation->getError('mobile') . "</div>";
                        }
                        ?>
                    </div>



                    <div class="form-group col-md-4 col-sm-6">
                        <label for="address">Address<span class="requiredMark">*</span></label>
                        <textarea
                            class="form-control input-sm <?php echo (isset($validation) && $validation->hasError('address')) ? 'is-invalid' : ''; ?>"
                            name="address" id="address" rows="3"> <?php echo set_value('address'); ?> </textarea>
                        <div class="" id="addressErr"></div>

                        <?php
                        if (isset($validation) && $validation->hasError('address')) {
                            echo "<div class='text-danger'>" . $validation->getError('address') . "</div>";
                        } 
                        ?>
                    </div>

                    <div class="form-group col-md-4 col-sm-6">
                        <label for="city">City<span class="requiredMark">*</span></label>
                        <input type="text" name="city"
                            class="form-control input-sm <?php echo (isset($validation) && $validation->hasError('city')) ? 'is-invalid' : ''; ?>"
                            id="city" placeholder="" value="<?php echo set_value('city'); ?>">
                        <div class="" id="cityErr"></div>

                        <?php
                        if (isset($validation) && $validation->hasError('city')) {
                            echo "<div class='text-danger'>" . $validation->getError('city') . "</div>";
                        }
                        ?>
                    </div>

                    <div class="form-group col-md-4 col-sm-6">
                        <label for="pincode">Pincode<span class="requiredMark">*</span></label>
                        <input type="text" name="pincode"
                            class="form-control input-sm <?php echo (isset($validation) && $validation->hasError('pincode')) ? 'is-invalid' : ''; ?>"
                            id="pincode" placeholder="" value="<?php echo set_value('pincode'); ?>">
                        <div class="" id="pincodeErr"></div>

                        <?php
                        if (isset($validation) && $validation->hasError('pincode')) {
                            echo "<div class='text-danger'>" . $validation->getError('pincode') . "</div>";
                        }
                        ?>
                    </div>

                    <div class="form-group col-md-4 col-sm-6">
                        <label for="state">State<span class="requiredMark">*</span></label>
                        <input type="text" name="state"
                            class="form-control input-sm <?php echo (isset($validation) && $validation->hasError('state')) ? 'is-invalid' : ''; ?>"
                            id="state" placeholder="" value="<?php echo set_value('state'); ?>">
                        <div class="" id="stateErr"></div>
                        <?php
                        if (isset($validation) && $validation->hasError('state')) {
                            echo "<div class='text-danger'>" . $validation->getError('state') . "</div>";
                        }
                        ?>
                    </div>

                    <div class="form-group col-md-4 col-sm-6">
                        <label for="country">Country<span class="requiredMark">*</span></label>
                        <input type="text" name="country"
                            class="form-control input-sm <?php echo (isset($validation) && $validation->hasError('country')) ? 'is-invalid' : ''; ?>"
                            id="country" placeholder="" value="<?php echo set_value('country'); ?>">
                        <div class="" id="countryErr"></div>

                        <?php
                        if (isset($validation) && $validation->hasError('country')) {
                            echo "<div class='text-danger'>" . $validation->getError('country') . "</div>";
                        }
                        ?>
                    </div>

                    <!-- {{-- ------Image Upload Starts ---------------------------------------- --}} -->

                    <!-- 
                    <div class="form-group col-md-4 col-sm-6">
                        <label for="country">Profile Image<span class="requiredMark">*</span></label>
                        <input type="file" name="profile_image" class="form-control input <?php echo (isset($validation) && $validation->hasError('profile_image')) ? 'is-invalid' : ''
                        ; ?>" id="profile_image" onchange="previewImage()">
                        <div class="" id="profileErr"></div>

                        <?php
                        if (isset($validation) && $validation->hasError('profile_image')) {
                            echo "<div class='text-danger'>" . $validation->getError('profile_image') . "</div>";
                        }
                        ?>
                    </div>
                    <div class="col-md-4 col-sm-6">
                        <div class="rounded previewImg" id="previewImg" style="width: 100px; height: 100px;">

                        </div>
                    </div> -->
                    <!-- {{-- -------------------------------------------------------- --}} -->


                    <div>
                        <div class="form-check fs-6">
                            <input class="form-check-input " name="subscribe" type="checkbox" value="1"
                                id="flexCheckDefault">
                            <label class="form-check-label" for="flexCheckDefault">
                                Subscribe
                            </label>
                        </div>

                    </div>

                    <div class="col-md-12 col-sm-12 col-lg-12 mt-3">
                        <div class="form-group col-md-12  col-sm-12">
                            <input type="submit" class="btn btn-primary" id="submitBtn" value="Register" />
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="<?php echo base_url(); ?>/public/js/index.js"></script>
<?= $this->endSection() ?>
<!-- @section('scripts')


@endsection -->