@extends('layouts.app')

@section('content')
<br/>
<hr/>
   <h1 class="text-center text-success">Edit Category Form</h1>
<hr/>
   <h2 class="text-center text-success">{{Session::get('message')}}</h2>
<hr/>
  <div class="row">
  	<div class="col-sm-12">
  	  <div class="well">
       {!! Form::open(['url'=>'/category/update','name'=>'editCategoryForm','method'=>'POST','class'=>'form-horizontal']) !!}
          <div class="form-group">
             {!! Form::label('category_name','Category Name',['class'=>'control-label col-sm-3'])!!}
        	 <div class="col-sm-9">
        	 {!! Form::text('category_name',$value=$categoryById->category_name,['class'=>'foem-control','placeholder'=>'Enter category name'])!!}
           <input type="hidden" name="category_id" value="{{$categoryById->id}}">
        	 </div>
          </div>

           <div class="form-group">
             {!! Form::label('category_description','Category Description',['class'=>'control-label col-sm-3'])!!}
        	 <div class="col-sm-9">
        	 {!! Form::textarea('category_description',$value=$categoryById->category_description,['class'=>'foem-control','placeholder'=>'Enter category Description'])!!}
        	 </div>
          </div>
           
           <!--<div class="form-group">
             {!! Form::label('publication','Publication Status',['class'=>'control-label col-sm-3'])!!}
        	 <div class="col-sm-9">
        	 {!! Form::select('size', ['1' => 'Published', '0' => 'Unpublished'], '1');!!}
        	 </div>
          </div> -->

          <div class="form-group">
            <label class="control-label col-sm-3">Publiction Status</label>
            <div class="col-sm-3">
               <select class="form-control" name="publication_status">
                 <option>---Select Publication Status---</option>
                 <option value="1">Published</option>
                 <option value="0">Unpublish</option>
               </select>
            </div>
          </div>

          <div class="form-group">
        	 <div class="col-sm-9 col-sm-offset-3">
        	 {!! Form::submit('Update category info!',['class'=>'btn btn-success btn-large col-sm-3']);!!}
        	 </div>
          </div>


        {!! Form::close() !!}
       </div>
  	</div>	
  </div>
  <script>
    document.forms['editCategoryForm'].elements['publication_status'].value ='{{$categoryById->publication_status}}'
  </script>
@endsection