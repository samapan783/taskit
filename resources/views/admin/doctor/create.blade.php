 @extends('admin.adminmain')
 @section('title',"Admin | Doctor")
 @section('stylesheets')

 @endsection

 @section('content')
<section id="content">
<section class="vbox">
<section class="scrollable padder">

 			<ul class="breadcrumb no-border no-radius b-b b-light pull-in">
                <li><a href=""><i class="fa fa-home"></i>Home</a></li>>
                <li><a href="">Doctor management</a></li>>
                <li><a href="">Add Details</a></li>
            </ul>

                       <header class="panel-heading">
                        <span class="h4">Add Image</span>
                      </header>

                      {{Form::open(['route' => 'doctor.store','files' => true, 'class'=>'form-horizontal course-form','data-parsley-validate'])}}
                      <div class="panel-body">                   
                         <div class="form-group">
                          <label class="col-sm-3 control-label">Doctor's Name</label>
                          <div class="col-sm-9">
                            <input type="text" name="name" class="form-control"  data-required="true" placeholder="Doctor's Name" required>   
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-sm-3 control-label">Years Of Experience</label>
                          <div class="col-sm-9">
                            <input type="text" name="yoe" class="form-control"  data-required="true" placeholder="Years Of Experience" data-parsley-type="digits" maxlength="2" required>   
                          </div>
                        </div>


                        <div class="form-group">
                          <label class="col-sm-3 control-label">Qualification</label>
                          <div class="col-sm-9">
                            <input type="text" name="qualification" class="form-control"  data-required="true" placeholder="Qualification" required>   
                          </div>
                        </div>


                         <div class="line line-dashed line-lg pull-in"></div>
                        <div class="form-group">
                          <label class="col-sm-3 control-label">Visit Hours</label>
                          <div class="col-sm-9">
                            <!-- <input type="text" name="description" class="form-control"  data-required="true" placeholder="Description" required> -->  
                            <textarea id="summernote" name="visit_hours" class="form-control" required></textarea> 
                          </div>
                        </div>
                        <div class="line line-dashed line-lg pull-in"></div>
                        <div class="form-group">
                          <label class="col-sm-3 control-label">Status</label>
                          <div class="col-sm-9">
                            <select name="status" required>
                         <option value="">select</option>
                         <option value="A">Active</option>
                         <option value="I">Inactive</option>
                           </select>

                          </div>
                         </div>
                    
                    
                      

                       <div class="line line-dashed line-lg pull-in"></div>
                        <div class="form-group">
                          <label class="col-sm-3 control-label">Select An Image(Min Dimension:300 x 200)</label>
                          <div class="col-sm-9">

            <div class="input_fields_wrap">
                
                
                  <div style="margin-bottom:10px;">
                       <input type="file" name="image_name" class="GalleryImage" id="img0" required /> &nbsp 
                  </div>

           </div>      
                       </div>
                     </div>
                  <footer class="panel-footer text-right bg-light lter">
                       
                          <input type="submit" class="btn btn-success btn-s-xs" value="Submit"/>

                        <a href="{{url('/admin/course-management')}}" class="btn btn-danger">Cancel</a>
                      </footer>


                     </div>

                     {{Form::close()}}
                      
                      
          

</section>
</section>
</section>



 @endsection


 @section('scripts')

 @endsection
