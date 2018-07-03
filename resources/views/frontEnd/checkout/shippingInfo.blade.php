@extends('frontEnd.layouts.master')

@section('title')
   Cshipping info
@endsection

@section('content')
<hr/>
  <h3 class="text-center text-success">{{ Session::get('message')}}</h3>
<hr/>
  <div class="container">
  	<div class="row">
  		<div class="col-sm-12">
         <div class="well text-success text-center">
         Dear {{Session::get('customer_name')}} ,You have to give us product shipping information to complete your valuable order. If your billing and shipping information are the same then just press on shipping info button.
         </div>
  		</div>
  	</div>
    <div class="row">
      
      <div class="col-md-8 col-md-offset-2">
         <div class="well">
          <br/>
           <h5 class="text-center text-success">Shipping From here.</h5>
          <hr/>
          <form class="form-horizontal" action="{{url('/new-shipping')}}" method="POST">
            {{ csrf_field() }}
             <div class="form-group">
               <label class="control-label col-md-3"> Full Name </label>
               <div class="col-md-9">
                 <input type="text" name="full_name" value="{{$customerById->first_name.' '.$customerById->last_name}}" class="form-control">
               </div>
             </div>
             
             <div class="form-group">
               <label class="control-label col-md-3">Email Address</label>
               <div class="col-md-9">
                 <input type="email" name="email_address" value="{{$customerById->email_address}}" class="form-control">
               </div>
             </div>

             <div class="form-group">
               <label class="control-label col-md-3">Phone Number</label>
               <div class="col-md-9">
                 <input type="number" name="phone_number" value="{{$customerById->phone_number}}" class="form-control">
               </div>
             </div>

              <div class="form-group">
               <label class="control-label col-md-3">Address</label>
               <div class="col-md-9">
                 <textarea class="form-control" name="address" rows="8" style="resize: none;">{{$customerById->address}}</textarea>
               </div>
             </div>

              <div class="form-group">
            
               <div class="col-md-9 col-md-offset-3">
                 <input type="submit" name="btn" class="btn btn-success" value="Save Shipping info">
               </div>
             </div>
          </form>
         </div>
      </div>
    </div>
    </div>

  </div>
<hr/>
@endsection