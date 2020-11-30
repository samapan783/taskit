 @extends('admin.adminmain')
 @section('title',"Gallery")
 @section('stylesheets')

 @endsection

 @section('content')
<section id="content">
<section class="vbox">
<section class="scrollable padder">

 			<ul class="breadcrumb no-border no-radius b-b b-light pull-in">
                <li><a href=""><i class="fa fa-home"></i>Home</a></li>>
                <li><a href="">Doctor management</a></li>>
                <li><a href="">View details</a></li>
            </ul>

                       <header class="panel-heading">
                        <span class="h4">Doctor Details</span>
                      </header>
                      {{Form::model($doctor,['route' =>['doctor.update',$doctor->id],'method'=>'PUT','files' => true, 'class'=>'form-horizontal course-form','data-parsley-validate'])}}

                      <div class="panel-body">                   
                         <div class="form-group">
                          <label class="col-sm-3 control-label">Doctor name</label>
                          <div class="col-sm-9">

                            {{Form::label('name',$doctor->name, ['class' => 'form-control','data-required'=>'true','disabled'])}}
                          </div>
                        </div>

                        <div class="line line-dashed line-lg pull-in"></div>
                        <div class="form-group">
                          <label class="col-sm-3 control-label">Qualification</label>
                          <div class="col-sm-9">
                            {{Form::label('qualification',$doctor->qualification, ['class' => 'form-control','data-required'=>'true','disabled'])}} 
                          </div>
                        </div>
                        
                        <div class="line line-dashed line-lg pull-in"></div>

                        <div class="form-group">
                          <label class="col-sm-3 control-label">Years Of Experience</label>
                          <div class="col-sm-9">

                            {{Form::label('yoe',$doctor->yoe, ['class' => 'form-control','data-required'=>'true','disabled'])}}
                          </div>
                        </div>
                        
                        <div class="line line-dashed line-lg pull-in"></div>
                        <div class="form-group">
                          <label class="col-sm-3 control-label">Visit Hours</label>
                          <div class="col-sm-9">
                            <textarea id="summernote" name="visit_hours" class="form-control" disabled="true">{!!$doctor->visit_hours!!}</textarea> 
                          </div>
                        </div>

                        <div class="line line-dashed line-lg pull-in"></div>
                      
                        <div class="form-group">
                          <label class="col-sm-3 control-label">Status</label>
                          <div class="col-sm-9">
                            <select name="status" disabled="true">
                         <option value="">select</option>
                         <option value="A" {{$doctor->status=='A'?'selected':''}}>Active</option>
                         <option value="I" {{$doctor->status=='I'?'selected':''}}>Inactive</option>
                           </select>

                          </div>
                         </div>
                    
                    
                      

                       <div class="line line-dashed line-lg pull-in"></div>
                        <div class="form-group">
                            <div class="col-sm-9">
                            <img src="{{asset('/images/doctors/'.$doctor->image)}}" alt="Park" style="width:30%">
                           </div>
                     </div>
                  <footer class="panel-footer text-right bg-light lter">
                       
<!--                         <a href="{{url('/admin/doctor/edit')}}" class="btn btn-success">Edit</a> -->
                        <a href="{{url('/admin/doctor/')}}" class="btn btn-danger">Back</a>
                      </footer>






                     </div>








          <div class="modal fade" id="formConfirm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                  <h4 class="modal-title" id="frm_title">Delete</h4>
                </div>
                <div class="modal-body" id="frm_body">Are you sure, you want to delete this Topic ?</div>
                <div class="modal-footer">
                  <button style='margin-left:10px;' type="button" class="btn btn-danger col-sm-2 pull-right" id="frm_submit">Confirm</button>
                  <button type="button" class="btn btn-primary col-sm-2 pull-right" data-dismiss="modal" id="frm_cancel">Cancel</button>
                </div>
              </div>
            </div>
          </div>         
                     {{Form::close()}}
                      
                      
          

</section>
</section>
</section>



 @endsection


 @section('scripts')

<script>

$(document).ready(function(){

     
  $('.formConfirm').on('click', function(e) {
    //alert();
        e.preventDefault();
        var el = $(this);
        // alert(el);
        var title = el.attr('data-title');
        var msg = el.attr('data-message');
        var dataForm = el.attr('data-form');
        
        $('#formConfirm')
        .find('#frm_body').html(msg)
        .end().find('#frm_title').html(title)
        .end().modal('show');
        
        $('#formConfirm').find('#frm_submit').attr('data-form', dataForm);
  });
  $('#formConfirm').on('click', '#frm_submit', function(e) {
        // console.log($('.frmDelete'));
        $('.frmDelete').submit();        
  });
});
</script>
 @endsection
