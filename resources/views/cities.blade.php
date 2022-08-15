@extends('parent')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper"style="margin-right: 0">
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Main row -->
                <div class="row" style="direction: rtl">
                    <!-- /.card-header -->
                    <div class="card-body">
                        <h4>المدن </h4>
                      <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4">
                        <div class="row">
                         <div class="col-sm-12">
                          <table id="example1" class="table table-striped dataTable dtr-inline" aria-describedby="example1_info">
                        <thead>
                        <tr>
                          <th class="sorting sorting_asc" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">اسم المدينة </th>
                          <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending"></th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ( $cities as $city )
                            <tr class="odd">
                                <td class="dtr-control sorting_1" tabindex="0">{{$city->city_name}}</td>
                                <td>
                                     <form method="POST" action="{{route('city.destroy', $city->id)}}" onsubmit="return confirm('هل أنت متأكد من الحذف ');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                              </td>
                              </tr>
                            @endforeach
                       </tbody>
                      </table>
                    </div>
                  </div>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 @endsection
