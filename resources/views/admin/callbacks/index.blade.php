@extends('layouts.admin')

@section('content')
    @component('admin.includes.title')
        Callbacks list
    @endcomponent

    <table class="table table-striped admin_users_table">
        <thead>
            <tr>
                <th>#</th>
                <th>Processed</th>
                <th>Name</th>
                <th>Phone</th>
            </tr>
        </thead>
        <tbody>
            @if(!empty($callbacks))
                @foreach($callbacks as $call)
                    <tr>
                        <td>
                            {{ $call->id }}
                        </td>
                        <td>
                            @if($call->processed)
                                <button id="btn_processed" data-id="{{ $call->id }}" class="btn btn-success" type="button">Yes</button>
                            @else
                                <button id="btn_processed" data-id="{{ $call->id }}" class="btn btn-secondary" type="button">No</button>
                            @endif
                        </td>
                        <td>
                            {{ $call->name }}
                        </td>
                        <td>
                            {{ $call->phone }}
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
    {{ $callbacks->links() }}

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap-notify.min.js') }}"></script>
    <script>
            $(document).on("click", "#btn_processed", function (e) {
                e.preventDefault();
                let text = $(this).text();
                let c_id = $(this).data('id');
                let elem = $(this);

                let processed = 0;
                if(text=="No"){
                    processed = 1;
                }else{
                    processed = 0;
                }

                let url_edit = window.location.protocol +'//'+ window.location.hostname + "/admin/callbacks/" + c_id;

                $.ajax({
                    url: url_edit,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name = "csrf-token"]').attr('content')
                    },
                    type: 'PUT',
                    data: "processed=" + processed,
                    success: function(result) {
                        if(processed){
                            elem.text("Yes");
                            elem.addClass('btn-success').removeClass('btn-secondary');
                        }else{
                            elem.text("No");
                            elem.addClass('btn-secondary').removeClass('btn-success');
                        }
                    }
                });

            });
    </script>
@endsection
