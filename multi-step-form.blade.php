<div>
    @push('css')
        <style>
            .form-step {
                display: none;
            }

            .form-step.active {
                display: block;
                transform-origin: top;
                animation: animate .5s;
            }

            .prog-bar {
                position: relative;
                display: flex;
                justify-content: space-between;
                counter-reset: step;
                margin-bottom: 30px;
            }

            .prog-bar::before,
            .prog {
                content: "";
                position: absolute;
                top: 50%;
                transform: translateY(-50%);
                height: 4px;
                width: 100%;
                background-color: #dcdcdc;
                z-index: -1;
            }

            .prog {
                background-color: blue;
                width: 0;
                transition: .5s;
                z-index: 1;
            }

            .prog-step {
                width: 35px;
                height: 35px;
                background-color: #dcdcdc;
                border-radius: 50%;
                display: flex;
                justify-content: center;
                align-items: center;
                z-index: 2;
            }

            .prog-step::before {
                counter-increment: step;
                content: counter(step);
            }

            .prog-step::after {
                content: attr(data-title);
                position: absolute;
                top: calc(100% + 0.20rem);
                font-size: 0.85rem;
                color: black !important;
            }

            .prog-step.active {
                background-color: blue;
                color: white;
            }

            @keyframes animate {
                from {
                    transform: scale(1, 0);
                    opacity: 0;
                }

                to {
                    transform: scale(1, 1);
                    opacity: 1;
                }
            }

            /* End Progress bar */
        </style>
    @endpush
    <div class="card">
        <div class="card-body">
            <form action="data.php" method="post" class="form">
                <!-- Progress Bar -->
                <div class="prog-bar mb-5">
                    <div class="prog" id="prog"></div>
                    <div class="prog-step active" data-title="Basic"></div>
                    <div class="prog-step" data-title="Educational"></div>
                    <div class="prog-step" data-title="Personal"></div>
                </div>
                <!-- Steps -->
                <div class="form-step active">
                    <div class="row">
                        <div class="col-12">
                            <h3 class="header smaller lighter blue">Basic Information</h3>
                            <hr>
                        </div>

                        <div class="col-sm-6">
                            <!-- JOINING DATE -->
                            <div class="form-group row">
                                <label class="col-5">
                                    <b>
                                        Joining Date
                                        <span class="text-danger">*</span>
                                    </b>
                                </label>

                                <div class="col-7">
                                    <input type="date" class="form-control input-sm" required=""
                                        name="joining_date" id="joining_date" value="" autocomplete="off">
                                </div>
                            </div>

                            <!-- BRANCH -->

                            <!-- DEPARTMENT -->
                            <div class="form-group row">
                                <label class="col-5 control-label">
                                    <b>
                                        Department
                                        <span class="text-danger">*</span>
                                    </b>
                                </label>
                                <div class="col-7">
                                    <select name="department_id" class="form-control input-sm" required=""
                                        id="department">
                                        <option>Select Department</option>
                                        @foreach ($departments as $department)
                                            <option value="{{ $department->id }}">{{ $department->department }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <!-- DESIGNATION -->
                            <div class="form-group row">
                                <label class="col-5 control-label">
                                    <b>
                                        Designation
                                        <span class="text-danger">*</span>
                                    </b>
                                </label>
                                <div class="col-7">
                                    <select name="designation_id" class="form-control input-sm" required=""
                                        id="designation">
                                        <option>Select Designation</option>
                                        @foreach ($designations as $designation)
                                            <option value="{{ $designation->id }}">
                                                {{ $designation->designation }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <!-- Shift -->
                            <div class="form-group row">
                                <label class="col-5 control-label">
                                    <b>
                                        Shift
                                        <span class="text-danger">*</span>
                                    </b>
                                </label>
                                <div class="col-7">
                                    <select name="shift_id" class="form-control input-sm" required="" id="shift_id">
                                        <option>Select Shift</option>
                                        @foreach ($shifts as $shift)
                                            <option value="{{ $shift->id }}">
                                                {{ $shift->shift_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <!-- EMPLOYEE ID -->
                            <div class="form-group row">
                                <label class="col-5 control-label">
                                    <b>Employee Id</b>
                                </label>

                                <div class="col-7">
                                    <input type="text" class="form-control input-sm" name="employee_id"
                                        value="" readonly="" id="emp_id">
                                </div>
                            </div>

                            <!-- EMPLOYEE NAME -->
                            <div class="form-group row">
                                <label class="col-5 control-label">
                                    <b>
                                        Employee Name
                                        <span class="text-danger">*</span>
                                    </b>
                                </label>

                                <div class="col-7">
                                    <input type="text" class="form-control input-sm" required=""
                                        name="employee_name" id="" value=""
                                        placeholder="Employee/Worker Name">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-5 control-label">
                                    <b>
                                        Employee Name(বাংলায়)
                                    </b>
                                </label>

                                <div class="col-7">
                                    <input type="text" class="form-control input-sm" name="bangla_name"
                                        id="bangla_name" value="" placeholder="কর্মচারীর নাম">

                                </div>
                            </div>

                            <!-- EMPLOYEE IMAGE -->
                            <div class="form-group row">
                                <label class="col-5 control-label">
                                    <b>Employee Image</b>
                                </label>

                                <div class="col-7">
                                    <input type="file" name="employee_image" id="id-input-file-3">
                                </div>
                            </div>

                            <!-- EMPLOYEE SIGNATURE -->

                            <!-- FATHER OR HUSBAND NAME -->
                            <div class="form-group row">
                                <label class="col-5 control-label">
                                    <b>Father/Husband Name</b>
                                </label>

                                <div class="col-7">
                                    <input type="text" class="form-control input-sm" name="employee_father_name"
                                        value="" placeholder="Father/Husband Name">
                                </div>
                            </div>

                            <!-- MOTHER NAME -->
                            <div class="form-group row">
                                <label class="col-5 control-label">
                                    <b>Mother's Name</b>
                                </label>

                                <div class="col-7">
                                    <input type="text" class="form-control input-sm" name="employee_mother_name"
                                        value="" placeholder="Mother's Name">
                                </div>
                            </div>

                            <!-- DATE OF BIRTH -->
                            <div class="form-group row">
                                <label class="col-5 control-label">
                                    <b>Date Of Birth
                                        <span class="text-danger">*</span>
                                    </b>
                                </label>

                                <div class="col-7 ">
                                    <input type="date" class="form-control input-sm" name="date_of_birth"
                                        required="" placeholder="Date Of Birth ">

                                </div>
                            </div>

                            <!-- GENDER -->
                            <div class="form-group row">
                                <label class="col-5 control-label">
                                    <b>
                                        Gender
                                        <span class="text-danger">*</span>
                                    </b>
                                </label>
                                <div class="col-7">
                                    <select name="gender" class="form-control input-sm" required=""
                                        id="gender">
                                        <option>Select Gender</option>
                                        @foreach (GENDER as $item)
                                            <option value="{{ $item }}">
                                                {{ $item }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <!-- MARITAL STATUS -->
                            <div class="form-group row">
                                <label class="col-5 control-label">
                                    <b>
                                        Maritial Status
                                        <span class="text-danger">*</span>
                                    </b>
                                </label>
                                <div class="col-7">
                                    <select name="marital_status" class="form-control input-sm" required=""
                                        id="marital_status">
                                        <option>Select Status</option>
                                        @foreach (MARITAL_STATUS as $item)
                                            <option value="{{ $item }}">
                                                {{ $item }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <!-- Religion -->
                            <div class="form-group row">
                                <label class="col-5 control-label">
                                    <b>
                                        Religion
                                        <span class="text-danger">*</span>
                                    </b>
                                </label>
                                <div class="col-7">
                                    <select name="religion" class="form-control input-sm" required=""
                                        id="religion">
                                        <option>Select Status</option>
                                        @foreach (RELIGION as $item)
                                            <option value="{{ $item }}">
                                                {{ $item }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <!-- GRADE -->

                            <div class="form-group row">
                                <label class="col-5 control-label">
                                    <b>
                                        Present Phone Number
                                        <span class="text-danger">*</span>
                                    </b>
                                </label>
                                <div class="col-7 ">
                                    <input type="number" class="form-control input-sm" name="present_phone_number"
                                        required="" placeholder="Present Phone Numbers">

                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-5 control-label">
                                    <b>
                                        Permanent Phone Number
                                    </b>
                                </label>
                                <div class="col-7 ">
                                    <input type="number" class="form-control input-sm" name="permanent_phone_number"
                                        value="" placeholder="Permanent Phone Numbers">

                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group row">
                                <label class="col-5 control-label">
                                    <b>
                                        Email
                                        <span class="text-danger">*</span>
                                    </b>
                                </label>
                                <div class="col-7 ">
                                    <input type="email" class="form-control input-sm" name="email"
                                        value="" placeholder="Email" required>

                                </div>
                            </div>
                            <!-- PRESENT ADDRESS -->
                            <div class="form-group row">
                                <label class="col-5 control-label">
                                    <b>Present Address
                                        <span class="text-danger">*</span>
                                    </b>
                                </label>

                                <div class="col-7">
                                    <textarea class="form-control input-sm" name="present_address" id="present_address" rows="5"
                                        placeholder="Present Address" required></textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-5 control-label">
                                    <b>
                                        Permanent Address
                                    </b>
                                </label>

                                <div class="col-7 ">

                                    <textarea class="form-control input-sm" name="permanent_address" id="permanent_address" rows="5"
                                        placeholder="Present Address"></textarea>

                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-5 control-label">
                                    <b>
                                        Nationality
                                        <span class="text-danger">*</span>
                                    </b>
                                </label>
                                <div class="col-7">
                                    <select name="nationality" class="form-control input-sm" required=""
                                        id="nationality">
                                        <option>Select Nationality</option>
                                        @foreach (NATIONALITY as $item)
                                            <option value="{{ $item }}">
                                                {{ $item }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-5 control-label">
                                    <b>
                                        National Id
                                        <span class="text-danger">*</span>
                                    </b>
                                </label>
                                <div class="col-7 ">
                                    <input type="number" class="form-control input-sm" name="national_id"
                                        required="" placeholder="National Id">

                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-5 control-label">
                                    <b>
                                        Passport No
                                    </b>
                                </label>
                                <div class="col-7 ">
                                    <input type="text" class="form-control input-sm" name="passport_no"
                                        value="" placeholder="Passport No.">

                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-5 control-label">
                                    <b>
                                        Passport Issue Date
                                    </b>
                                </label>
                                <div class="col-7 ">
                                    <input type="date" class="form-control input-sm" name="passport_issue_date"
                                        value="" placeholder="Passport Issue Date">

                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-5 control-label">
                                    <b>
                                        Passport Expiry Date
                                    </b>
                                </label>
                                <div class="col-7 ">
                                    <input type="date" class="form-control input-sm" name="passport_expiry_date"
                                        value="" placeholder="Passport Issue Date">

                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-5 control-label">
                                    <b>
                                        Finger Print ID
                                    </b>
                                </label>
                                <div class="col-7 ">
                                    <input type="text" class="form-control input-sm" name="finger_print_id"
                                        value="" placeholder="Finger Print ID">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-5 control-label">
                                    <b>
                                        Employment
                                        Status
                                        <span class="text-danger">*</span>
                                    </b>
                                </label>

                                <div class="col-7 ">

                                    <select name="employment_status" class="form-control input-sm"
                                        id="employment_status" required>
                                        <option value="">- Select One -</option>
                                        @foreach (EMPLOYMENT_STATUS as $item)
                                            <option value="{{ $item }}">
                                                {{ $item }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-5 control-label">
                                    <b>
                                        Probation Period
                                    </b>
                                </label>
                                <div class="col-7 ">
                                    <div class="input-group">
                                        <input type="number" class="form-control input-sm input-small"
                                            name="probation_period" value="" placeholder="Probation Period">
                                        <span class="input-group-addon"><i
                                                class="fa fa-folder-open-o"></i>Months</span>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-5 control-label">
                                    <b>
                                        Over Time
                                    </b>
                                </label>
                                <div class="col-7 ">
                                    <div class="radio">
                                        <label>
                                            <input name="over_time" type="radio" value="1" checked=""
                                                class="ace">
                                            <span class="lbl"> Yes</span>
                                        </label>
                                        <label>
                                            <input name="over_time" type="radio" value="0" class="ace">
                                            <span class="lbl"> No</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <a class="btn btn-primary btn-next">Next</a>
                    </div>
                </div>
                <div class="form-step">
                    <h1>First</h1>
                    <div class="btn-group">
                        <a class="btn btn-prev">Previous</a>
                        <a class="btn btn-next">Next</a>
                    </div>
                </div>
                <div class="form-step">
                    <h1>First</h1>
                    <div class="btn-group">
                        <a class="btn btn-prev">Previous</a>
                        <a class="btn btn-next">Next</a>
                    </div>
                </div>
                <div class="form-step">
                    <h1>First</h1>
                    <div class="btn-group">
                        <a class="btn btn-prev">Previous</a>
                        <a class="btn btn-complete">Complete</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@push('js')
    <script>
        const prevBtns = document.querySelectorAll(".btn-prev");
        const nextBtns = document.querySelectorAll(".btn-next");
        const prog = document.getElementById("prog");
        const formSteps = document.querySelectorAll(".form-step");
        const progressSteps = document.querySelectorAll(".prog-step");
        const addExperienceBtn = document.querySelector(".add-exp-btn");
        const experiencesGroup = document.querySelector(".experiences-group");
        const btnComplete = document.querySelector(".btn-complete");
        btnComplete.addEventListener("click", () => {
            document.getElementsByTagName('form').submit
        })
        let formStepsNum = 0;
        let experienceNum = 1;


        function updateFormSteps() {

            formSteps.forEach(formStep => {
                formStep.classList.contains("active") &&
                    formStep.classList.remove("active");
            })
            formSteps[formStepsNum].classList.add("active");
        }

        function updateProgressBar() {
            progressSteps.forEach((progressStep, idx) => {
                if (idx < formStepsNum + 1) {
                    progressStep.classList.add("active");
                } else {
                    progressStep.classList.remove("active");
                }
            })

            const progressActive = document.querySelectorAll(".prog-step.active");
            prog.style.width = ((progressActive.length - 1) / (progressSteps.length - 1)) * 100 + '%';
        }


        nextBtns.forEach(btn => {
            btn.addEventListener("click", function() {
                formStepsNum++;
                updateFormSteps();
                updateProgressBar();
                console.log("kk")
            })
        })


        prevBtns.forEach(btn => {
            btn.addEventListener("click", function() {
                formStepsNum--;
                updateFormSteps();
                updateProgressBar();
                console.log("kk")
            })
        })
    </script>
@endpush
