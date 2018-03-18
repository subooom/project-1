<?php
  if(session()->get('isadmin')==='1'){
    session()->set('current_page','admins');

    view()->load('dashboard/partials/header');
    ?>

    <!--main-container-part-->
    <div id="content">
      <div id="content-header">
        <div id="breadcrumb"> <a href="" title="Go to Home" class="tip-bottom"><i class="fa fa-home"></i> <?php echo ucfirst(session()->get('current_page')) ?></a> <a href="#" class="current"><?php echo ucfirst(session()->get('current_sub_page')) ?></a> </div>
        <h1>List Of Admins</h1>
        <a href="<?php echo site_url('signup') ?>" class="btn btn-primary btn-sm pull-right" target="__blank"><i class="fa fa-plus"></i> Register New</a>
        </div>
        <div class="container-fluid">
          <div class="row-fluid">
            <div class="span12">

              <?php
                $admins = app()->userModel()->findAll('WHERE isadmin = 1');
                if ($admins):
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
                      <?php foreach ($admins as $admin): ?>
                        <tr class="even gradeX">
                          <td class="text-center"><?php echo $admin->id ?></td>
                          <td class="text-center"><?php echo $admin->firstname . ' ' . $admin->lastname ?></td>
                          <td class="text-center"><?php echo $admin->email ?></td>
                          <td class="text-center"><?php echo $admin->agerange ?></td>
                          <td class="text-center"><?php echo $admin->created_at ?></td>
                          <td class="text-center">
                            <a href="<?php echo site_url('/dashboard/users/upgrade?id='.$admin->id) ?>" class="badge badge-warning text-center"><i class="fa fa-level-down"></i> Downgrade</a>
                            <a href="<?php echo site_url('/dashboard/users/delete?id='.$admin->id) ?>" class="badge badge-danger"><i class="fa fa-remove"></i> Delete</a>
                          </td>
                        </tr>
                      <?php endforeach; ?></a>
                    </tbody>
                  </table>
                </div>
              </div>
              <?php else: ?>
                <div class="widget-content nopadding">
                <hr>No Items Available
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

