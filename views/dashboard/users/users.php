<?php
  if(session()->get('isadmin')==='1'){
    session()->set('current_page','users');

    view()->load('dashboard/partials/header');
    ?>

    <!--main-container-part-->
    <div id="content">
      <div id="content-header">
        <div id="breadcrumb"> <a href="" title="Go to Home" class="tip-bottom"><i class="fa fa-home"></i> <?php echo ucfirst(session()->get('current_page')) ?></a> <a href="#" class="current"><?php echo ucfirst(session()->get('current_sub_page')) ?></a> </div>
        <h1>List Of Users</h1>
        <a href="<?php echo site_url('signup') ?>" class="btn btn-primary btn-sm pull-right" target="__blank"><i class="fa fa-plus"></i> Register New</a>
        </div>
        <div class="container-fluid">
          <div class="row-fluid">
            <div class="span12">

              <?php
                $users = app()->userModel()->findAll('WHERE isadmin = 0');
                if ($users):
              ?>
              <div class="widget-box">
                <div class="widget-content nopadding">
                  <table class="table table-bordered table-striped">
                    <thead>
                      <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Age Range</th>
                      <th>Sign Up</th>
                      <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($users as $user): ?>
                        <tr class="even gradeX">
                          <td><?php echo $user->id ?></td>
                          <td><?php echo $user->firstname . ' ' . $user->lastname ?></td>
                          <td><?php echo $user->email ?></td>
                          <td><?php echo $user->agerange ?></td>
                          <td><?php echo $user->created_at ?></td>
                          <td>
                            <a href="<?php echo site_url('dashboard/users/upgrade?id='.$user->id) ?>" class="badge badge-warning"><i class="fa fa-user"></i> Make Admin</a>
                            <a href="<?php echo site_url('dashboard/users/delete?id='.$user->id) ?>" class="badge badge-danger"><i class="fa fa-remove"></i> Delete</a>
                          </td>
                        </tr>
                      <?php endforeach; ?></a>
                    </tbody>
                  </table>
                </div>
              </div>
              <?php else: ?>
                <div class="widget-content nopadding">
                <hr>No users have signed up yet.
                </div>
              <?php endif ?>
            </div>
          </div>

        </div>
      </div>
    </div>
    <!--end-main-container-part-->

    <?php
    view()->load("dashboard/partials/footer");
  }//end if
  else{
    redirect('/login');
  }
  ?>

