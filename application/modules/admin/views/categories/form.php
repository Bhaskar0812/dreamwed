<div class="row wrapper border-bottom white-bg page-heading">
  <div class="col-lg-10">
    <h2>Basic Form</h2>
    <ol class="breadcrumb">
      <li class="breadcrumb-item">
        <a href="index.html">Home</a>
      </li>
      <li class="breadcrumb-item">
        <a>Forms</a>
      </li>
      <li class="breadcrumb-item active">
        <strong>Basic Form</strong>
      </li>
    </ol>
  </div>
  <div class="col-lg-2"></div>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
  <div class="row">
    <div class="col-lg-12">
      <div class="ibox ">
        <div class="ibox-title">
          <h5>Category Create</h5>
          <div class="ibox-tools">
            <a class="collapse-link">
              <i class="fa fa-chevron-up"></i>
            </a>
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
              <i class="fa fa-wrench"></i>
            </a>
            <ul class="dropdown-menu dropdown-user">
              <li><a href="#" class="dropdown-item">Config option 1</a>
              </li>
              <li><a href="#" class="dropdown-item">Config option 2</a>
              </li>
            </ul>
            <a class="close-link">
              <i class="fa fa-times"></i>
            </a>
          </div>
        </div>
        <div class="ibox-content">
          <?php echo form_open(base_url()."admin/categories/create", "id=categories")?>
            <div class="form-group row">
              <label class="col-lg-2 col-form-label">Category Name</label>
              <div class="col-lg-10">
                <input type="text" name="name" placeholder="Category" class="form-control">
              </div>
            </div>
            <div class="hr-line-dashed"></div>
            <div class="form-group row">
              <div class="col-sm-4 col-sm-offset-2">
                <button class="btn btn-white btn-sm" type="submit">Cancel</button>
                <button class="btn btn-primary btn-sm" type="submit">Save</button>
              </div>
            </div>
          <?php echo form_close();?>
        </div>
      </div>
    </div>
  </div>
</div>
