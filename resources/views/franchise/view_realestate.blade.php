
@extends('franchise.layouts.franchise.struct')

@section('content')

    <div class="">
        <div class="portlet-title">
            <div class="caption">
                <i class="icon-settings font-red"></i>
                <span class="caption-subject font-red sbold uppercase">RealEstate</span>
            </div>

        </div>
        <div class="portlet-body">
            <div class="table-toolbar">
                <div class="row">
                    <div class="col-md-6">
                        <div class="btn-group">
                            <a type="button" href="{{URL::route('franchise.realestate.create')}}" class="btn green" >Add New</a>


                        </div>
                    </div>

                </div>
            </div>
            <div id="sample_editable_1_wrapper" class="dataTables_wrapper no-footer">
                <div class="table-scrollable">
                    <table class="table table-striped table-hover table-bordered dataTable no-footer" id="sample_editable_1" role="grid" aria-describedby="sample_editable_1_info">
                        <thead>
                            <tr role="row">
                                <th class="sorting_asc" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1" style="width: 139px;" aria-sort="ascending" aria-label="property_id : activate to sort column descending">Property Id</th>
                                 <th class="sorting" tabindex="0" aria-controls="sample_editable_16" rowspan="1" colspan="1" style="width: 162px;" aria-label=" User Id: activate to sort column ascending">User</th>
                                <th class="sorting" tabindex="0" aria-controls="sample_editable_1" rowspan="1" colspan="1" style="width: 162px;" aria-label="Property Type : activate to sort column ascending">Property Type</th>
                                <th class="sorting" tabindex="0" aria-controls="sample_editable_2" rowspan="1" colspan="1" style="width: 162px;" aria-label="Property Category: activate to sort column ascending">Property Category</th>
                                <th class="sorting" tabindex="0" aria-controls="sample_editable_3" rowspan="1" colspan="1" style="width: 162px;" aria-label="Discription: activate to sort column ascending">Discription</th>
                                <th class="sorting" tabindex="0" aria-controls="sample_editable_4" rowspan="1" colspan="1" style="width: 162px;" aria-label=" rate : activate to sort column ascending">Rate</th>
                                <th class="" tabindex="0" aria-controls="sample_editable_5" rowspan="1" colspan="1" style="width: 162px;" aria-label="Image: activate to sort column ascending">Image</th>
                                <th class="" tabindex="0" aria-controls="sample_editable_6" rowspan="1" colspan="1" style="width: 162px;" aria-label=" Image : activate to sort column ascending">Image</th>
                                <th class="" tabindex="0" aria-controls="sample_editable_7" rowspan="1" colspan="1" style="width: 162px;" aria-label="Image: activate to sort column ascending">Image</th>
                                <th class="sorting" tabindex="0" aria-controls="sample_editable_10" rowspan="1" colspan="1" style="width: 162px;" aria-label=" City : activate to sort column ascending">City</th>
                                <th class="sorting" tabindex="0" aria-controls="sample_editable_11" rowspan="1" colspan="1" style="width: 162px;" aria-label=" Address : activate to sort column ascending">Address</th>
                                <th class="sorting" tabindex="0" aria-controls="sample_editable_12" rowspan="1" colspan="1" style="width: 162px;" aria-label=" Mobile : activate to sort column ascending">Mobile</th>
                                <th class="sorting" tabindex="0" aria-controls="sample_editable_13" rowspan="1" colspan="1" style="width: 162px;" aria-label="Mobile 2 : activate to sort column ascending">Mobile2</th>
                                 <th class="sorting" tabindex="0" aria-controls="sample_editable_16" rowspan="1" colspan="1" style="width: 162px;" aria-label=" Delete: activate to sort column ascending">Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($real as $value)
                      
                        <tr role="row" class="odd">
                            <td class="sorting_1"> {{ $value->property_id }}</td>
                            <td class="sorting_2"> {{  $value->user_name }}{{ $value->user_id }}</td>
                            <td class="sorting_4"> {{ $value->property_type}}</td>
                            <?php if($value->property_category == 0){
                                $type = "Sale";
                            }
                            elseif($value->property_category == 1){
                                $type = "Rent";
                            }else{
                                $type = "Lease";
                            }
                            ?>
                            <td class="sorting_3"> <?= $type ?></td>
                            <td class="sorting_5"> {{ $value->discription}}</td>
                            <td class="sorting_6"> {{ $value->rate}}</td>
                            <td class="sorting_7"> <img class="dt-img" src="/realestate/images/{{ $value->image1}}"></td>
                            <td class="sorting_8"> <img class="dt-img" src="/realestate/images/{{ $value->image2}}"></td>
                            <td class="sorting_9"> <img class="dt-img" src="/realestate/images/{{ $value->image3}}"></td>
                            <td class="sorting_12"> {{ $value->place_name}}</td>
                            <td class="sorting_13"> {{ $value->address}}</td>
                            <td class="sorting_14"> {{ $value->mobile_number}}</td>
                            <td class="sorting_15"> {{ $value->mobile_number2}}</td>
                           
                            <td class="text-center">
                                <form method="POST" action="{{route('franchise.realestate.destroy',$value->property_id)}}">
                                    {{ csrf_field() }}
                                    <input name="_method" type="hidden" value="DELETE">
                                    <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-outline btn-circle green btn-sm blue delConfirm">
                                    <i class="fa fa-trash-o"></i> Delete</a>
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
@endsection
@push('data-tab-head')
    <link href="{{asset('/assets/global/plugins/bootstrap-toastr/toastr.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('/assets/global/plugins/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css')}}" rel="stylesheet" type="text/css" />
@endpush
@push('data-tab-foot')
    <script src="{{asset('/assets/global/plugins/bootstrap-toastr/toastr.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('/assets/pages/scripts/ui-toastr.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('/assets/global/scripts/datatable.js')}}" type="text/javascript"></script>
    <script src="{{asset('/assets/global/plugins/datatables/datatables.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js')}}" type="text/javascript"></script>
    <script src="{{asset('/assets/pages/scripts/table-datatables-editable.min.js')}}" type="text/javascript"></script>
@endpush

@push('confirmdel')
    <script>
        function dlt(dle) {
            if(confirm('are you sure')) {
                $form = $('<form  method="post" action="' + dle + '"></form>');
                $form.append('{{ method_field('DELETE')}}');
                $form.append('{{ csrf_field() }}');
                $('body').append($form);
                $form.submit();
            }
        }
        </script>


    <script>
        $(document).ready(function() {
            @if (session()->has('success'))
            toastr.success('{{session()->get('success')}}');
            @endif
        });
    </script>
        @endpush