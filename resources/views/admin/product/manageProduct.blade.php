@extends('layouts.app')

@section('content')
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                DataTables Advanced Tables
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
            <h3 class="text-center text-success">{{Session::get('message')}}</h3>
               <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                      <tr>
                        <th>SL NO</th>
                        <th>Product Name</th>
                        <th>Category Name</th>
                        <th>Manufacturer Name</th>
                        <th>Product Price</th>
                        <th>Product Quentity</th>
                        <th>Publication Status</th>
                        <th>Action</th>
                       </tr>
                    </thead>
                    <tbody>
                      <?php $i=1;?>
                    @foreach($products as $product)
                       <tr class="odd gradeX">
                          <td>{{$i}}</td>
                          <td>{{$product->product_name}}</td>
                          <td>{{$product->category_name}}</td>
                          <td>{{$product->manufacturer_name}}</td>
                          <td>{{$product->product_price}}</td>
                          <td>{{$product->product_quantity}}</td>
                          <td>{{$product->publication_status==1 ? 'Published' :'Unpublished'}}</td>
                          <td class="center">
                            @if($product->publication_status==1)
                             <form action="{{route('unpublished-product')}}" method="POST" style="display:inline">
                               {{csrf_field()}}
                               <input type="hidden" value="{{$product->id}}" name="product_id">
                               <button type="submit" name="btn" class="btn btn-primary btn-sm" title="Unpublished">
                                  <span class="glyphicon glyphicon-arrow-up"></span>
                               </button>
                             </form>
                             
                            @else
                                <form action="{{route('published-product')}}" method="POST" style="display: inline;">
                               {{csrf_field()}}
                               <input type="hidden" value="{{$product->id}}" name="manufacturer_id">
                               <button type="submit" name="btn" class="btn btn-warning btn-sm" title="Published">
                                  <span class="glyphicon glyphicon-arrow-down"></span>
                               </button>
                             </form>
                            @endif
                            <form action="{{route('edit-product')}}" method="POST" style="display: inline;">
                               {{csrf_field()}}
                               <input type="hidden" value="{{$product->id}}" name="product_id">
                               <button type="submit" name="btn" class="btn btn-info btn-sm" title="View">
                                  <span class="glyphicon glyphicon-zoom-out"></span>
                               </button>
                             </form>

                            <form action="{{route('edit-product')}}" method="POST" style="display: inline;">
                               {{csrf_field()}}
                               <input type="hidden" value="{{$product->id}}" name="product_id">
                               <button type="submit" name="btn" class="btn btn-success btn-sm" title="Edit">
                                  <span class="glyphicon glyphicon-edit"></span>
                               </button>
                             </form>

                              <form action="{{route('delete-product')}}" method="POST" style="display: inline;">
                               {{csrf_field()}}
                               <input type="hidden" value="{{$product->id}}" name="product_id">
                               <button type="submit" name="btn" onclick="return confirm('Are you sure to Delete this!');" class="btn btn-danger btn-sm" title="Delete">
                                  <span class="glyphicon glyphicon-trash"></span>
                               </button>
                             </form>
                             
          
                          </td>
                        </tr>
                        <?php $i++; ?>
                    @endforeach
                    </tbody>
                </table>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
@endsection
