<?php $this->load->view('partials/header') ?>
<?php $this->load->view('partials/navigation') ?>
<div class="container">
    <div class="row">
        <h3 class='col-xs-12'>Welcome</h3>
    </div>

    <div class="row">
        <div class="well col-sm-3">
            <div class="col-xs-8 ">
                <label class='form_type'>Register</label>
            </div>
            <form action='/users/register' method='post' class='form form-horizontal'>
                <div class="form-group">
                    <div class="col-xs-10">
                        <input type='text' name='name' id='name' class='form-control' placeholder="Name">
                        <span class='error'><? echo $this->session->flashdata('name');?></span>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-10">
                        <input type='text' name='alias' id='alias' class='form-control' placeholder="Alias">
                        <span class='error'><? echo $this->session->flashdata('alias');?></span>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-10">
                        <input type='text' name='email' id='email' class='form-control' placeholder="Email">
                        <span class='error'><? echo $this->session->flashdata('email');?></span>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-10">
                        <input type='password' name='password' id='password' class='form-control' placeholder="Password">
                        <span class='error'><? echo $this->session->flashdata('password');?></span>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-10">
                        <input type='password' name='confirm_password' id='confirm_password' class='form-control' placeholder="Confirm Password">
                        <span class='error'><? echo $this->session->flashdata('confirm_password');?></span>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-10">
                        <input type='date' name='dob' id='dob' class='form-control' placeholder='MM/DD/YYYY'>
                        <span class='error'><? echo $this->session->flashdata('dob');?></span>
                    </div>
                </div>
                <div class="col-xs-offset-4">
                    <input type='submit' value='Register' class='submit btn'>
                </div>
            </form>
        </div>

        <div class="well col-sm-3">
            <div class="col-xs-8">
                <label class='form_type'>Login</label>
            </div>
            <form action='/users/login' method='post' class="form form-horizontal">
                <div class="form-group">
                    <div class="col-xs-10">
                        <input type='text' name='email2' id='email2' class='form-control' placeholder="Email">
                        <span class='error'><? echo $this->session->flashdata('email2');?></span>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-10">
                        <input type='password' name='password2' id='password2' class='form-control' placeholder="Password">
                        <span class='error'><? echo $this->session->flashdata('password2');?></span>
                    </div>
                </div>
                <div class="col-xs-offset-1">
                    <input type='submit' value='Login' class='submit btn'>
                </div>
            </form>
        </div>
    </div>
</div> <!-- End Container -->
</body>
