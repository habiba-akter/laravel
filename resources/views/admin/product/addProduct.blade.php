@extends('layouts.app')

@section('content')
<br/>
<hr/>
   <h1 class="text-center text-success">Add Product Form</h1>
<hr/>
   <h2 class="text-center text-success">{{Session::get('message')}}</h2>
<hr/>
  <div class="row">
    <div class="col-sm-12">
      <div class="well">
       {!! Form::open(['route'=>'new-product','method'=>'POST','class'=>'form-horizontal','enctype'=>'multipart/form-data']) !!}
          <div class="form-group">
             {!! Form::label('product_name','Product Name',['class'=>'control-label col-sm-3'])!!}
           <div class="col-sm-9">
           {!! Form::text('product_name',$value=null,['class'=>'foem-control','placeholder'=>'Enter product name'])!!}
            <span class="text-danger">{{$errors->has('product_name') ? $errors->first('product_name'):''}}</span>
           </div>
          </div>

           <div class="form-group">
            <label class="control-label col-sm-3">Category Name</label>
            <div class="col-sm-3">
               <select class="form-control" name="category_id">
                 <option>---Select Category name---</option>
                 @foreach($publishedCategories as $publishedCategory)
                 <option value="{{$publishedCategory->id}}">{{$publishedCategory->category_name}}</option>
                 @endforeach
               </select>
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-3">Manufacturer Name</label>
            <div class="col-sm-3">
               <select class="form-control" name="manufacturer_id">
                 <option>---Select Manufacturer Name---</option>
                 @foreach($publishedManufacturers as $publishedManufacturer)
                 <option value="{{$publishedCategory->id}}">{{$publishedManufacturer->manufacturer_name}}</option>
                 @endforeach
               </select>
            </div>
          </div>

          <div class="form-group">
             {!! Form::label('product_price','Product Price',['class'=>'control-label col-sm-3'])!!}
           <div class="col-sm-9">
           {!! Form::number('product_price',$value=null,['class'=>'foem-control','placeholder'=>'Enter product price'])!!}
            <span class="text-danger">{{$errors->has('product_price') ? $errors->first('product_price'):''}}</span>
           </div>
          </div>

          <div class="form-group">
             {!! Form::label('product_quantity','Product Quantity',['class'=>'control-label col-sm-3'])!!}
           <div class="col-sm-9">
           {!! Form::number('product_quantity',$value=null,['class'=>'foem-control','placeholder'=>'Enter product quantity'])!!}
            <span class="text-danger">{{$errors->has('product_quantity') ? $errors->first('product_quantity'):''}}</span>
           </div>
          </div>

           <div class="form-group">
             {!! Form::label('product_short_description','Product Short Description',['class'=>'control-label col-sm-3'])!!}
           <div class="col-sm-9">
           {!! Form::textarea('product_short_description',$value=null,['class'=>'foem-control','placeholder'=>'Enter product Description'])!!}
            <span class="text-danger">{{$errors->has('product_short_description') ? $errors->first('product_short_description'):''}}</span>
           </div>
          </div>

           <div class="form-group">
             {!! Form::label('product_long_description','Product Long Description',['class'=>'control-label col-sm-3'])!!}
           <div class="col-sm-9">
           {!! Form::textarea('product_long_description',$value=null,['class'=>'form-control','placeholder'=>'Enter product Description'])!!}
            <span class="text-danger">{{$errors->has('product_long_description') ? $errors->first('product_long_description'):''}}</span>
           </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-3"> Product Image</label>
            <div class="col-sm-9">
              <input type="file" name="product_image" accept="image/*">
            </div>
            
          </div>
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
           
           <!--<div class="form-group">
             {!! Form::label('publication','Publication Status',['class'=>'control-label col-sm-3'])!!}
           <div class="col-sm-9">
           {!! Form::select('size', ['1' => 'Published', '0' => 'Unpublished'], '1');!!}
           </div>
          </div> -->

         

          <div class="form-group">
           <div class="col-sm-9 col-sm-offset-3">
           {!! Form::submit('Save Product info!',['class'=>'btn btn-success btn-large col-sm-3']);!!}
           </div>
          </div>


        {!! Form::close() !!}
       </div>
    </div>  
  </div>
@endsection